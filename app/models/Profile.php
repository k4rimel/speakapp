<?php

use Nicolaslopezj\Searchable\SearchableTrait;

class Profile extends Eloquent  {

    use SearchableTrait;

    protected $searchable = [
       'columns' => [
           'firstname' => 10,
           'lastname' => 10,
           'users.username' => 5,
           'description' => 2,
           'gender.name' => 2,
       ],
       'joins' => [
           'gender' => ['profiles.gender_id','gender.id'],
           'users' => ['profiles.user_id','users.id'],
       ],
   ];


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
    public function fullName() {
        $firstname = str_replace(' ', '-', $this->firstname);
        $lastname = str_replace(' ', '-', $this->lastname);
        return $firstname.' '.$lastname;
    }
    public function gender() {
        return $this->belongsTo('Gender', 'gender_id');
    }
    public function users() {
        return $this->belongsTo('User', 'user_id');
    }
    public function getStatus($profile) {
        $thisId = $this->id;
        if(isset($profile) && get_class($profile) == 'Profile') {
            $profileId = $profile->id;
            $result = DB::table('relationship')
                            ->where(function($query)use($thisId, $profileId) {
                                $query->where('profile_one_id', '=', $thisId);    
                                $query->where('profile_two_id','=', $profileId);
                                $query->orWhere(function($query)use($thisId, $profileId) {
                                    $query->where('profile_one_id', '=', $profileId);
                                    $query->where('profile_two_id','=', $thisId);
                                });
                            })
                            ->get();
            if(!$result) {
                $result = -1;
                return $result;
            }
            return $result[0]->status;
        }
    }
    public function friendsCount() {
        $profileId = $this->id;
        $friendsCount = DB::table('relationship')
                            ->where(function($query) use($profileId) {
                                $query->where('profile_one_id', '=', $profileId);
                                $query->orWhere('profile_two_id','=', $profileId);
                            })
                            ->where('status','=', '1')
                            ->count();
        return $friendsCount;
    }
    public function sendFriendRequest($profileId) {
        $inserted = DB::table('relationship')->insert(array('profile_one_id' => $this->id,
                                            'profile_two_id'=> $profileId,
                                            'status' => 0,
                                            'action_user_id' => $this->id));
        return $inserted;
    }
    public function getMessages() {

    }
    public function getNotifications() {
        $notifications = array();
    }
    public function getFriendList() {
        $profileId  = $this->id;
        $friends    = DB::select('SELECT * FROM profiles,relationship 
                                WHERE 
                                ( 
                                    relationship.profile_one_id = ? OR  relationship.profile_two_id = ?
                                )
                                AND (
                                     (relationship.profile_two_id = profiles.id AND  profiles.id <> ?) 
                                     OR (relationship.profile_one_id = profiles.id  AND  profiles.id <> ?)
                                )
                                AND status = 1
                                ORDER BY profiles.firstname
            ',array($profileId,$profileId,$profileId,$profileId));
        $profiles = array();

        if(count($friends) >= 1) {
            
            foreach ($friends as $friend) {
                $profiles[]= Profile::find($friend->id);
            }
        }
        return $profiles;
    }
    public function allPendingRequests() {
        $profileId  = $this->id;
        // TODO : ORDER BY DATE
        $pendingRequests    = DB::select('SELECT relationship.*, profiles.id FROM profiles,relationship 
                                WHERE 
                                (
                                    relationship.profile_one_id = ? OR  relationship.profile_two_id = ?
                                )
                                AND (
                                     (relationship.profile_two_id = profiles.id AND  profiles.id <> ?) 
                                     OR (relationship.profile_one_id = profiles.id  AND  profiles.id <> ?)
                                )
                                AND status = 0
                                AND action_user_id <> ?
                                ORDER BY profiles.firstname
            ',array($profileId,$profileId,$profileId,$profileId,$profileId));
        $profiles = array();
        foreach ($pendingRequests as $request) {
            $profiles[]= Profile::find($request->id);
        }
        return $profiles;
    }
    public function latestPendingRequests() {
        $profileId  = $this->id;
        // TODO : ORDER BY DATE
        $pendingRequests    = DB::select('SELECT relationship.*, profiles.id FROM profiles,relationship 
                                WHERE 
                                (
                                    relationship.profile_one_id = ? OR  relationship.profile_two_id = ?
                                )
                                AND (
                                     (relationship.profile_two_id = profiles.id AND  profiles.id <> ?) 
                                     OR (relationship.profile_one_id = profiles.id  AND  profiles.id <> ?)
                                )
                                AND status = 0
                                AND action_user_id <> ?
                                ORDER BY profiles.firstname
                                LIMIT 3
            ',array($profileId,$profileId,$profileId,$profileId,$profileId));
        $profiles = array();
        foreach ($pendingRequests as $request) {
            $profiles[]= Profile::find($request->id);
        }
        return $profiles;
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
    public function getLastConnected()
    {
        $user = $this->users;
        $now = date("Y-m-d H:i:s");

        $lastConnectedTS = strtotime($user->last_connection_date);
        $nowTS = strtotime($now);
        $str = Utils::formatDiff($lastConnectedTS, $nowTS);
        return $str;
    }
}