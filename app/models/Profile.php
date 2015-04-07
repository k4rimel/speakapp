<?php

class Profile extends Eloquent {
	protected $table = 'profile';
	protected $fillable = [];
	public $timestamps = false;


    public function languageSpoken()
    {
       	return $this->belongsToMany('Language', 'profile_language_spoken', 'profile_id', 'language_id');
    }    
    public function languagToLearn()
    {
       	return $this->belongsToMany('Language', 'profile_language_to_learn', 'profile_id', 'language_id');
    }


}