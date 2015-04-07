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
        $profiles = Profile::with(['languageSpoken','languagToLearn'])->get();
     	$this->layout->content = View::make('profiles.index');
        return View::make('profiles.index')
            ->with('profiles', $profiles);
    }

    public function create()
    {

        $languages = DB::table('language')->orderBy('name', 'asc')->lists('name','id');
        // $languages = Language::select('id', 'name')->get();
        $this->layout->content = View::make('profiles.create');
        return View::make('profiles.create')
            ->with('languages', $languages);
    }

    public function store() {
        // validate
        $rules = array(
            'firstname'          => 'required',
            'lastname'           => 'required',
            'email'              => 'required|email',
            'birth_date'         => 'required|numeric',
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
            // store
            // todo : get languages ids and pass it to profile obj
            $profile = new Profile;
            $profile->name       = Input::get('firstname');
            $profile->name       = Input::get('lastname');
            $profile->email      = Input::get('email');
            $profile->birth_date = Input::get('birth_date');
            $nerd->save();

            // redirect
            Session::flash('message', 'Successfully created nerd!');
            return Redirect::to('profiles');
        }
    }


}
