<?php

class View_Inspections_Element
{
//	protected $_template = 'inspections/element';
	
	protected $_layout = 'inspections/element';
	protected $_partials = array();
		
	public $element = null;
	
	public $is_radio = false;
	
	public $is_select = false;
	
	public $name = null;
	
	public $data = null;
	
	public $is_blank = null;
	
	public $selected_val = array();

	public function __construct($element = null, $name = null, $selected_val = array(), $errors = array(), $is_blank = true)
	{		
		$this->element = $element;
		
		$this->name = $name;
		
		$this->selected_val = $selected_val;
		
		$this->errors = $errors;
		
		$this->is_blank = $is_blank;
		
		$this->_generate_element();
	
	}
	
	protected function _generate_element()
	{	
		$i = 0;

		foreach($this->element['data'] as $key => $value)
		{
			$this->data[$i]['id'] = $key;
			$this->data[$i]['text'] = $value;
			
			if ( !is_array($this->selected_val) )
			{
				$this->selected_val = array($this->selected_val);
			}

			if ( in_array((string)$this->data[$i]['id'], $this->selected_val, true) )
			{
				$this->data[$i]['selected'] = true;
			}	

			$i++;
			
		}		
		
		if ( $this->element['type'] == 'radio' )
		{
			$this->is_radio = true;
		}

		if ( $this->element['type'] == 'select' )
		{
			$this->is_select = true;	
		}
		
		if ( $this->element['type'] == 'checkbox' )
		{
			$this->is_checkbox = true;	
		}		
	}
	
	public function error_message()
	{
		if (isset($this->errors))
		{
			return $this->errors;
		}
		
		return false;
	}

}