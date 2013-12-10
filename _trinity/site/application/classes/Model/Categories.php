<?php
/**
 * Model for handling categories
 * This is a self handling model, meaning it creates the table if it does not exist
 */
class Model_Categories extends Model_Core
{
	protected $_categories_table = 'categories';
	
	/**
	 * @var array Holds the errors
	 */
	private $_errors = array();
	
	/**
	 * @var array Holds a single category
	 */
	private $_category = array();
	
	/**
	 * Adds a category
	 * Contains validation
	 * @param int $parent_id OPTIONAL the id of the parent, if set, it has to be a valid parent category
	 * @param string $name The name of the category
	 * @return boolean
	 */
	public function add($parent_id = null, $name = '')
	{	
		if ( $parent_id != null )
		{
			try
			{
				$parent = $this->get_table_data($this->_categories_table, 1, null, ' AND id = '.(int)$parent_id);
				
				if ( count($parent) == 0 || $parent[0]['parent_id'] != 0 )
				{
					$this->_errors['parent'] = 'The supplied id is not a valid parent';
					return false;
				}
				
				$this->_category['parent_id'] = $parent_id;
			}
			catch(Database_Exception $db_e)
			{
				throw $db_e;
			}
		}
		
		if ( !Valid::not_empty($name) )
		{
			$this->_errors['name'] = 'The category name cannot be empty';
			return false;
		}
		
		$this->_category['name'] = ''.$name;
		
		
		try
		{
			$this->_category['slug'] = $this->_generate_slug(0, $name);
		
			$this->category['id'] = $this->_insert_data($this->_categories_table, $this->_category);
			
			return true;
		}
		catch(Database_Exception $db_e)
		{
			throw $db_e;
		}
	}
	
	/**
	 * Edits a category that is loaded
	 * Only the name can be changed
	 * @param string $name The new name of the category
	 * @return boolean
	 */
	public function edit($name = '')
	{
		if ( empty($this->_category) )
		{
			$this->_errors['category'] = 'Category is not loaded';
			return false;
		}
		
		if ( !Valid::not_empty($name) )
		{
			$this->_errors['name'] = 'The category name cannot be empty';
			return false;
		}
		
		$this->_category['name'] = ''.$name;
		
		try
		{
			$this->_category['slug'] = $this->_generate_slug($this->_category['id'], $name);
			
			return $this->_update_data($this->_categories_table, $this->_category);
		}
		catch(Database_Exception $db_e)
		{
			throw $db_e;
		}
	}
	
	/**
	 * Deletes a loaded category
	 * Can only delete category that has no children
	 * @return boolean
	 */
	public function delete()
	{
		if ( empty($this->_category) )
		{
			$this->_errors['category'] = 'Category is not loaded';
			return false;
		}
		
		try
		{
			if ( (int)$this->get_table_total($this->_categories_table, ' AND parent_id = '.$this->_category['id']) > 0 )
			{
				$this->_errors['category'] = 'Category cannot be deleted because it has children';
				return false;
			}		
			
			// TO DO: add the part that checks if a category has elements in it
			
			$q = DB::query(Database::DELETE, 'DELETE FROM '.$this->_categories_table.' WHERE id = :id')
					->param(':id', $this->_category['id'])
					->execute();
			
			return true;
		}
		catch(Database_Exception $db_e)
		{
			throw $db_e;
		}
	}
	
	/**
	 * Change the loaded category's parent
	 * @param int $parent_id The parent to change the category to
	 * @return boolean
	 */
	public function change_parent($parent_id = null)
	{
		if ( empty($this->_category) )
		{
			$this->_errors['category'] = 'Category is not loaded';
			return false;
		}
		
		
		try
		{
			if ( (int)$this->get_table_total($this->_categories_table, ' AND parent_id = '.$this->_category['id']) > 0 )
			{
				$this->_errors['category'] = 'Cannot move a category with children';
				return false;
			}
			
			if ( $parent_id != null )  
			{
				$parent = $this->get_table_data($this->_categories_table, 1, null, ' AND id = '.(int)$parent_id);
					
				if ( count($parent) == 0 || $parent[0]['parent_id'] != 0 )
				{
					$this->_errors['parent'] = 'The supplied id is not a valid parent';
					return false;
				}
			}
			else
			{
				$parent_id = 0;
			}
			
			$this->_category['parent_id'] = $parent_id;
			
			$this->_update_data($this->_categories_table, $this->_category);
			
			return true;
		}
		catch(Database_Exception $db_e)
		{	
			throw $db_e;
		}
	}
	
	/**
	 * Gets a category in array format
	 * @param int $id Valid category ID
	 * @return boolean
	 */
	public function get_category($id)
	{
		try
		{
			$result = $this->get_table_data($this->_categories_table, 1, null, ' AND id = '.(int)$id);
			
			if ( empty($result) ){ return false; }
			
			$this->_category = $result[0];
			
			return true;
		}
		catch(Database_Exception $db_e)
		{
			throw $db_e;
		}
	}
	
	/**
	 * Generates a slug based on the name
	 * @param int $id If edit, skip checking self
	 * @param string $name The name to convert to slug
	 * @return string The generated slug
	 */
	private function _generate_slug($id, $name)
	{
		$slug = Text::convert_to_slug($name);
		
		$slug_to_check = $slug;
		$i = 1;
		try
		{
			while ( (int)$this->get_table_total($this->_categories_table, ' AND slug = "'.$slug_to_check.'" AND id != '.$id) > 0 )
			{
				$slug_to_check = $slug.'-'.$i;
				$i++;
			}
		}
		catch(Database_Exception $db_e )
		{
			throw $db_e;
		}
		
		return $slug_to_check;
	}
	
	/**
	 * Loads categories
	 * Loads all of them, or just the children of one parent
	 * The array gets back mapped
	 * @return array
	 */
	public function get_categories($parent_id = null)
	{
		$extra_sql = '';
		
		if ( $parent_id != null )
		{
			$extra_sql = ' AND (parent_id = '.(int)$parent_id.' OR id = '.(int)$parent_id.')';
		}
		
		try
		{
			$results = $this->get_table_data($this->_categories_table, null, null, $extra_sql);
			
			$data = array();
			for ( $i = 0, $max = count($results); $i < $max; $i++ )
			{
				if ( !array_key_exists($results[$i]['parent_id'], $data) )
				{
					$data[(int)$results[$i]['parent_id']] = array();
				}
					
				$data[(int)$results[$i]['parent_id']][] = $results[$i];
			}
		
			if ( !isset($data[0]) )
			{	
				$data[0] = array();
			}
		
			$final_data = array();
			foreach ( $data[0] as $parent )
			{
				$tmp = $parent;
				$tmp['children'] = array();
				if ( isset( $data[$parent['id']] ) )
				{
					$tmp['children'] = $data[$parent['id']];
				}
				
				$final_data[] = $tmp;
			}
			
			unset($data);
			unset($results);
			
			return $final_data;
		}
		catch(Database_Exception $db_e)
		{
			throw $db_e;
		}
	}
	
	public function return_errors()
	{
		return $this->_errors;
	}
	
	public function return_data()
	{
		return $this->_category;
	}
}