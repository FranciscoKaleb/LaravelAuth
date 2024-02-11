<?php
// app/Models/UserInfo.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class UserInfo extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_info';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

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
        'first_name',
        'last_name',
        'middle_name',
        'birth_date',
        'gender',
        'phone_number',
        'language',
        'address_code',
        'country',
        'address_string',
    ];

    public function credentials()
    {
        return $this->hasOne(UserCredentials::class, 'user_id');
    }

    public function roles()
    {
        return $this->hasOne(UserRoles::class, 'user_id');
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'birth_date' => 'date',
    ];

    // Add any additional methods, relationships, or customization as needed
}
?>
