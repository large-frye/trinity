<?php

require_once(realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR.'../../public_html/worker_index.php');

class GeneratePDF
{
	public function run($job, &$log)
	{
		Log::instance()
			->add(Log::INFO, '[ Worker - generate_pdf_report() ] - serving load')
			->write();
		
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
		}
		catch(Exception $e)
		{
			$m_workorders->save_generated_pdf(0, 'error', null);		
					
			Log::instance()
				->add(Log::INFO, '[ Worker - generate_pdf_report() ] - error: '.$e->getMessage())
				->write();
				
			return false;
		}
		
		return true;
	}	
}