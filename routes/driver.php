<?php 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\Admin\BasicSettingsProvider;
use Illuminate\Support\Facades\Route;
use Pusher\PushNotifications\PushNotifications;
use App\Http\Controllers\Driver\DashboardController;
use App\Http\Controllers\Driver\ProfileController;
use App\Http\Controllers\Driver\SecurityController;
use App\Http\Controllers\Driver\MyBookingController;
use App\Http\Controllers\Driver\AddMoneyController;
use App\Http\Controllers\Driver\MoneyOutController;
use App\Http\Controllers\Driver\SupportTicketController;
use App\Http\Controllers\Driver\KycController as DriverKycController;

Route::prefix("driver")->name("driver.")->group(function(){
    
    Route::middleware(['kyc.verification.guard'])->group(function () {
        
     Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('dashboard');
        Route::post('logout','logout')->name('logout');
    });

     Route::controller(ProfileController::class)->prefix("profile")->name("profile.")->group(function(){
        Route::get('/','index')->name('index');
        Route::put('password/update','passwordUpdate')->name('password.update');
        Route::put('update','update')->name('update');
        Route::delete('delete','destroy')->name('destroy.account');
    });
    
    Route::controller(SupportTicketController::class)->prefix("prefix")->name("support.ticket.")->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('conversation/{encrypt_id}','conversation')->name('conversation');
        Route::post('message/send','messageSend')->name('messaage.send');
    });

    Route::controller(SecurityController::class)->prefix("security")->name('security.')->group(function(){
        Route::get('google/2fa','google2FA')->name('google.2fa');
        Route::post('google/2fa/status/update','google2FAStatusUpdate')->name('google.2fa.status.update');
        Route::post('/google-2fa/verify','google2FAVerify')->name('google.2fa.verify');
    });


    Route::controller(MyBookingController::class)->prefix("booking")->name("booking.")->group(function () {
        Route::get('/', 'index')->name('index');
    });
    

    Route::controller(AddMoneyController::class)->prefix('add-money')->name('add.money.')->group(function() {
        Route::get('/','index')->name('index');
    });

    Route::controller(MoneyOutController::class)->prefix('money-out')->name('money.out.')->group(function() {
        Route::get('/','index')->name('index');
     });
     
    });
    
    //DRIVER KYC ROUTE
    Route::controller(DriverKycController::class)->prefix('kyc')->name('kyc.')->group(function() {
        Route::get('/','index')->name('index');
        Route::post('submit','store')->name('submit');
    });


 });


 
// Route For Pusher Beams Auth
Route::get('driver/pusher/beams-auth', function (Request $request) {
  
    if (Auth::guard('driver_gurd')->check() == false) {
        return response(['Inconsistent request'], 401);
    }

    $driverId = Auth::guard('driver_gurd')->user()->id;

    $basic_settings = BasicSettingsProvider::get();
    if(!$basic_settings) {
        return response('Basic setting not found!', 404);
    }

    $notification_config = $basic_settings->push_notification_config;

    if(!$notification_config) {
        return response('Notification configuration not found!', 404);
    }

    $instance_id    = $notification_config->instance_id ?? null;
    $primary_key    = $notification_config->primary_key ?? null;
    if($instance_id == null || $primary_key == null) {
        return response('Sorry! You have to configure first to send push notification.', 404);
    }
    $beamsClient = new PushNotifications(
        array(
            "instanceId" => $notification_config->instance_id,
            "secretKey" => $notification_config->primary_key,
        )
    );

    $get_full_host_path = remove_special_char(get_full_url_host(), "-");

    $publisherUserId = $get_full_host_path . "-user-".$driverId;
    try{
        $beamsToken = $beamsClient->generateToken($publisherUserId);
    }catch(Exception $e) {
        return response(['Server Error. Failed to generate beams token.'], 500);
    }

    return response()->json($beamsToken);
})->name('driver.pusher.beams.auth');


