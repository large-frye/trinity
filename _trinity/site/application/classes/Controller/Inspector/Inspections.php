<?php

/**
 * Controller for inspections
 */
class Controller_Inspector_Inspections extends Controller_Protected
{
    /**
     * @var array Variable holding the currently logged in user's data
     */
    protected $_user = null;

    public function before()
    {
        parent::before();
        
        // Get the user model. (method has redirection)
        $this->_user = Auth::instance()->is_logged_in();
        
        if ( $this->_user != false && ! $this->_user->roles->has('inspector') )
        {
            Message::instance()->error(__('Not allowed.'));
            HTTP::redirect($this->_redirect_url);
        }        

    }
    
    // Only a placeholder
    public function action_index() 
    {
        $this->_view = new View_Workorders_List_Inspector();
    }
    
    /**
     * Controller, which handles the load and save inspection form
     */
    public function action_form()
    {
        
        $id = Security::sanitize($this->request->param('id'));
        
        if ( !Valid::not_empty($id) )
        {
            $id = 0;
        }
        
        $m_workorders = new Model_Workorders();
        
        if (! $m_workorders->load_by( array('id' => $id) ) )
        {
            Message::instance()->error(__('The work order does not exist.'));        
            HTTP::redirect('/');
        }
        
        $m_inspection = new Model_Inspection($id);
        
        $this->_view = new View_Inspections_Form($m_inspection, $m_workorders);
        
        $this->_view->generate_elements();
        
        if ( $this->request->method() === HTTP_Request::POST )
        {    
            $post = $this->request->post();
            
            if ( $m_inspection->validate($post) )
            {
                $m_inspection->save();
                
                Activity_Stream::instance()->template('inspector-updated-inspection', $this->_user->id, $id);                        
                
                Message::instance()->info(__('Inspection data was saved.'));        

                HTTP::redirect('/');                

            }
            else
            {
                Message::instance()->error(__('Something went wrong. Please check the fields again.'));                    
                $this->_view->errors = $m_inspection->return_errors();
                $this->_view->repopulate_data($post);
            }
            
            
        }
        
    }
    
    public function action_estimates()
    {
        $id = $this->request->param('id');
        
        if ( !Valid::not_empty($id) )
        {
            $id = 0;
        }
        
        $m_workorders = new Model_Workorders();
        
        if (! $m_workorders->load_by( array('id' => $id) ) )
        {
            Message::instance()->error(__('The work order does not exist.'));        
            HTTP::redirect('/');
        }
        
        $m_estimates = new Model_Estimates($id);
        
        $view = new View_Inspections_Estimates($m_estimates);
        
        if ( $this->request->method() == Request::POST )
        {
            $post = Security::sanitize($this->request->post());
            $redirect = false;
            try
            {
                if ( $m_estimates->validate($post) )
                {
                    $m_estimates->save();
                    
                    Activity_Stream::instance()->template('inspector-updated-inspection-estimate', $this->_user->id, $id);                        
                    
                    Message::instance()->info('Estimates saved successfully');
                    $redirect = true;
                }
                else
                {
                    $errors = $m_estimates->return_errors();
                    if ( !empty($errors) )
                    {
                        Message::instance()->error(reset($errors));
                    }
                
                    $view->set_data();
                }
            }
            catch(Exception $e)
            {
                Message::instance()->error('Exception: '.$e->getMessage());
                $redirect = true;
            }
            
            if ( $redirect )
            {
                HTTP::redirect(Route::url('inspector', array('controller' => 'inspections')));
            }
        }
        
        $this->_view = $view;
    }
    
    public function action_viewphotos()
    {
        $id = Security::sanitize($this->request->param('id'));
        
        $m_photos = new Model_Inspection_Photos($id);
        $m_categories = new Model_Categories();
        
        $this->_view = new View_Inspections_Photos_View($id, $m_photos, $m_categories);
    }
    
