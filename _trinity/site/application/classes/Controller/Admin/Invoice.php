<?php
/**
 * Invoice pages
 */
class Controller_Admin_Invoice extends Controller_Protected
{
	public function before()
	{
		parent::before();
		
		if ( !$this->_user->roles->has('admin') )
		{
			Message::instance()->error('You do not have permission to view this page');
			HTTP::redirect($this->_redirect_url);
		}
	}
	
	public function action_index()
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
		
		$w_d = $m_workorders->return_data();
		
		if ( $w_d['inspection_status'] != 4 )
		{
			Message::instance()->error('The inspection is not complete. Cannot access invoice.');		
			HTTP::redirect('/');
		}
		
		$m_invoice = new Model_Invoice($id);
		
		$view = new View_Admin_Invoice($m_invoice, $m_workorders);
		
		if ( $this->request->method() == Request::POST )
		{
			$post = Security::sanitize($this->request->post());
			
			$success = false;
			try
			{
				if ( $m_invoice->validate($post) )
				{
					$m_invoice->save();
					
					Activity_Stream::instance()->template('admin-edited-invoice', $this->_user->id, $id);						
					
					$success = true;
				}
				else
				{
					$errors = $m_invoice->return_errors();
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
				HTTP::redirect(Route::url('admin', array('controller' => 'workorders')));
			}
			
			if ( $success )
			{
				Message::instance()->info('Invoice data saved successfully');
				HTTP::redirect(Route::url('admin', array('controller' => 'workorders')));
			}
		}
		
		$this->_view = $view;
	}
	
	public function action_generate()
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
		
		$w_d = $m_workorders->return_data();
		
		if ( $w_d['inspection_status'] != 4 )
		{
			Message::instance()->error('The inspection is not complete. Cannot access invoice.');		
			HTTP::redirect('/');
		}
		
		$m_invoice = new Model_Invoice($id);
		
		$view = new View_Admin_Invoice_Generate($m_invoice, $m_workorders);
		
		if ( $this->request->method() == Request::POST )
		{
			$post = Security::sanitize($this->request->post());
			
			$pdf_view = new View_Admin_Invoice_Generate($m_invoice, $m_workorders, true);
			$engine = new Primalskill_Mustache_Engine( $pdf_view );
			$pdf_template = $engine->render();
			
			$this->_generate_pdf($id, $pdf_template);
			
			if ( array_key_exists('view_pdf', $post) )
			{
				HTTP::redirect(Route::url('get', array('controller' => 'pdf', 'action' => 'workorder', 'type' => 'invoice', 'id' => $id)));
			}
				
			if ( array_key_exists('send_invoice', $post) )
			{
				$this->_send_invoice($m_workorders);
			}
		}
		
		$this->_view = $view;
	}
	
	/**
	 * Inner function
	 * If the invoice does not exist, we create it here
	 * Redirect to the file download
	 */
	private function _generate_pdf($id, $template)
	{
		if ( ! class_exists('mPDF', FALSE))
		{
			require_once ('../vendor/MPDF56/mpdf.php');
		}	
		
		try
		{
			if ( !file_exists(APPPATH.'media/inspections/') )
			{
				mkdir(APPPATH.'media/inspections/', 0755);
			}			
			
			$path = APPPATH.'media/inspections/'.$id;		
			
			if ( !file_exists($path) )
			{
				mkdir($path, 0755);
			}			
		
			$mpdf = new mPDF();
			$mpdf->WriteHTML($template);
			$mpdf->Output(APPPATH.'media/inspections/'.$id.'/invoice.pdf', 'F');
		}
		catch(Exception $e)
		{
			Message::instance()->error('Exception: '.$e->getMessage());
		}
	}
	
	private function _send_invoice($m)
	{
		$data = $m->return_data();
		
		$email_data = array();
		
		$m_settings = new Model_Settings();
		
		$settings_data = $m_settings->load_by(array('name' => 'email_template_invoice'));
		
		if ( $settings_data === false )
		{
			Message::instance()->error('Email template missing');
		}		
		else
		{
		
			$settings_data = Security::decode($settings_data);
			
			$m_users = new Model_Psusers;
		
			$user = $m_users->load_by( array( 'id' => $data['user_id']) );
				
			$template = str_replace('::first_name::', $data['first_name'], $settings_data->value);
			
			$template = str_replace('::last_name::', $data['last_name'], $template);
			
			$email_data['message'] = $template;
			
			$email_data['subject'] = 'Trinity - Invoice';
			
			$email_data['email'] = $user->email;
			
			if ( !file_exists(APPPATH.'media/inspections/'.$data['id'].'/invoice.pdf') )
			{
				Message::instance()->error('Invoice is not generated');
			}
			else
			{
				$email_data['attachment'] = APPPATH.'media/inspections/'.$data['id'].'/invoice.pdf';
				
				$client= new GearmanClient();
			
				$client->addServer('127.0.0.1', 4730);		

				$client->addTaskBackground('EmailMessage', json_encode($email_data));
				
				$result = $client->runTasks();		
				
				Message::instance()->info('Sending invoice added to qeue');
				
				Activity_Stream::instance()->template('admin-sent-invoice', $this->_user->id, $data['id']);
			}
		}
	}
}