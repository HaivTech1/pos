<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Options;
use Illuminate\Http\Request;
use App\Mail\Messaging\SendMail;
use App\Notifications\SendMessage;
use Illuminate\Support\Facades\Mail;

class MessagingController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function indexEmail(){
        return view('manager.messaging.email',[
            'users' => User::where('type' ,'!=', 3)->get()
        ]);
    }

    public function sendEmail(Request $request){
        // dd($request);
        $user = \Auth::user();
  
          foreach ($request->to as $to){
            Mail::to($to)
                ->send(new SendMail($request, $user));
        }

        $notification = array (
            'messege' => 'Email sent successfully',
            'alert-type' => 'success',
            'button' => 'Okay!',
            'title' => 'Success'
        );

          return redirect()->back()->with($notification);
    }

    public function indexSMS(){
        $smsapi = Options::getOneBranchOption('smsapi', auth()->user());
        return view('manager.messaging.sms', [
            'smsapi' => $smsapi,
            'users' => User::where('type' ,'!=', 3)->get()
        ]);
    }

    public function sendSMS(Request $request){
        $user = \Auth::user();
          //print_r($_POST);exit();
          $result = array('pass' => array('status' => [], 'count' => 0), 'fail' => array('status' => [], 'count' => 0, 'numbers' => []), 'total' => sizeof($request->to));
          $sender = config('app.name');
          $smsapi = Options::getOneBranchOption('smsapi', $user);
        //   dd($smsapi);
  
  
        if($smsapi){
            foreach ($request->to as $to){

                $message = urlencode($request->message);
                
                    $basic  = new \Vonage\Client\Credentials\Basic("b85b9158", "ApNc3v2VpO1f7NNN");
                    $client = new \Vonage\Client($basic);

                    $response = $client->sms()->send(
                        new \Vonage\SMS\Message\SMS("2349066100815", BRAND_NAME, 'A text message sent using the Nexmo SMS API')
                    );
                    
                    $message = $response->current();
                    
                    if ($message->getStatus() == 0) {
                        echo "The message was sent successfully\n";
                    } else {
                        echo "The message failed with status: " . $message->getStatus() . "\n";
                    } 
            }
            return response()->json(['status' => true, 'text' => 'The message was sent successfully']);
          } else {
            return response()->json(['status' => false, 'text' => 'Sms Api Not Set From Admin Options']);
          }
  
      }
}