<?php

class Profile extends Eloquent {
	protected $table = 'profile';
	protected $fillable = [];
	public $timestamps = false;

	protected $primaryKey = 'idProfile';

    public function languageSpoken()
    {
       	return $this->belongsToMany('Language', 'profile_language_spoken', 'profileId', 'languageId');
    }    
    public function languagToLearn()
    {
       	return $this->belongsToMany('Language', 'profile_language_to_learn', 'profileId', 'languageId');
    }


}