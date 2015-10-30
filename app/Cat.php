<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Cat extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable,
        CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cat';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['catTitle', 'catContent', 'catStatus'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    public static $postCat = array(
        'catTitle' => 'required',
        'catContent' => 'required',
    );

}
