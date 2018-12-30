<?php

namespace App;

use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\Models\Media;


class User extends Authenticatable implements HasMedia
{
    use Notifiable,HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','nic_name','birth_date','province_of_birth','place_of_birth','gender',
        'province',
        'city',
        'districts',
        'postal_code',
        'address','phone_number',
        'university','id_identity','id_university','img_profile',
        'lulusan','majors','entry_year','bank_account',
        'img_student_card','img_digital_signature','img_identity','grade_point_average','email','password','status','grade_test','date_end'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(150)
            ->height(150)
            ->performOnCollections('img_profile');
    }
}
