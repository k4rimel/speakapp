<?php

class Location extends Eloquent {
	protected $fillable = [];
 	public $timestamps = false;

 	public function toString()
 	{
 		return $this->city.', '.$this->country;
 	}
}