<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use App\Subscriber;
use Response;
use stdClass;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{
    //

    public function register(Request $request){

    	Log::info('SubscriberController@register input - '.print_r($request->all(),true));
    	$input=$request->all();
    	//dd($input);

	    	$subscriber=new Subscriber();
	    	$subscriber->name=$input['name'];
	    	$subscriber->email=$input['email'];
	    	$subscriber->address=$input['address'];
	    	$subscriber->state=$input['state'];
	    	$subscriber->token=$input['token'];
	    	$subscriber->host_name=$input['host_name'];
	    	$subscriber->save();
	    	 $responseObj = new stdClass();
	    	 $responseObj->status="1000";
	    	 $responseObj->message="Subscriber add Sucessfully!!";
	    	 $mail=$input['email'];

	    	 $data = array(
                            'name'=>$input['name'], 
                            'email'=>$input['email'],
                            'token'=>$input['token'],
                          
                          );

	    	 Mail::send('mail.verify_subscriber',$data, function ($message) use ($mail) {

				 $message->to($mail)
				        ->subject('Account Verification');
				     
				       // ->replyTo($request->email)
				      
				      });


     return Response::json($responseObj , 200);
  
    }

     public function verify_link($token)
    {
    	Log::info(' verify_link   in-  $token  '.$token);


        $verifyUser = Subscriber::where('token', $token)->first();

    	 return view('verify',compact('token','verifyUser'));

    }

     public function token($token)
    {

    	
    	Log::info(' subscriber/token  in-  $token  '.$token);
        $verifyUser = Subscriber::where('token', $token)->first();
         $responseObj = new stdClass();



        if(isset($verifyUser) ){
        	$verifyUser->verified=1;

        	$verifyUser->save();


        	
	    	return redirect()->back()->with('message', 'Verify Sucessfully!!');
        }else{
           	return redirect()->back()->with('message', 'Not Found!!');

        }

         return redirect('/subscriber/verify/');

      
          
    }


}
