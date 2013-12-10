<?php

class Controller_Welcome extends Controller_Public 
{
	public function action_index()
	{		
		$this->_view = new View_Welcome();
	}

} 
