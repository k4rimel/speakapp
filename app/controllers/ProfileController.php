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
     	$this->layout->content = View::make('profiles.index');
        return View::make('profiles.index')
            ->with('profiles', $profiles);
    }

    public function create()
    {
        $languages = DB::table('language')->orderBy('name', 'asc')->lists('name','id');
        $this->layout->content = View::make('profiles.create');
        return View::make('profiles.create')
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


}
