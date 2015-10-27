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
		$platform = $this->getPlatform();
		$browser = $this->getBrowser('browser');
		$version = $this->getBrowser('version');
		$ip = $_SERVER['REMOTE_ADDR'];
		$date = date('Y-m-d H:i:s');
		$currentUrl = $_SERVER['HTTP_HOST'];
		if($currentUrl=='sysaxiom.com')
		{
		Mail::send([], array('platform' => $platform, 'browser' => $browser, 'version' => $version, 'date' => $date, 'ip' => $ip), function($message) use ($platform, $browser, $version, $date, $ip) {
                    #Getting content from the Mail Template and Triggering the Email to the User with Activation Code
                    $MailContent = MailTemplate::find(1);
                    $MailBody = $MailContent->content;
                    $MailBody = str_replace("{{os}}", $platform, $MailBody);
                    $MailBody = str_replace("{{browser}}", $browser, $MailBody);
                    $MailBody = str_replace("{{version}}", $version, $MailBody);
                    $MailBody = str_replace("{{ip}}", $ip, $MailBody);
                    $MailBody = str_replace("{{date}}", $date, $MailBody);
                    $message->setBody($MailBody, 'text/html');
                    $message->to('logs@sysaxiom.com');
                    $message->subject($MailContent->subject);
                });
		$data['platform'] = $platform;
		$data['browser'] = $browser;
		$data['version'] = $version;
		$data['ip'] = $ip;
		UserLog::create($data);
		return view('public.index');
		}
		else
		{
		return view('public.index');
		}
		
 
	
		
			
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
				$resultData = '<div class="alert alert-danger" role="alert"><strong>Searching for the Posts contains the word "' . $searchQuery . '" ( ' . count($blogResult) . ' Results )</div>';
				} else {
				$resultData = '<div class="alert alert-success" role="alert"><strong>Searching for the Posts contains the word "' . $searchQuery . '" ( ' . count($blogResult) . ' Result )</div>';
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
			$sideBarTech = $this->technologySideBar();
			return view('public.technology')->with('sideBar',$sideBarTech);
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
                        #return Redirect::to('admin.login.login')->with('Message', 'Invalid Username or Password');   }
                        return Redirect::to('sa')->with('warning', 'Invalid Username or Password');   }
		}
		
		#Admin Logout
		
		public function logoutAdmin() {
			Session::flush();
			return view('admin.login.login');
		}

		#System Utils
		#Getting Browser Details
	public function getBrowser($param) {
	$u_agent = $_SERVER['HTTP_USER_AGENT']; 
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Internet Explorer'; 
        $ub = "MSIE"; 
    } 
    elseif(preg_match('/Firefox/i',$u_agent)) 
    { 
        $bname = 'Mozilla Firefox'; 
        $ub = "Firefox"; 
    } 
    elseif(preg_match('/Chrome/i',$u_agent)) 
    { 
        $bname = 'Google Chrome'; 
        $ub = "Chrome"; 
    } 
    elseif(preg_match('/Safari/i',$u_agent)) 
    { 
        $bname = 'Apple Safari'; 
        $ub = "Safari"; 
    } 
    elseif(preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Opera'; 
        $ub = "Opera"; 
    } 
    elseif(preg_match('/Netscape/i',$u_agent)) 
    { 
        $bname = 'Netscape'; 
        $ub = "Netscape"; 
    } 
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
    }
    $i = count($matches['browser']);
    if ($i != 1) {
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }
    if ($version==null || $version=="") {$version="?";}
    if ($param=='browser') 
    {
    	return $bname;
    }
    else if ($param == 'version')
    {
    	return $version;
    }
    else
    {
    	return $this->lol();
    }
    

	}

	public function lol()
	{
		return '<h1 align="center">lol :p <br>Never Think of Hack Here !!</h1>';
	}

		#Getting OS Details
		public function getPlatform() {
$user_agent     =   $_SERVER['HTTP_USER_AGENT'];
			    

    $os_platform    =   "Unknown OS Platform";

    $os_array       =   array(
                            '/windows nt 10/i'     =>  'Windows 10',
                            '/windows nt 6.3/i'     =>  'Windows 8.1',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile'
                        );

    foreach ($os_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }

    }   

    return $os_platform;
		}
	public function getIp()
	{
		return $_SERVER['REMOTE_ADDR'];
	}
	public function getTime()
	{
		return date('Y-m-d H:i:s');
	}
	public function accessLog($way)
	{
		if($way=='server')
		{
			$sideBar = $this->technologySideBar();
			$userLog = UserLog::orderBy('id','desc')->get();
			return view('public.technology.accessLogServer')->with('sideBar', $sideBar)->with('userLog', $userLog);
		}
		else if ($way=='client')
		{
			return view('public.technology.accessLogClient');
		}
		else
		{
			return $this->lol();
		}

	}
	
	public function technologySideBar()
	{
	
	$fullUrl = $_SERVER['REQUEST_URI'];
	$urlSegment = substr($fullUrl, strrpos($fullUrl, '/') + 1);
	$url = array("accessLogServer"=>"", "technology"=>"");
	if($urlSegment=='technology')
	{
	$url['technology'] = 'active';
	}
	else if($urlSegment=='server')
	{
	$url['accessLogServer'] = 'active';
	}
	else
	{
	$url['technology'] = 'active';
	}
	
	
	return '<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
            <div class="list-group">
            <a href='.asset('/technology').' class="list-group-item '.$url['technology'].'">Home</a>
            <a href="'.asset('/accessLog/server').'" class="list-group-item '.$url['accessLogServer'].'">Website Log</a>
          </div>
        </div><!--/.sidebar-offcanvas-->';
	}

	}		