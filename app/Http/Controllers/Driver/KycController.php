<?php

namespace App\Http\Controllers\Driver;

use Exception;
use Illuminate\Http\Request;
use App\Constants\GlobalConst;
use App\Models\Admin\SetupKyc;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Traits\ControlDynamicInputFields;
use Illuminate\Support\Facades\Validator;

class KycController extends Controller
{
    use ControlDynamicInputFields;
    
    public function index()
    {
        $page_title = __("KYC Verification");
        $user = auth('driver_gurd')->user();
        $driver_kyc = SetupKyc::userKyc()->first();
        if(!$driver_kyc) return redirect()->route('driver.dashboard');

        $kyc_data = $driver_kyc->fields;
        $kyc_fields = [];
        if($kyc_data) {
            $kyc_fields = $kyc_data;
        }
        $kyc_data = $driver_kyc;
        
        return view('driver.sections.kyc.index',compact('page_title','user','kyc_fields','kyc_data'));
    }

    public function store(Request $request) {

        $user = auth('driver_gurd')->user();
        if($user->kyc_verified == GlobalConst::VERIFIED) return back()->with(['success' => [__('You are already KYC Verified Driver')]]);

        $user_kyc_fields = SetupKyc::userKyc()->first()->fields ?? [];
        $validation_rules = $this->generateValidationRules($user_kyc_fields);

        $validated = Validator::make($request->all(),$validation_rules)->validate();
        $get_values = $this->placeValueWithFields($user_kyc_fields,$validated);

        $create = [
            'driver_id'     => auth('driver_gurd')->user()->id,
            'data'          => json_encode($get_values),
            'created_at'    => now(),
        ];

        DB::beginTransaction();
        try{
            DB::table('driver_kyc_data')->updateOrInsert(["driver_id" => $user->id],$create);
            $user->update([
                'kyc_verified'  => GlobalConst::PENDING,
            ]);
            DB::commit();
        }catch(Exception $e) {
            DB::rollBack();
            $user->update([
                'kyc_verified'  => GlobalConst::DEFAULT,
            ]);
            $this->generatedFieldsFilesDelete($get_values);
            return back()->with(['error' => [__('Something went wrong! Please try again')]]);
        }

        return redirect()->route('driver.kyc.index')->with(['success' => [__('KYC information successfully submitted')]]);
    }
}
