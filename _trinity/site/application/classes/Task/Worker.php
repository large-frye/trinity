<?php

class Task_Worker extends Minion_Task
{

	/**
	 * Action index: starts the worker
	 */
	protected function _execute(array $params)
	{
		
		// Flush output
		while (ob_get_level()) ob_end_flush();
		
		echo 'started worker';
		
		# Create our worker object.
		$gearman_mworker= new GearmanWorker();

		# Add default server (localhost).
		$gearman_mworker->addServer('127.0.0.1', 4730);

		// Register worker functions
		$gearman_mworker->addFunction('send_email', array($this, 'email_message'));
		
		$gearman_mworker->addFunction('generate_report', array($this, 'generate_pdf_report'));
		
		while($gearman_mworker->work())
		{
			if ($gearman_mworker->returnCode() != GEARMAN_SUCCESS)
			{
				echo "[ Worker Error ] - " .$gearman_mworker->error() ."\n";
				
				Log::instance()->add(Log::ERROR, $gearman_mworker->error());
				Log::instance()->write();
				break;
			}
		}
	}
	
	public function email_message($job, $data = null)
	{
		Log::instance()
			->add(Log::INFO, '[ Worker - email_message() ] - serving load')
			->write();
		
		echo "[ Worker - email_message() ] - serving load\n";
		
		$data = json_decode($job->workload(), true);
		
		try
		{
			$e = Email::instance('email');	
				
			$e->set_subject($data['subject']);
			$e->set_message($data['message']);
			$e->set_recipients($data['email']);
			
			if ( array_key_exists('attachment', $data) && file_exists($data['attachment']) )
			{
				$e->set_attachment($data['attachment']);
			}
			
			$e->send();	
			
			Log::instance()
				->add(Log::INFO, '[ Worker - email_message() ] - load served')
				->write();
			
			echo "[ Worker - email_message() ] - load served\n";
		}
		catch(Exception $e)
		{
			Log::instance()
				->add(Log::INFO, '[ Worker - email_message() ] - error: '.$e->getMessage())
				->write();
		}
	}

	public function generate_pdf_report($job, $data = null)
	{
		Log::instance()
			->add(Log::INFO, '[ Worker - generate_pdf_report() ] - serving load')
			->write();
		
		echo "[ Worker - generate_pdf_report() ] - serving load\n";
		
		$data = json_decode($job->workload(), true);
		
		try
		{
			require_once(DOCROOT.'../vendor/MPDF56/mpdf.php');
			
			$mpdf = new mPDF();
			
			$signature_url = DOCROOT.'assets/gfx/signature.png';			
			
			$mpdf->SetHTMLFooter('<img width="400" src="'.$signature_url.'">');
			
			$m_workorders = new Model_Workorders();		
		
			$m_workorders->load_by( array('id' => $data['id']) );
			
			$view = new View_Workorders_Report_Admin($m_workorders, new Model_Inspection($data['id']), 'generate_pdf', 'data');	
			
			$engine = new Primalskill_Mustache_Engine( $view );
			
			$html = $engine->render();		
			 
			$mpdf->WriteHTML($html);
			
			
			$view = new View_Workorders_Report_Admin($m_workorders, new Model_Inspection($data['id']), 'generate_pdf', 'photo');	
			
			$engine = new Primalskill_Mustache_Engine( $view );
			
			$html = $engine->render();	
			
			$mpdf->AddPage();		
			
			$mpdf->SetHTMLFooter('');				
			 
			$mpdf->WriteHTML($html);		
		
			
			if ( !file_exists(APPPATH.'media/inspections/') )
			{
				mkdir(APPPATH.'media/inspections/', 0755);
			}			
			
			$path = APPPATH.'media/inspections/'.$data['id'];		
			
			if ( !file_exists($path) )
			{
				mkdir($path, 0755);
			}	
			
			$mpdf->Output($path.'/Report.pdf', 'F');
			
			$date_now = date('Y-m-d H:i');
			
			$m_workorders->save_generated_pdf(1, 'generated', $date_now);			
			
			Log::instance()
				->add(Log::INFO, '[ Worker - generate_pdf_report() ] - load served')
				->write();
			
			echo "[ Worker - generate_pdf_report() ] - load served\n";
		}
		catch(Exception $e)
		{
			$m_workorders->save_generated_pdf(0, 'error', null);		
					
			Log::instance()
				->add(Log::INFO, '[ Worker - generate_pdf_report() ] - error: '.$e->getMessage())
				->write();
		}
	}	
	
	
}