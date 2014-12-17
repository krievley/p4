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
            //Validate user input against model rules.
            $validator = Validator::make(Input::all(), Guest::$rules, Guest::$messages);
            //If validated, add new user to the database.
            if ($validator->passes()) {
                //Create a new guest.
                $guest = new Guest;
                $guest->email = Input::get('email');
                $guest->name = Input::get('name');
                $guest->attending = Input::get('attend');
                $guest->items = Input::get('items');
                //Save guest to database.
                $guest->save();
                //Add guest id and party id to pivot table.
                $guest->parties()->attach(Input::get('id'));

                return Redirect::back()
                        ->with('message', 'Thank you for your RSVP.');
            }
            else {
                return Redirect::back()
                        ->withInput()->withErrors($validator);
            }
        }
        
        //Processes the item form.
        public function postItem() {
            
        }
}
