<?php

class ChatController extends BaseController {


	protected $layout = 'layouts.profile';


	public function index()
    {
       return View::make('chat.index');
    }

}
