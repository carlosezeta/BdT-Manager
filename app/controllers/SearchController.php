<?php

class SearchController extends BaseController {
	public function getIndex()
	{
		return View::make('searchuser.index');
	}

	public function postSearch()
	{
		$return = array();
		$term = Input::get('term');

		$users = User::all();

		foreach($users as $user) {
			if (strips($user->username, $term) !== FALSE) $return[] =$user;
		}
		return Response::json($return);
	}
}