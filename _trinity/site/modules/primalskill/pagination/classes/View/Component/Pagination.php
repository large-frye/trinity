<?php
/**
 * Components class representing a pagination element
 */
class View_Component_Pagination extends View_Layout
{

	// Template file of pagination
	protected $_template = 'component/pagination';
	
	
	public $results_per_page = null;
	
	public $pagination_links = null;
	
	public $sector_id = null;
	
	public $url = null;
	
	public $results_per_page_url;
	
	public $is_results = false;
	
	/**
	 * @var Int Multiplier for results per page, default 5
	 */
	public $results_multiplier = 5;
	
	/**
	 * @var boolean If no elements to show, this will prevent mustache to display anything
	 */
	public $display_pagination = false;
	
	
	/**
	 * @return void
	 */
	public function __construct()
	{
		
		// Load the neccessary assets for the pagination
		if ( class_exists('Asset') )
		{
			Asset::instance()
				->css(
					'component/pagination'
				)
				->js(
					'component/pagination'
				);
		}
		
		if ( isset($_GET['results']) )
		{
			$this->results_per_page = $_GET['results'];
		}
	}


	/** 
	 * Returns an array with the possible results per page
	 */
	public function results_nr()
	{
		$tmp = array();
		
		$urls = explode('results',$this->url,2);
		
		if ( isset($urls[1]) && strpos($urls[1],'&') !== false )
		{
			$urls[1] = substr($urls[1],strpos($urls[1],'&'));
		}
		else
		{
			unset($urls[1]);
		}
		
		for ($i = $this->results_multiplier; $i <= 5 * $this->results_multiplier; $i += $this->results_multiplier)
		{
			$selected = ($this->results_per_page == $i) ? ' selected="selected" ' : '';

			if ( strpos($urls[0],'?') !== false ) 
			{
				switch(substr($urls[0],strlen($urls[0])-1))
				{
					case '?':
						$url = $urls[0].'results='.$i;
						break;
					case '&':
						$url = $urls[0].'results='.$i;
						break;
					default : 
						$url = $urls[0].'&results='.$i;
						break;
				}
			}
			else
			{
				$url = $urls[0].'?results='.$i;
			}
			
			if ( isset($urls[1]) )
			{
				$url .= $urls[1];
			}
			
			$tmp[] = array
			(
				'value' => $i,
				'str' => $i,
				'selected' => $selected,
				'url' =>  $url
			);
		}
		
		return $tmp;
	}
	
	/**
	 * Function for building the pagination links
	 * @param int $total the toal number of items
	 * @param int $pagination the size of pagination
	 * @param int $nr_pages the number of pages
	 * @param int $current The current page we are on
	 */
	public function build_pagination($total,$pagination,$nr_pages,$current,$url, $page_name = 'page')
	{
		if ( $nr_pages > 1 )
		{	
			$this->display_pagination = true;
			$this->current_page = $current; 
			
	//		$url = $this->url;
		/*	
			if ( isset($_GET['page']) )
			{
				$url = substr($url,0,strpos($url,'&page'));
			}
		*/	
		//	$this->url = $url;
			
			$parts = explode('?', $url);
			if ( isset($parts[1]) )
			{
				$url = $parts[1];
			}
			else
			{
				$url = '';
			}
			
			$urls = explode($page_name,$url,2);
			
			if ( isset($urls[1]) && strpos($urls[1],'&') !== false )
			{
				$urls[1] = substr($urls[1],strpos($urls[1],'&'));
			}
			else
			{
				unset($urls[1]);
			}
			
			$urls[0] = $parts[0].'?'.$urls[0];
			
			$data = array
			(
				'total' => $total, 
				'items_per_page' => $pagination, 
				'base_url' => $urls[0],
				'current_page' => $current, 
				'links_to_show' => 3,
				'page_name' => $page_name
			);
		
			$pag = Pagination::factory($data);
			$tmp = $pag->render();
		
			foreach($tmp as $key => $value)
			{
				switch ( $value['type'] )
				{
					case Pagination::FIRST:
					{
						$tmp[$key]['nr'] = '<<';
						$tmp[$key]['class'] = 'pag-first';
						
						break;
					}
					case Pagination::PREVIOUS:
					{
						$tmp[$key]['nr'] = 'Previous';
						$tmp[$key]['class'] = 'pag-prev';
						
						break;
					}
					case Pagination::NEXT:
					{
						$tmp[$key]['nr'] = 'Next';
						$tmp[$key]['class'] = 'pag-next';
						
						break;
					}
					case Pagination::LAST:
					{
						$tmp[$key]['nr'] = '>>';
						$tmp[$key]['class'] = 'pag-last';
						
						break;
					}
					case Pagination::DOTS:
					{
						$tmp[$key]['nr'] = '...';
						$tmp[$key]['url'] = 'javascript:void(0);';
						break;
					}	
					default:
					{
						$tmp[$key]['nr'] = sprintf('%02d', $tmp[$key]['nr']);
						break;
					}
				}
				
				if ( strpos($urls[0],'?') !== false ) 
				{
					switch(substr($urls[0],strlen($urls[0])-1))
					{
						case '?':
							$tmp[$key]['url'] = str_replace('?'.$page_name.'=',$page_name.'=',$tmp[$key]['url']);
							break;
						case '&':
							$tmp[$key]['url'] = str_replace('?'.$page_name.'=',$page_name.'=',$tmp[$key]['url']);
							break;
						default : 
							$tmp[$key]['url'] = str_replace('?'.$page_name.'=','&'.$page_name.'=',$tmp[$key]['url']);
							break;
					}
				}
			

				if ( isset($urls[1]) )
				{
					$tmp[$key]['url'] .= $urls[1];
				}
				
				if ( intval($tmp[$key]['nr']) == $this->current_page )
				{
					$tmp[$key]['class'] = ' selected';
				}
			
			}

			$this->pagination_links = $tmp;   //var_dump($this->pagination_links);exit;

		}
	}
	
}