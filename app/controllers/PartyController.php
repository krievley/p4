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
            $party = Party::with('guests')
                        ->where('website', '=', $website)
                        ->get();
            $guests = $party->first()->guests;
            //var_dump($guests->count());
            
            return View::make('party')
                    ->with('party', $party)
                    ->with('guests', $guests);
        }
        
        //Processes the RSVP form.
        public function postResponse() {
            //Create a new guest.
            $guest = new Guest;
            $guest->email = Input::get('email');
            $guest->name = Input::get('name');
            //Save guest to database.
            $guest->save();
            //Add guest id and party id to pivot table.
            $guest->parties()->attach(Input::get('id'));
            
            return Redirect::back()
                    ->with('message', 'Thank you for your RSVP.');
        }
}
