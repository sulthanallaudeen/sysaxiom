<?php
	
	namespace App\Http\Controllers;
	use Auth;
	use Session;
	use DB;
	use Redirect;
	use Mail;
	use App\User;
	use Input;
	use App\Blog;
	use App\ContactMails;
	use App\Tag;
	use App\BlogTag;
	use Validator;
	
	class PublicController extends Controller {
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
		/*
			
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
		#Public Home Page
		public function index() {
			return view('public.index');
		}
		
		#Blog Full Listing
		
		public function blog() {
			$posts = Blog::where('blogStatus', 1)->orderBy('id','desc')->paginate(10);
			$tags = Tag::where('tagStatus', 1)->get();
			return view('public.bloghome')->with('posts', $posts)->with('tags', $tags);
		}
		
		#Blog Individual Page
		
		public function blogData($url) {
			$blogData = Blog::where('blogUrl', $url)->first();
			$tags = Tag::where('tagStatus', 1)->get();
			return view('public.blog')->with('data', $blogData)->with('tags', $tags);
		}
		
		#Blog Live Search
		
		public function searchBlog() {
			$searchQuery = Input::get('searchQuery');
			$blogResult = Blog::where('blogTitle', 'LIKE', '%' . $searchQuery . '%')->get();
			if (count($blogResult) == 0) {
				$resultData = '<div class="alert alert-danger" role="alert"><strong>Searching for the Posts contains the name - ' . $searchQuery . ' ( ' . count($blogResult) . ' Results )</div>';
				} else {
				$resultData = '<div class="alert alert-success" role="alert"><strong>Searching for the Posts contains the name - ' . $searchQuery . ' ( ' . count($blogResult) . ' Result )</div>';
			}
			
			foreach ($blogResult as $key) {
				$resultData .= '<h2><a href="' . asset("/") . 'blog/' . $key["blogUrl"] . '" style="text-decoration:none">' . $key["blogTitle"] . '</a></h2>
				<p class="lead">by <a style="text-decoration:none">Sulthan Allaudeen</a></p>
				<p style="float:right"><span class="glyphicon glyphicon-time"></span> Posted on 01 Sep 2015 </p>';
			}
			return $resultData;
		}
		
		#Get Blogs by Tag
		
		public function tagData($tag) {
			$tagId = Tag::where('tagTitle', $tag)->pluck('id');
			$tags = Tag::where('tagStatus', 1)->get();
			$blogTag = BlogTag::where('tag_id', $tagId)->pluck('id');    
			#return $tagId;
			if($blogTag=='')
			{
				return view('public.tag')->with('error', 'No Blog Post related to the Tag <b>'.$tag.'</b>')->with('tags', $tags)->with('tagName', $tag);    
			}
			else
			{
				
				
				
				$tagData = Blog::find($tagId)->getBlogs;
				
				
				return view('public.tag')->with('tagData', $tagData)->with('tagList', $tagData)->with('tags', $tags)->with('tagName', $tag);
			}
		}
		
		#Tag About Page
		
		public function tagAbout($tag) {
			$tagData = Tag::where('tagTitle', $tag)->first();
			$tags = Tag::where('tagStatus', 1)->get();
			return view('public.tagAbout')->with('tagData', $tagData)->with('tags', $tags);
		}
		
		#Contact Page
		
		public function contact() {
			return view('public.contact');
		}
		
		#Send Mail
		
		public function sendMail() {
			$mailData = Input::except('_token');
			$validation = Validator::make($mailData, ContactMails::$mailData);
			if ($validation->passes()) {
				$email = 'allaudeen.s@gmail.com';
				$subject = 'Sysaxiom :: Message from : '.Input::get('userEmail');
				$body = Input::get('userMessage');
				$mailId = ContactMails::create($mailData);
				Mail::send([],
				array('Email' => $email,'body' => $body, 'subject' => $subject), function($message) use ($email,$body, $subject)
				{
					$mail_body = $body;
					$message->setBody($mail_body, 'text/html');
					$message->to($email);
					$message->subject($subject);
				});
				
				$Response   = array('success' => '1', 'mailId' => $mailId->id);
			}
			else
			{
				$Response   = array('success' => '0', 'error'=>$validation->messages());
			}
			
			return $Response;
		}
		
		#Gallery Page
		
		public function gallery() {
			return view('public.gallery');
		}
		
		#Project Page
		
		public function project() {
			return view('public.project');
		}
		
		#Technologies Used in Sysaxiom App
		
		public function technology() {
			return view('public.technology');
		}
		
		#Admin Login Page
		
		public function adminLogin() {
			return view('admin.login.login');
		}
		
		#Admin Auth Login
		
		public function authAdminLogin() {
			
			if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'))))
		   {
				return Redirect::to('dashboard');
		   }
		   else
		   {
			return Redirect::to('admin.login.login')->with('Message', 'Invalid Username or Password');   }
		}
		
		#Admin Logout
		
		public function logoutAdmin() {
			Session::flush();
			return view('admin.login.login');
		}
	}		