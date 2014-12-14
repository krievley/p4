<?php

class UserController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default User Controller
	|--------------------------------------------------------------------------
	|
	| This Controller handles the login and registration for users.
	|
	*/
        
        // Instantiate a new UserController instance.
        public function __construct()
        {
            //Guest filter applied to registration form.
            $this->beforeFilter('guest', array('on' => 'postRegister'));
        }
        
        //This function handles the login form.
	public function postLogin() {
            //Get form input.
            $email = Input::get('email');
            $password = Input::get('password');
            //Check to see if credentials are valid.
            //If yes, load the user's dashboard.
            if (Auth::attempt(array('email' => $email, 'password' => $password), true))
            {
                return Redirect::to('/members/dashboard');
            }
            //If no, redirect back to login with error message.
            else {
                return Redirect::to('/')
                        ->with('flash_message', 'Log in failed; please try again.')
                        ->withInput();
            }
        }
        
        //This function handles the registration form.
        public function postRegister() {
            //Validate user input against model rules.
            $validator = Validator::make(Input::all(), User::$rules);
            //If validated, add new user to the database.
            if ($validator->passes()) {
                $user = new User;
                $user->email    = Input::get('email');
                $user->password = Hash::make(Input::get('password'));
                
                # Try to add the user 
                try {
                    $user->save();
                }
                # Fail
                catch (Exception $e) {
                    return Redirect::to('/')->with('flash_message', 'Sign up failed; please try again.')->withInput();
                }

                # Log the user in
                Auth::login($user);
                
                //Set up a new user dashboard.
                return Redirect::to('/members/dashboard')->with('flash_message', 'You have successfully registered!');
            }
            //If not validated, redirect to login with errors.
            else {
                return Redirect::to('/')
                        ->with('flash_message', 'Sign up failed; please try again.')
                        ->withInput()
                        ->withErrors($validator);
            }
        }
        
        //Function to log out the user.
        public function getLogout() {
            Auth::logout();
            return Redirect::to('/');
        }
}
