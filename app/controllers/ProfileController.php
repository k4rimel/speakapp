<?php

class ProfileController extends BaseController {

 	protected $layout = 'layouts.profile';


	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function index()
    {
        $profiles = Profile::with(['languageSpoken','languageToLearn'])->get();
     	$this->layout->content = View::make('admin.profiles.index');
        return View::make('admin.profiles.index')
            ->with('profiles', $profiles);
    }

    public function create()
    {
        $languages = DB::table('languages')->orderBy('name', 'asc')->lists('name','id');
        $this->layout->content = View::make('admin.profiles.create');
        return View::make('admin.profiles.create')
            ->with('languages', $languages);
    }

    public function store() {
        // TODO : generate password
        $rules = array(
            'firstname'          => 'required',
            'lastname'           => 'required',
            'email'              => 'required|email',
            'birth_date'         => 'date|date_format:Y-m-d',
            'spoken_languages'   => 'required',
            'languages_to_learn' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('profiles/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            
            $profile                = new Profile;

            $profile->firstname     = Input::get('firstname');
            $profile->lastname      = Input::get('lastname');
            $profile->email         = Input::get('email');
            $profile->birthday      = Input::get('birth_date');

            if($profile->save()) {

                $profile_id = $profile->id;
                $spoken_languages = (count(Input::get('spoken_languages')) > 1 ? Input::get('spoken_languages') : array(Input::get('spoken_languages')));
                $languages_to_learn = (count(Input::get('languages_to_learn')) > 1 ? Input::get('languages_to_learn') : array(Input::get('languages_to_learn')));

                $profile->languageSpoken()->sync($spoken_languages, $profile_id);
                $profile->languageToLearn()->sync($languages_to_learn, $profile_id);
            }
            // redirect
            Session::flash('message', 'Successfully created profile !');
            return Redirect::to('profiles');
        }
    }
    public function signup() {
        $profile = new Profile;
        $profile->firstname     = Input::get('firstname');
        $profile->lastname      = Input::get('lastname');
        $profile->email         = Input::get('username');
        $profile->password      = Hash::make(Input::get('password'));
        $profile->save();

        Session::flash('message', 'Welcome to speakapp'.$profile->firstname.'. We sent you an email to validate your account.');
        return Redirect::to('profile/'.$profile->toString());
    }
    public function getProfileFromURL($name = null) {
        $profileNameTab = explode(".", $name);
        $profileFirstName = str_replace('-', ' ', $profileNameTab[0]);
        $profileLastName = str_replace('-', ' ', $profileNameTab[1]);

        $profile = Profile::where('firstname', '=', $profileFirstName)->where('lastname', '=' , $profileLastName)->first();

        return $profile;
    }

    public function show($profilename) {
        if (Auth::check())
        {
            $profile = Auth::user()->profile;
            // $profile = $this->getProfileFromURL($profilename);
            return View::make('profile.page')
                ->with('profile', $profile);
        }
    }
    public function signin() {
        $credentials = Input::only('username', 'password');
        if (Auth::attempt($credentials)) {
            return Response::make('profile page');
            // return Redirect::intended('/');
        }
        return Response::make('failed auth');
        // return Redirect::to('/');
    }    
    public function logout() {
        $Auth::logout();
        return Response::make('You are now logged out. :(');
    }

}
