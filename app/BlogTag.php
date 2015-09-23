<?php namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class BlogTag extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'blog_tag';

	### Join
	public function getBlogs() {
        #return $this->belongsToMany('App\Receipe', 'receipe_favorites', 'user_id', 'receipe_id')->select(array('receipe.id', 'receipe.ReceipeName', 'receipe.ReceipeImage'));
        return $this->belongsToMany('App\Blog', 'blog_tag', 'tag_id', 'user_id')->select(array('blog.id', 'blog.blogTitle', 'blog.blogUrl'));
    }

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

}
