<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use DB;
use Redirect;
use Mail;
use App\User;
use App\MailTemplate;
use App\UserLog;
use Input;
use App\Blog;
use App\ContactMails;
use App\Tag;
use App\BlogTag;
use Validator;

class AppController extends Controller {

    public function __construct() {
        $this->middleware('guest');
    }

	public function getToken()
	{
		$token = csrf_token();
		$Response = array('success' => '1', '_token' => $token);
		return $Response;
	}
	
    public function Login() {

        if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')))) {
			$token = csrf_token();
            $Response = array('success' => '1', 'userId' => Auth::user()->id, 'userName' => Auth::user()->name, 'token' => $token);
        } else {
            $Response = array('success' => '0');
        }
            return $Response;
    }
	
	public function getDashboardData()
	{
		$blogCount = Blog::all()->count();
        $tagCount = Tag::all()->count();
        $contactCount = ContactMails::where('messageStatus',0)->count();
		$totalCount = ContactMails::all()->count();
        $totalHit = UserLog::all()->count();
		return 1;
		#$Response = array('success' => '1', 'blogCount' => $blogCount, 'tagCount' => $tagCount , 'contactCount' => $contactCount, 'totalCount' => 'totalHit' => $totalHit);
	}
	
	public function sendPush()
	{
	$allUser = User::all();
	foreach($allUser as $user)
	{	
	$PushMessage = '{"title" : "ActivationCode", "message" : "MTI Activation Code"}'; 
    $DeviceId = array($user->gcm_id);
    $Message = array("price"=>urldecode($PushMessage));
    $this->PushNotification($DeviceId, $Message);       
	}
	}
	
	public function PushNotification($DeviceId,$Message) 
    {
    $url = 'https://android.googleapis.com/gcm/send';
    $fields = array(
            'registration_ids' => $DeviceId,
            'data' => $Message
        );
    $headers = array(
        'Authorization: key = AIzaSyDTL6-ORUx5arAi1M9el1VzZ7pefr9Ji9U',
        'Content-Type: application/json'
                      );
    $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    if ($result === FALSE) {
        die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);
    
    }

}