    public function action_editphotos()
    {
        $id = Security::sanitize($this->request->param('id'));
        
        $m_photos = new Model_Inspection_Photos_Upload($id);
        
        if ( $this->request->method() == HTTP_Request::POST )
        {
            $step = Security::sanitize($this->request->post());
            $post_data = null;
            
            if ( (array_key_exists('step', $step)) && ($step['step'] == 2) )
            {
                if ( $m_photos->finalize_upload($this->request->post()) )
                {
                    Message::instance()->info(__('Your photos were edited successfully.'));    
                    HTTP::redirect(Route::url('inspector', array('controller' => 'inspections')));                
                }
                else
                {
                    Message::instance()->info(__('An error occurred while trying to edit the photos. Please try again.'));    

                    HTTP::redirect(Route::url('inspector', array('controller' => 'inspections')));                
                }
            }
                
            Message::instance()->error(
                __('An error occurred while trying to edit the photos. Please try again.')
            );    

            HTTP::redirect(Route::url('inspector', array('controller' => 'inspections')));                        
        }
        else
        {
            $m_categories = new Model_Categories();

            $this->_view = new View_Inspections_Photos_Edit($id, $m_photos, $m_categories);
        }
        
        
        
    }
    
    public function action_photos()
    {
        $id = Security::sanitize($this->request->param('id'));
        
        // TODO: validate the work order ID (if exists and is assigned to current inspector)
        
        if ( $this->request->method() == HTTP_Request::POST )
        {
            $m_photos = new Model_Inspection_Photos_Upload($id);
            $m_categories = new Model_Categories();
            
            $step = Security::sanitize($this->request->post());
            $post_data = null;
            
            if ( (array_key_exists('step', $step)) && ($step['step'] == 2) )
            {
                if ( $m_photos->finalize_upload($this->request->post()) )
                {
                    Message::instance()->info(__('Your uploaded photos were saved successfully.'));    

                    HTTP::redirect(Route::url('inspector', array('controller' => 'inspections')));                
                }
                else
                {
                    Message::instance()->info(__('An error occurred while trying to save the uploaded photos. Please try again.'));    

                    HTTP::redirect(Route::url('inspector', array('controller' => 'inspections')));                
                }
            }
            else
            {
                $m_photos->set_data($_FILES['files']);
                $m_photos->process_upload();                            
            }
            
            $this->_view = new View_Inspections_Photos_Upload($id, $m_photos, $m_categories, $post_data);            
        }
        else
        {
            $m_photos = new Model_Inspection_Photos($id);
            $m_categories = new Model_Categories();
            
            $this->_view = new View_Inspections_Photos($id, $m_photos, $m_categories);
        }        
    }
    
    
    public function action_view()
    {
        $id = Security::sanitize($this->request->param('id'));
        
        $m_workorders = new Model_Workorders();

        if (! $m_workorders->load_by( array('id' => $id) ) )
        {
            Message::instance()->error(__('The work order does not exist.'));    
            HTTP::redirect('/');
        }        
        
        $work_order = $m_workorders->return_data();
        
        if ( $work_order['inspector_id'] !== $this->_user->id )
        {
            Message::instance()->error(__('The work order does not exist.'));    
            HTTP::redirect('/');        
        }
        
        $this->_view = new View_Workorders_View_Inspector($m_workorders);        
        
        if ( $this->request->method() === HTTP_Request::POST )
        {    
            $post = $this->request->post();
            
            //if work order status save request exists in the POST
            if ( isset($post['set_inspection_status']) )
            {
                $check = $m_workorders->check_inspection_status($post);        
                
                if ( $check === true )
                {
                    $m_workorders->save_inspection_status();
                    Message::instance()->info(__('Inspection status saved.'));                        
                    HTTP::redirect(Route::url('inspector', array('controller' => 'inspections', 'action' => 'view', 'id' => $id)));                    
                }
                else
                {
                    Message::instance()->error(__('Something went wrong. Please check the fields again.'));                    
                    $this->_view->errors = $check;
                    $this->_view->repopulate_inspection_status_form($post);
                }
            }
            else
            {
                $m_messages = new Model_Messages();
                
                $post['work_order_id'] = $id;
                $post['from_id'] = $this->_user->id;
                
                $check_message = $m_messages->check_data($post);
                
                if( $check_message === true )
                {
                    $m_messages->save();

                    Activity_Stream::instance()->template('wrote-comment', $this->_user->id, $id);                        
                    
                    HTTP::redirect(Route::url('inspector', array('controller' => 'inspections', 'action' => 'view', 'id' => $id)));
                }
                else
                {
                    $this->_view->errors = $check_message;
                    $this->_view->load_comments();
                }
            }
        }            
    }        
    
}