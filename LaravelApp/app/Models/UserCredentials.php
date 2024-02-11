<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;


class UserCredentials extends Model implements AuthenticatableContract
{

    use Authenticatable;
    /** 
    *@var string; 
    */
    protected $table = 'user_credentials';

    /** 
    *@var string; 
    */
    protected $primaryKey = 'credentials_id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'user_id', 'email', 'user_name', 'password',
    ];

    protected $hidden = [  
        'password',
        'remember_token',
    ];

    public function userInfo()
    {
        return $this->belongsTo(UserInfo::class, 'user_id');
    }
}
