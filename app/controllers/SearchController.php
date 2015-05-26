<?php

class SearchController extends BaseController {

	protected $layout = 'layouts.profile';

	public function search() {
		$query  = Input::get('q');

		$results = Profile::search($query)
		            ->with('users')
		            ->with('gender')
		            ->get();
        if(count($results) === 0) {
        	$results = array();
        	$results[]= (object)array('results' => 'No result found for your search.');
        }
        // dd($results);
        $this->layout->content = View::make('search.results');
        return View::make('search.results')
            ->with('results', $results);
	}


}