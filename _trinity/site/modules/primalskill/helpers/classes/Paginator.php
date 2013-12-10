<?php
/**
 * Helper that brings functions related to pagination
 */
class Paginator
{
	/**
	 * Function for creating the data for pagination
	 * @param int $total the number of total elements
	 * @param int $current The current page we are on
	 * @param int $nr_per_page The size of pagination, or results per page - optional, default set to 20
	 * @return array This will hold the limit and offset
	 */
	public static function paginate($total = 0, $current = 0, $nr_per_page = 20)
	{
		$pagination = ( is_numeric($nr_per_page) && $nr_per_page > 0 )? $nr_per_page : 20;

		if ( $total > $pagination )
		{
			$nr_pages = ceil($total/intval($pagination));
		}
		else
		{
			$nr_pages = 1;
		}
		
		if ( $current > $nr_pages )
		{
			$current = $nr_pages;
		}
		
		if ( $current <= 1 )
		{
			$current = 1;
		}
		
		$data = array();
		$data['nr_pages'] = $nr_pages;
		$data['limit'] = $pagination;
		$data['offset'] = ($current-1)*$pagination;
		$data['pagination'] = $pagination;
		
		return $data;
	}
}