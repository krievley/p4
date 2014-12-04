<?php

class PartyController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Party Controller
	|--------------------------------------------------------------------------
	|
	| This Controller handles the party pages created by registered users.
	|
	*/
    
        // Instantiate a new PartyController instance.
        public function __construct()
        {

        }

        //This function displays the party page.
        public function getWebsite($website) {
            $party = Party::where('website', '=', $website)->get();
            $user = User::where('id', '=', $party->first()->user_id)->get();
            //print_r($party);
            
            return View::make('party')
                    ->with('user', $user)
                    ->with('party', $party);
        }
}
