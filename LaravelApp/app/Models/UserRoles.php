<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model 
{
    /** 
    *@var string; 
    */
    protected $table = 'user_roles';

    /** 
    *@var string; 
    */
    protected $primaryKey = 'role_id';

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
        'user_id', 'role_',
    ];


    public function userInfo()
    {
        return $this->belongsTo(UserInfo::class, 'user_id');
    }
}
