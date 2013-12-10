<?php


class HTTP_Exception extends Kohana_HTTP_Exception {
 
    /**
     * Generate a Response for all Exceptions without a more specific override
     *
     * The user should see a nice error page, however, if we are in development
     * mode we should show the normal Kohana error page.
     *
     * @return Response
     */
	public function get_response()
    {
		if (Kohana::$environment >= Kohana::DEVELOPMENT)
        {
            // Show the normal Kohana error page.
            return parent::get_response();
        }
        else
        {
			$view = new View_Error_Default();
			$psk_me = new Primalskill_Mustache_Engine( $view );

			$response = Response::factory()
				->status($this->getCode())
				->body($psk_me->render());

	        return $response;
		}
    }
}


