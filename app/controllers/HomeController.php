<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| This Controller handles the login and registration for
        | the home page.
	|
	*/
        
    
        //This function handles the login form.
	public function postLogin() {
            //Check to see if credentials are valid.
            //If yes, load the user's dashboard.
            //If no, redirect back to login with error message.
        }
        
        //This function handles the registration form.
        public function postRegister() {
            //Validate user input against model rules.
            //If validated, add new user to the database.
            //Set up a new user dashboard.
            //If not validated, redirect to login with errors.
        }

}
