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
    public function getFriends() {
        return $this->belongsToMany('Profile', 'relationship', 'profile_one_id', 'profile_two_id');
    }
}