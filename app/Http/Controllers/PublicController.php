<?php namespace App\Http\Controllers;
use App\User;
use Input;
use App\Blog;
use App\Tag;
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
	public function __construct()
	{
		$this->middleware('guest');
	*/

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('index');
	}
	public function blog()
	{
		$posts = Blog::paginate(10);
		$tags = Tag::all();
		return view('bloghome')->with('posts', $posts)->with('tags', $tags);
	}
	public function blogData($url)
	{	
		$blogData = Blog::where('blogUrl', $url)->first();
		$tags = Tag::all();
		return view('blog')->with('data', $blogData)->with('tags', $tags);
	}
	public function searchBlog()
	{	
		$searchQuery = Input::get('searchQuery');
		$blogResult = Blog::where('blogTitle', 'LIKE', '%'.$searchQuery.'%')->get();
		if (count($blogResult)==0) 
		{
			$resultData = '<div class="alert alert-danger" role="alert"><strong>Searching for the Posts contains the name - '.$searchQuery.' ( '.count($blogResult).' Results )</div>';
		}
		else
		{
			$resultData = '<div class="alert alert-success" role="alert"><strong>Searching for the Posts contains the name - '.$searchQuery.' ( '.count($blogResult).' Result )</div>';	
		}
		
		foreach ($blogResult as $key) 
		{
			$resultData .= '<h2><a href="'.asset("/").'blog/'.$key["blogUrl"].'" style="text-decoration:none">'.$key["blogTitle"].'</a></h2>
                			<p class="lead">by <a style="text-decoration:none">Sulthan Allaudeen</a></p>
                            <p style="float:right"><span class="glyphicon glyphicon-time"></span> Posted on 01 Sep 2015 </p>';
		}
		return $resultData;
	}
	public function tagData($tag)
	{	
		$tagId = Tag::where('tagTitle', $tag)->pluck('id');
		$tagData = Blog::find($tagId)->getBlogs;
		$tags = Tag::all();
		return view('tag')->with('tagData', $tagData)->with('tagList', $tagData)->with('tags', $tags)->with('tagName', $tag);
	}
	public function contact()
	{
		return view('contact');
	}
	public function gallery()
	{
		return view('gallery');
	}
	public function project()
	{
		return view('project');
	}
	public function technology()
	{
		return view('technology');
	}
	public function adminLogin()
	{
		return view('adminPanel/login');
	}


}
