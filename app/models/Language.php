<?php

class Language extends Eloquent {
	protected $table = 'language';
	protected $fillable = [];
 	public $timestamps = false;
 	protected $primaryKey = 'idLanguage';
}