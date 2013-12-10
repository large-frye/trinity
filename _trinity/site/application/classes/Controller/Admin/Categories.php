<?php
/**
 * Controller for admin categories
 */
class Controller_Admin_Categories extends Controller_Protected
{
	/**
	 * @var Model_Categories For global use within the class
	 */
	private $_m_categories = null;
	
	public function before()
	{
		parent::before();
		
		$this->_m_categories = new Model_Categories();
	}
	
	public function action_index()
	{	
		$this->_view = new View_Admin_Categories($this->_m_categories, true);
	}
	
	public function action_edit()
	{
		if ( $this->request->method() == Request::POST )
		{
			$post = Security::sanitize($this->request->post());
			
			if ( array_key_exists('add_category', $post) )
			{
				$this->_add_category($post);
			}
			
			if ( array_key_exists('edit_category', $post) )
			{
				$this->_edit_category($post);
			}
			
			if ( array_key_exists('delete_category', $post) )
			{
				$this->_delete_category($post);
			}
			
			if ( array_key_exists('change_parent', $post) )
			{
				$this->_change_parent($post);
			}
		}
		
		$this->_view = new View_Admin_Categories($this->_m_categories);
	}
	
	private function _add_category($post)
	{
		try
		{
			if ( !array_key_exists('name', $post) || !array_key_exists('category', $post) )
			{
				Message::instance()->error('Post data inconsistent');
			}
			else
			{
				if ( $post['category'] == '0' )
				{
					$post['category'] = null;
				}
				
				if ( $this->_m_categories->add($post['category'], $post['name']) )
				{
					Message::instance()->info('Category successfully added');
					Activity_Stream::instance()->template('admin-added-category', $this->_user->id);
				}
				else
				{
					$errors = $this->_m_categories->return_errors();
					$error = reset($errors);
					Message::instance()->error('Error: '.$error);
				}
			}
		}
		catch(Database_Exception $db_e)
		{
			Message::instance()->error('Exception: '.$db_e->getMessage());
		}
	}
	
	private function _edit_category($post)
	{
		try
		{
			if ( !array_key_exists('name', $post) || !array_key_exists('category', $post) )
			{
				Message::instance()->error('Post data inconsistent');
			}
			else
			{
				if ( !$this->_m_categories->get_category($post['category']) )
				{
					Message::instance()->error('Category does not exist');
					Activity_Stream::instance()->template('admin-edited-category', $this->_user->id);
				}
				else
				{
					if ( $this->_m_categories->edit($post['name']) )
					{
						Message::instance()->info('Category edited successfully');
					}
					else
					{
						$errors = $this->_m_categories->return_errors();
						$error = reset($errors);
						Message::instance()->error('Error: '.$error);
					}
				}
			}
		}
		catch(Database_Exception $db_e)
		{
			Message::instance()->error('Exception: '.$db_e->getMessage());
		}
	}
	
	private function _delete_category($post)
	{
		try
		{
			if ( !array_key_exists('category', $post) )
			{
				Message::instance()->error('Post data inconsistent');
			}
			else
			{
				if ( !$this->_m_categories->get_category($post['category']) )
				{
					Message::instance()->error('Category does not exist');
					Activity_Stream::instance()->template('admin-deleted-category', $this->_user->id);
				}
				else
				{
					if ( $this->_m_categories->delete() )
					{
						Message::instance()->info('Category deleted successfully');
					}
					else
					{
						$errors = $this->_m_categories->return_errors();
						$error = reset($errors);
						Message::instance()->error('Error: '.$error);
					}
				}
			}
		}
		catch(Database_Exception $db_e)
		{
			Message::instance()->error('Exception: '.$db_e->getMessage());
		}
	}
	
	private function _change_parent($post)
	{
		try
		{
			if ( !array_key_exists('parent', $post) || !array_key_exists('category', $post) )
			{
				Message::instance()->error('Post data inconsistent');
			}
			else
			{
				if ( $post['parent'] == '0' )
				{
					$post['parent'] = null;
				}
				
				if ( !$this->_m_categories->get_category($post['category']) )
				{
					Message::instance()->error('Category does not exist');
				}
				else
				{
					if ( $this->_m_categories->change_parent($post['parent']) )
					{
						Message::instance()->info('Category parent changed successfully');
						Activity_Stream::instance()->template('admin-edited-category', $this->_user->id);
					}
					else
					{
						$errors = $this->_m_categories->return_errors();
						$error = reset($errors);
						Message::instance()->error('Error: '.$error);
					}
				}
			}
		}
		catch(Database_Exception $db_e)
		{
			Message::instance()->error('Exception: '.$db_e->getMessage());
		}
	}
}