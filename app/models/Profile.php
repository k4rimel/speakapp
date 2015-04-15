<?php

class Profile extends Eloquent  {
	protected $fillable = [];
	public $timestamps = false;

    public function languageSpoken()
    {
       	return $this->belongsToMany('Language', 'profile_language_spoken', 'profile_id', 'language_id');
    }    
    public function languageToLearn()
    {
       	return $this->belongsToMany('Language', 'profile_language_to_learn', 'profile_id', 'language_id');
    }
    public function hometownLocation() 
    {
        return $this->belongsTo('Location', 'hometown_location_id');
    }    
    public function currentLocation() 
    {
        return $this->belongsTo('Location', 'current_location_id');
    }
    public function toString() {
        
        $firstname = str_replace(' ', '-', $this->firstname);
        $lastname = str_replace(' ', '-', $this->lastname);
        return $firstname.'.'.$lastname;
    }
    public function user() {
        return $this->belongsTo('User', 'user_id');
    }
    public function isFriend($profile) {
        if(isset($profile) && get_class($profile) == 'Profile') {
            $result = DB::table('relationship')
                            ->where('profile_one_id', '=', $this->id)
                            ->where('profile_two_id','=', $profile->id)
                            ->where('status','=', '1')
                            ->count();
            return $result > 0;
        }
    }
    public function friendsCount() {
        $profileId = $this->id;
        $friendsCount = DB::table('relationship')
                            ->where(function($query) use($profileId) {
                                $query->where('profile_one_id', '=', $profileId);
                                $query->or_where('profile_two_id','=', $profileId);
                            })
                            ->where('status','=', '1')
                            ->count();
        return $friendsCount;
    }
    public function sendFriendRequest($profile) {
        // INSERT INTO `relationship` (`user_one_id`, `user_two_id`, `status`, `action_user_id`)
        // VALUES (1, 2, 0, 1)
    }
    public function getFriendList() {
        $profileId  = $this->id;
        $friends    = DB::table('relationship')
                            ->where(function($query) use($profileId) {
                                $query->where('profile_one_id', '=', $profileId);
                                $query->or_where('profile_two_id','=', $profileId);
                            })
                            ->where('status','=', '1');
        return $friends;
    }
    public function pendingRequests() {
        $profileId  = $this->id;
        $pendingRequests    = DB::table('relationship')
                            ->where(function($query) use($profileId) {
                                $query->where('profile_one_id', '=', $profileId);
                                $query->or_where('profile_two_id','=', $profileId);
                            })
                            ->where('status','=', '0')
                            ->where('action_user_id','!=', '1');
        return $pendingRequests;
    }
    public function acceptFriendRequest($profile) {
        if(isset($profile) && get_class($profile) == 'Profile') {
            $result    = DB::table('relationship')
                                ->where('profile_one_id', '=', $profile->id)
                                ->where('profile_two_id','=', $this->id)
                                ->update(array('status' => '1', 
                                               'action_user_id' => $this->id));
            return $result;
        }
    }
}