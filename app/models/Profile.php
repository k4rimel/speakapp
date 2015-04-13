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
    public function toString() {
        
        $firstname = str_replace(' ', '-', $this->firstname);
        $lastname = str_replace(' ', '-', $this->lastname);
        return $firstname.'.'.$lastname;
    }
    public function user() {
        return $this->belongsTo('User', 'user_id');
    }


}