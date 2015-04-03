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
        $languages = Language::all();
        $this->layout->content = View::make('profiles.create');
        return View::make('profiles.create')
            ->with('languages', $languages);;
    }


}
