<?php

class HTTP_Exception_404 extends Kohana_HTTP_Exception_404 {
 
    /**
     * Generate a Response for the 404 Exception.
     *
     * The user should be shown a nice 404 page.
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
			$view = new View_Error_404();
			$psk_me = new Primalskill_Mustache_Engine( $view );

			$response = Response::factory()
							->status(404)
							->body($psk_me->render());

	        return $response;
		}
    }
}