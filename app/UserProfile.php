<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profiles';

    protected $fillable = [
        'user_id',
        'title',
        'first_name',
        'last_name',
        'born',
        'gender',
        'city_id',
        'address',
        'image_profile',
        'image_cover',
		'quote',
        'bio',
        'phone',
        'email',
        'website',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
    ];
	//protected $dates = ['created_at', 'updated_at'];

    public function user(){
        return $this->belongsTo('App\User');
    }

	public function city() {
		return $this->belongsTo('App\City');
	}

	/*public function isConnect($userId, $memberId) {
        if ($userId == $memberId) return true;
        else {
            $connect = DB::table('contact')
                ->where('user_id', $userId)
                ->where('id', $memberId);

            if ($connect->first()) return true;
            else return false;
        }
    }*/
}
