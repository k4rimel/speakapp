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
        	$results = null;
        	$msg = 'No result found for your search.';
        }
        $this->layout->content = View::make('search.results');
        return View::make('search.results')
            ->with('results', $results);
	}
	public function searchByTag($q) {
		dd($q);
	}

}