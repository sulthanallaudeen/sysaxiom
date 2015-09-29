<?php
	
	namespace App\Http\Controllers;
	
	use DB;
	use Mail;
	use App\User;
	use Input;
	use App\Blog;
	use App\ContactMails;
	use App\Tag;
	use App\BlogTag;
	use Validator;
	
	class HomeController extends Controller {
		
		/*
			|--------------------------------------------------------------------------
			| Home Controller
			|--------------------------------------------------------------------------
			|
			| This controller renders your application's "dashboard" for users that
			| are authenticated. Of course, you are free to change or remove the
			| controller as you wish. It is just here to get your app started!
			|
		*/
		
		/**
			* Create a new controller instance.
			*
			* @return void
		*/
		public function __construct()
		{
			$this->middleware('auth');
		}
		
		/**
			* Show the application dashboard to the user.
			*
			* @return Response
		*/
		public function index()
		{
			return view('home');
		}
		
		#Admin Dashboard Page
		
		public function adminDashboard() {
			return view('admin.dashBoard');
		}
		
		#List Blogs
		
		public function listBlog() {
			$blogs = Blog::all();
			return view('admin.blog.listBlog')->with('blogs',$blogs);
		}
		
		#Write Blog
		
		public function writeBlog() {
			$tags = Tag::where('tagStatus', 1);
			return view('admin.blog.writeBlog')->with('tags', $tags);
		}
		
		
		#Post Blog
		
		public function postBlog() {
			
			$blogData = Input::except('blogTags');
			$blogData['blogAuthor'] = 1;
			$validation = Validator::make($blogData, Blog::$postBlog);
			if ($validation->passes()) {
				$postBlog = Blog::create($blogData);
				$blogTags = Input::get('blogTags');
				foreach ($blogTags as $blogTagsData) {
					BlogTag::create([
					'blog_id' => $postBlog->id,
					'user_id' => '1',
					'tag_id' => $blogTagsData[0]
					]);
				}
				
				$Response = array('success' => '1', 'blogId' => $postBlog->id);
				} else {
				$Response = array('success' => '0', 'err' => $validation->messages());
			}
			return $Response;
		}
		
		#Edit Blog
		
		public function editBlog($id){
			$blogData = Blog::where('id', $id)->first();
			$allTags = Tag::where('tagStatus', 1)->get();
			$blogTags = BlogTag::where('blog_id', $id)->get();
			return view('admin.blog.editBlog')->with('blogData', $blogData)->with('allTags', $allTags)->with('blogTag', $blogTags);
		}
		
		#Update Blog
		public function updateBlog()
		{
			$blogData = Input::except('blogTags', '_token');
			$validation = Validator::make($blogData, Blog::$updateBlog);
			if ($validation->passes()) {
				$blog = BlogTag::where('blog_id', Input::get('id'))->delete();
				$blog = Blog::where('id', Input::get('id'))->update($blogData);
				$blogTags = Input::get('blogTags');
				foreach ($blogTags as $blogTagsData) {
					BlogTag::create([
					'blog_id' => Input::get('id'),
					'user_id' => '1',
					'tag_id' => $blogTagsData[0]
					]);
				}
				
				$Response = array('success' => '1', 'blogId' => Input::get('id'));
				} else {
				$Response = array('success' => '0', 'err' => $validation->messages());
			}
			return $Response;        
		}
		
		#List Tag
		
		public function listTag() {
			$tags = Tag::all();
			return view('admin.tag.listTag')->with('tags',$tags);
		}
		
		#Write Tag
		
		public function writeTag() {
			return view('admin.tag.writeTag');
		}
		
		#Edit Tag
		
		public function editTag($id){
			$tagData = Tag::where('id', $id)->first();
			return view('admin.tag.editTag')->with('tagData', $tagData);
		}
		
		#Write Tag
		
		public function postTag() {
			
			$tagData = Input::except('__token');
			$validation = Validator::make($tagData, Tag::$postTag);
			if ($validation->passes()) {
				$postTag = Tag::create($tagData);
				$Response = array('success' => '1', 'tagId' => $postTag->id);
				} else {
				$Response = array('success' => '0', 'err' => $validation->messages());
			}
			return $Response;
		}
		
		#Edit Tag
		
		public function updateTag() {
			$tagData = Input::except('_token');
			$validation = Validator::make($tagData, Tag::$postTag);
			if ($validation->passes()) {
				$postTag = Tag::where('id', Input::get('id'))->update($tagData);
				$Response = array('success' => '1', 'tagId' => Input::get('id'));            
				} else {
				$Response = array('success' => '0', 'err' => $validation->messages());
			}
			return $Response;
		}
		
	}
