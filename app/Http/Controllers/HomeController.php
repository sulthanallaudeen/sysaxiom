<?php

namespace App\Http\Controllers;

use DB;
use URL;
use Hash;
use Mail;
use App\User;
use Input;
use App\Blog;
use App\ContactMails;
use App\Tag;
use App\Cat;
use App\Task;
use App\TaskCat;
use App\BlogTag;
use App\UserLog;
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
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index() {
        return view('home');
    }

    #Admin Dashboard Page

    public function adminDashboard() {
        $blogCount = Blog::all()->count();
        $tagCount = Tag::all()->count();
        $contactCount = ContactMails::where('messageStatus',0)->count();
		$totalCount = ContactMails::all()->count();
        $totalHit = UserLog::all()->count();
        return view('admin.dashBoard')->with('blogCount', $blogCount)->with('blogCount', $blogCount)->with('tagCount', $tagCount)->with('contactCount', $contactCount)->with('totalCount', $totalCount)->with('totalHit', $totalHit);
    }

    #List Blogs

    public function listBlog() {
        $blogs = Blog::all();
        return view('admin.blog.listBlog')->with('blogs', $blogs);
    }

    #Write Blog

    public function writeBlog() {
        $tags = Tag::where('tagStatus', 1)->get();
        return view('admin.blog.writeBlog')->with('tags', $tags);
    }

    #Post Blog

    public function postBlog() {
        $blogData = Input::except('blogTags');
        $blogData['blogAuthor'] = 1;
        if($blogData['blogDate']=='') { $blogData['blogDate'] = date('Y-m-d H:i:s'); }
        $validation = Validator::make($blogData, Blog::$postBlog);
        if ($validation->passes()) {
            $postBlog = Blog::create($blogData);
            $blogTags = Input::get('blogTags');
            foreach ($blogTags as $blogTagsData) {
                BlogTag::create([
                    'blog_id' => $postBlog->id,
                    'user_id' => '1',
                    'tag_id' => $blogTagsData
                ]);
            }

            $Response = array('success' => '1', 'blogId' => $postBlog->id);
        } else {
            $Response = array('success' => '0', 'err' => $validation->messages());
        }
        return $Response;
    }

    #Edit Blog

    public function editBlog($id) {
        $blogData = Blog::where('id', $id)->first();
        $allTags = Tag::where('tagStatus', 1)->get();
        $blogTags = BlogTag::where('blog_id', $id)->get();
        return view('admin.blog.editBlog')->with('blogData', $blogData)->with('allTags', $allTags)->with('blogTag', $blogTags);
    }

    #Update Blog

    public function updateBlog() {
        $blogData = Input::except('blogTags', '_token');
        if($blogData['blogDate']=='') { unset($blogData['blogDate']); }
        $validation = Validator::make($blogData, Blog::$updateBlog);
        if ($validation->passes()) {
            $blog = BlogTag::where('blog_id', Input::get('id'))->delete();
            $blog = Blog::where('id', Input::get('id'))->update($blogData);
            $blogTags = Input::get('blogTags');
            foreach ($blogTags as $blogTagsData) {
                BlogTag::create([
                    'blog_id' => Input::get('id'),
                    'user_id' => '1',
                    'tag_id' => $blogTagsData
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
        return view('admin.tag.listTag')->with('tags', $tags);
    }

    #Write Tag

    public function writeTag() {
        return view('admin.tag.writeTag');
    }

    #Edit Tag

    public function editTag($id) {
        $tagData = Tag::where('id', $id)->first();
        return view('admin.tag.editTag')->with('tagData', $tagData);
    }

    #Write Tag

    public function postTag() {

        $tagData = Input::except('_token');
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

    #Create Cat
    public function createCat() {
        return view('admin.cat.createCat');
    }

    #Post Cat

    public function postCat() {

        $catData = Input::except('_token');
        $validation = Validator::make($catData, Cat::$postCat);
        if ($validation->passes()) {
            $postCat = Cat::create($catData);
            $Response = array('success' => '1', 'catId' => $postCat->id);
        } else {
            $Response = array('success' => '0', 'err' => $validation->messages());
        }
        return $Response;
    }

    #List Cat

    public function listCat() {
        $cats = Cat::all();
        return view('admin.cat.listCat')->with('cats', $cats);
    }

    #Edit Cat

    public function editCat($id) {
        $catData = Cat::where('id', $id)->first();
        return view('admin.cat.editCat')->with('catData', $catData);
    }
    
    
    #Update Cat

    public function updateCat() {

        $catData = Input::except('_token');
        $validation = Validator::make($catData, Cat::$postCat);
        if ($validation->passes()) {
        Cat::where('id', Input::get('id'))->update($catData);
        $Response = array('success' => '1', 'catId' => Input::get('id'));
        } else {
            $Response = array('success' => '0', 'err' => $validation->messages());
        }
        return $Response;
    }

    #Create Task

    public function createTask() {
        $cats = Cat::where('catStatus', 1)->get();
        return view('admin.task.createTask')->with('cats', $cats);
    }
    
    #Post Task

    public function postTask() {

        $taskData = Input::except('_token');
        $taskData['taskAuthor'] = 1;
        $taskCats = Input::get('catTags');
        $validation = Validator::make($taskData, Task::$postTask);
        if ($validation->passes()) {
            $postTask = Task::create($taskData);
            foreach ($taskCats as $taskCatData) {
                TaskCat::create([
                    'task_id' => $postTask->id,
                    'user_id' => '1',
                    'cat_id' => $taskCatData[0]
                ]);
            }
            $Response = array('success' => '1', 'taskId' => $postTask->id);
        } else {
            $Response = array('success' => '0', 'err' => $validation->messages());
        }
        return $Response;
    }
	
	
	public function listTask()
	{
	$tasks = Task::all();
    return view('admin.task.listTask')->with('tasks', $tasks);
		
	}
	
	public function editTask($id)
	{
	$taskData = Task::where('id', $id)->first();
    return view('admin.task.editTask')->with('taskData', $taskData);
	}
	#Messages

    public function listMessages() {
        $mails = ContactMails::all();
        return view('admin.messages.allmessages')->with('mails', $mails);
    }
	
	public function getMessage()
	{
		$mailData = ContactMails::where('id', Input::get('id'))->first();
		if($mailData!='')
		{
		   $Response = array('success' => '1', 'mailData' => $mailData);
		}
		else
		{
		   $Response = array('success' => '0', 'message' => 'Mail Not Found');
		}
			return $Response;

	}
	
	public function messageMarkAsRead()
	{
        $status['messageStatus']= 1;
        ContactMails::where('id', Input::get('id'))->update($status);

        $mails = ContactMails::all();
        $messageTableHtml = '<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>From</th>
                                            <th>Status</th>
                                            <th>Received At</th>
                                            <th>Read</th>
                                        </tr>
                                    </thead>
                                    <tbody>';

        foreach ($mails as $mail) 
        {
        $messageTableHtml .= '<tr class="odd gradeX">
                            <td>'.$mail->id.'</td>
                            <td>'.$mail->userEmail.'</td>
                            <td>'.$mail->messageStatus.'</td>
                            <td>'.$mail->created_at.'</td>
                            <td>
                            <button type="button" class="btn btn-success" id='.$mail->id.' data-toggle="modal" data-target="#myModal">Read</button>';
        if($mail->messageStatus==0)
        {
        $messageTableHtml .='<button type="button" class="btn btn-info btn-circle" id='.$mail->id.'><i class="fa fa-check"></i></button>';
        }
        else
        {
        $messageTableHtml .='<button type="button" class="btns btn btn-info btn-circle" id='.$mail->id.' style="background-color: grey;border-color:grey"><i class="fa fa-check"></i></button>';        
        }
        $messageTableHtml .='</td>
                            </tr>
                            ';
        
        }
        $messageTableHtml .= '</tbody></table>';
        $messageTableHtml .= '
            <script>
$(document).ready(function() {
    $( ".btn" ).click(function() {
var id = $(this).attr("id")
var _token = $("input[name=_token]").val();
$.post( "messageMarkAsRead", { _token : _token, id : id})
  .done(function( data ) {
    var result = jQuery.parseJSON(JSON.stringify(data));

    if (result.success==1)
    {
    $("#dataTables-example").html(result.updatedMessage);
    }
    else
    {        
    }
  });
});

$( ".btns" ).click(function() {
var id = $(this).attr("id")
var _token = $("input[name=_token]").val();
$.post( "messageMarkAsUnRead", { _token : _token, id : id})
  .done(function( data ) {
    var result = jQuery.parseJSON(JSON.stringify(data));

    if (result.success==1)
    {
    $("#dataTables-example").html(result.updatedMessage);
    }
    else
    {        
    }
  });
});
} );
</script>';


        $Response = array('success' => '1', 'updatedMessage' => $messageTableHtml);
        return $Response;
	}
	    
	public function messageMarkAsUnRead()
    {
        $status['messageStatus']= 0;
        ContactMails::where('id', Input::get('id'))->update($status);

        $mails = ContactMails::all();
        $messageTableHtml = '<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>From</th>
                                            <th>Status</th>
                                            <th>Received At</th>
                                            <th>Read</th>
                                        </tr>
                                    </thead>
                                    <tbody>';

        foreach ($mails as $mail) 
        {
        $messageTableHtml .= '<tr class="odd gradeX">
                            <td>'.$mail->id.'</td>
                            <td>'.$mail->userEmail.'</td>
                            <td>'.$mail->messageStatus.'</td>
                            <td>'.$mail->created_at.'</td>
                            <td>
                            <button type="button" class="btn btn-success" id='.$mail->id.' data-toggle="modal" data-target="#myModal">Read</button>';
        if($mail->messageStatus==0)
        {
        $messageTableHtml .='<button type="button" class="btn btn-info btn-circle" id='.$mail->id.'><i class="fa fa-check"></i></button>';
        }
        else
        {
        $messageTableHtml .='<button type="button" class="btns btn btn-info btn-circle" id='.$mail->id.' style="background-color: grey;border-color:grey"><i class="fa fa-check"></i></button>';        
        }
        $messageTableHtml .='</td>
                            </tr>
                            ';
        
        }
        $messageTableHtml .= '</tbody></table>';

        $messageTableHtml .= '
            <script>
$(document).ready(function() {
    $( ".btn" ).click(function() {
var id = $(this).attr("id")
var _token = $("input[name=_token]").val();
$.post( "messageMarkAsRead", { _token : _token, id : id})
  .done(function( data ) {
    var result = jQuery.parseJSON(JSON.stringify(data));

    if (result.success==1)
    {
    $("#dataTables-example").html(result.updatedMessage);
    }
    else
    {        
    }
  });
});

$( ".btns" ).click(function() {
var id = $(this).attr("id")
var _token = $("input[name=_token]").val();
$.post( "messageMarkAsUnRead", { _token : _token, id : id})
  .done(function( data ) {
    var result = jQuery.parseJSON(JSON.stringify(data));

    if (result.success==1)
    {
    $("#dataTables-example").html(result.updatedMessage);
    }
    else
    {        
    }
  });
});
});
</script>';


        $Response = array('success' => '1', 'updatedMessage' => $messageTableHtml);
        return $Response;
    }
	
	public function notificationAreaMessageList() 
	{
		$messageListHead = '<ul class="dropdown-menu dropdown-messages" id="notifyAreaMessages" aria-expanded="true">';
		
		$unReadMessages = ContactMails::where('messageStatus', 0)->limit(3)->get();
		
		$messageListBody = '';
		if(count($unReadMessages)==0)
		{
		$messageListBody = '<div align="center"><strong>No New Messages</strong></div>';
		}
		else
		{
		
		foreach($unReadMessages as $Messages)
		{
			
			$userMessage = substr($Messages->userMessage,0,20).'...';
			$messageListBody .= '<li>
                            <a href="#">
                                <div>
                                    <strong>'.$Messages->userEmail.'</strong>
                                    <span class="pull-right text-muted">
                                        <em>'.$Messages->created_at.'</em>
                                    </span>
                                </div>
                                <div>'.$userMessage.'</div>
                            </a>
                        </li>';
		}
		}
		
		$messageListContent = '<li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="'.URL::to("/messages").'">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
</ul>
<script>
$(document).ready(function() {
console.log("start");
$( ".dropdown-toggle" ).click(function() {
});
});
</script>';
$messageList = $messageListHead.$messageListBody.$messageListContent;
		$Response = array('success' => '1', 'messageData' => $messageList);
        return $Response;
    }
	
	public function getMessageCount()
	{
	$messageCount = ContactMails::all()->where('messageStatus',0)->count();
	$Response = array('success' => '1', 'messageCount' => $messageCount);
	return $Response;
		}
	
	
	#Profile Settings

    public function profileSettings() {
        return view('admin.settings.profile');
    }

    #Profile Settings Data

    public function adminProfileSettingsData() {
        $adminData = User::where('id', 1)->first();
        $Response = array('success' => '1', 'adminData' => $adminData);
        return $Response;
    }

    #Updates Admin User Name

    public function updateAdminUserName() {
        $adminUserName = Input::except('_token');
        $validation = Validator::make($adminUserName, User::$adminUserName);
        if ($validation->passes()) {
            User::where('id', Input::get('id'))->update($adminUserName);
            $Response = array('success' => '1');
        } else {
            $Response = array('success' => '0', 'err' => $validation->messages());
        }
        return $Response;
    }

    #Updates Admin Email

    public function updateAdminEmail() {
        $adminEmail = Input::except('_token');
        $validation = Validator::make($adminEmail, User::$adminEmail);
        if ($validation->passes()) {
            User::where('id', Input::get('id'))->update($adminEmail);
            $Response = array('success' => '1');
        } else {
            $Response = array('success' => '0', 'err' => $validation->messages());
        }
        return $Response;
    }

    #Updates Admin Email

    public function updateAdminPassword() {
        $oldPassword = Input::get('oldPassword');
        $newPassword['password'] = Input::get('password');
        $validation = Validator::make($newPassword, User::$adminPassword);
        $adminPassword = User::where('id', Input::get('id'))->pluck('password');
        if (Hash::check($oldPassword, $adminPassword)) {
            if ($validation->passes()) {
                $newPassword['password'] = Hash::make($newPassword['password']);
                User::where('id', Input::get('id'))->update($newPassword);
                $Response = array('success' => '1');
            } else {
                $Response = array('success' => '0', 'err' => $validation->messages());
            }
        } else {
            $Response = array('success' => '0', 'err' => 'Old Password is Incorrect');
        }

        return $Response;
    }

    #App Configuration

    public function appConfig() {
        return view('admin.appConfig.appConfig');
    }

}
