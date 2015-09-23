<?php namespace App\Http\Controllers;
use App\User;
use App\Blog;
use Auth;
use Input;
class PersonalManager extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		return view('admin/index');
	}
	public function checkSession()
	{
		if (Auth::user()) {
		$Response = array('success' => 1);
		}
		else
		{
		$Response = array('success' => 0);
		}
		return $Response;
	}
	
	public function authLogin()
	{
		$email = Input::get('email');
        $password = Input::get('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) { #If the Credentials are Right
		$Response = array('success' => 1, 'userId' => Auth::user()->id);
		}
		else
		{
		$Response = array('success' => 0, 'message' => 'Invalid Username or Password');
		}
		return $Response;
		
	}
	
	
	public function blog()
	{
		$posts = Blog::paginate(10);
		return view('bloghome')->with('posts', $posts);
	}
	public function blogData($url)
	{	
		$blogData = Blog::where('url', $url)->first();
		return view('blog')->with('data', $blogData);
	}


}
