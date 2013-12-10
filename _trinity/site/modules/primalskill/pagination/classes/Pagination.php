<?php
class Pagination
{
	private $output = array();
	
	const LINK = 0;
	const NEXT = 1;
	const LAST = 2;
	const PREVIOUS = 3;
	const FIRST = 4;
	const DOTS = 5;
	
	private function __construct($data = array('total' => 1, 'items_per_page' => 10, 'base_url' => 'http://www.cs.dev',  'current_page' => 1, 'links_to_show' => 3, 'page_name' => 'page'))
	{
		$pagenumber = ceil($data['total']/$data['items_per_page']);
		
		if($data['current_page'] > $pagenumber)
		{
			$data['current_page'] = $pagenumber;
		}
		
		if($data['current_page'] < 1)
		{
			$data['current_page'] = 1;
		}
		
		
		if($data['current_page'] > 1)
		{
			$first = $data['base_url'].'?'.$data['page_name'].'=1';
			$previous = $data['base_url'].'?'.$data['page_name'].'='.($data['current_page']-1);
		}
		else
		{
			$first = $data['base_url'].'?'.$data['page_name'].'=1';
			$previous = $data['base_url'].'?'.$data['page_name'].'=1';
		}
		
		$item['url'] = $first;
		$item['type'] = Pagination::FIRST;
		array_push($this->output,$item);
			
		$item['url'] = $previous;
		$item['type'] = Pagination::PREVIOUS;
		array_push($this->output,$item);
			
		$item['url'] = $data['base_url'].'?'.$data['page_name'].'=1';
		$item['type'] = Pagination::LINK;
		$item['nr'] = 1;
		array_push($this->output,$item);
		
		if($data['links_to_show']%2 == 0)
		{
			$linknumber = $data['links_to_show']-1;
		}
		else
		{
			$linknumber = $data['links_to_show'];
		}
		
		$leftright = floor($linknumber/2);
		
		if($data['current_page']+$leftright > $linknumber+1)
		{
			$item['url'] = '';
			$item['type'] = Pagination::DOTS;
			array_push($this->output,$item);
		}
		
		for($i = $data['current_page']-$leftright;$i <= $data['current_page']+$leftright;$i++)
		{
			if($i > 1 && $i < $pagenumber) 
			{
				$item['url'] = $data['base_url'].'?'.$data['page_name'].'='.$i;
				$item['type'] = Pagination::LINK;
				$item['nr'] = $i;
				array_push($this->output,$item);
			}
		}
		
		if($data['current_page']+$leftright < $pagenumber)
		{
			$item['url'] = '';
			$item['type'] = Pagination::DOTS;
			array_push($this->output,$item);
		}
		
		
		
		$item['url'] = $data['base_url'].'?'.$data['page_name'].'='.$pagenumber;
		$item['type'] = Pagination::LINK;
		$item['nr'] = $pagenumber;
		array_push($this->output,$item);
		
		if($data['current_page'] < $pagenumber)
		{
			$previous = $data['base_url'].'?'.$data['page_name'].'='.($data['current_page']+1);
			$last = $data['base_url'].'?'.$data['page_name'].'='.$pagenumber;
		}
		else
		{
			$previous = $data['base_url'].'?'.$data['page_name'].'='.$pagenumber;
			$last = $last = $data['base_url'].'?'.$data['page_name'].'='.$pagenumber;
		}
		
		$item['url'] = $previous;
		$item['type'] = Pagination::NEXT;
		array_push($this->output,$item);
			
		$item['url'] = $last;
		$item['type'] = Pagination::LAST;
		array_push($this->output,$item);
	}
	
	public static function factory($data = array('total' => 1, 'items_per_page' => 10, 'base_url' => 'http://www.cs.dev', 'current_page' => 1, 'links_to_show' => 3, 'page_name' => 'page'))
    {
		return new Pagination($data);
    }	
	
	public function render()
	{
		return $this->output;
	}
}