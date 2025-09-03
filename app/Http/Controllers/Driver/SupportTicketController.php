<?php

namespace App\Http\Controllers\Driver;

use App\Events\Admin\SupportConversationEvent;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Response;
use App\Models\Driver\DriverSupportChat;
use App\Models\Driver\DriverSupportTicket;
use App\Models\Driver\DriverSupportTicketAttachment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Constants\GlobalConst;
use App\Models\UserSupportTicketAttachment;
use App\Models\UserSupportChat;
use App\Models\UserSupportTicket;

class SupportTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = __("Support Tickets");
        $support_tickets = UserSupportTicket::where('driver_id',auth('driver_gurd')->id())
                                            ->orderByDesc("id")
                                            ->paginate(10);
      
        return view('driver.sections.support-ticket.index', compact('page_title','support_tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = __("Add New Ticket");
        return view('driver.sections.support-ticket.create', compact('page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'subject'           => "required|string|max:255",
            'desc'              => "required|string|max:5000",
            'attachment.*'      => "nullable|file|mimes:jpg,jpeg,png,svg,webp|max:204800",
        ]);
        $validated = $validator->validate();
        $validated['token']         = generate_unique_string('user_support_tickets','token');
        $validated['driver_id']     = auth('driver_gurd')->user()->id;
        $validated['name']          = auth('driver_gurd')->user()->firstname;
        $validated['status']        = 0;
        $validated['email']         = auth('driver_gurd')->user()->email;
        $validated['created_at']    = now();
        $validated['type']          = GlobalConst::DRIVER;
        $validated = Arr::except($validated,['attachment']);

        try{
            $support_ticket_id = UserSupportTicket::insertGetId($validated);
        }catch(Exception $e) {
            return back()->with(['error' => [__('Something went worng! Please try again.')]]);
        }

        if($request->hasFile('attachment')) {
            $validated_files = $request->file("attachment");
            $attachment = [];
            $files_link = [];
            foreach($validated_files as $item) {
                $upload_file = upload_file($item,'support-attachment');
                if($upload_file != false) {
                    $attachment[] = [
                        'user_support_ticket_id'   => $support_ticket_id,
                        'attachment'                => $upload_file['name'],
                        'attachment_info'           => json_encode($upload_file),
                        'created_at'                => now(),
                    ];
                }

                $files_link[] = get_files_path('support-attachment') . "/". $upload_file['name'];
            }

            try{
                UserSupportTicketAttachment::insert($attachment);
            }catch(Exception $e) {
                $support_ticket_id->delete();
                delete_files($files_link);

                return back()->with(['error' => [__('Opps! Faild to upload attachment. Please try again.')]]);
            }
        }

        return back()->with(['success' => [__('Support ticket created successfully!')]]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function conversation($encrypt_id)
    {
        $support_ticket_id = decrypt($encrypt_id);
        $support_ticket = UserSupportTicket::findOrFail($support_ticket_id);

        $page_title = __("Support Chating");
        return view('driver.sections.support-ticket.conversation', compact('page_title','support_ticket'));
    }

    public function messageSend(Request $request) 
    {
        $validator = Validator::make($request->all(),[
            'message'       => 'required|string|max:200',
            'support_token' => 'required|string',
        ]);
        if($validator->fails()) {
            $error = ['error' => $validator->errors()];
            return Response::error($error,null,400);
        }
        $validated = $validator->validate();

        $support_ticket = UserSupportTicket::notSolved($validated['support_token'])->first();
        if(!$support_ticket) return Response::error(['error' => ['This support ticket is closed.']]);

        $data = [
            'user_support_ticket_id'    => $support_ticket->id,
            'sender'                    => auth('driver_gurd')->user()->id,
            'sender_type'               => GlobalConst::DRIVER,
            'message'                   => $validated['message'],
            'receiver_type'             => "ADMIN",
        ];

        try{
            $chat_data = UserSupportChat::create($data);
        }catch(Exception $e) {
            return $e;
            $error = ['error' => [__('SMS Sending faild! Please try again.')]];
            return Response::error($error,null,500);
        }

        try{
            event(new SupportConversationEvent($support_ticket,$chat_data));
        }catch(Exception $e) {
            return $e;
            $error = ['error' => [__('SMS Sending faild! Please try again.')]];
            return Response::error($error,null,500);
        }
    }
}
