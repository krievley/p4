<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
        
        /**
        * Construct function.
        */
        public function __construct()
        {
            //Token filter applied to all post requests.
            $this->beforeFilter('csrf', array('on' => 'post'));
        }
        
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
