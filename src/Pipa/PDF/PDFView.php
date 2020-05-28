<?php

namespace Pipa\PDF;
use DOMPDF;
use Pipa\Dispatch\Dispatch;
use Pipa\HTTP\Response;
use Pipa\HTTP\View\PHPView;

class PDFView extends PHPView {
	
	const DEFAULT_SIZE = "letter";
	const DEFAULT_ORIENTATION = "portrait";
	
	function render(Dispatch $dispatch) {
		if ($template = @$dispatch->result->options['pdfTemplate']) {
			$dispatch->result->options['template'] = $template;
		}
		
		ob_start();
		parent::render($dispatch);
		$buffer = ob_get_contents();
		ob_end_clean();
		
		$pdf = new DOMPDF();
		$pdf->load_html($buffer);
		
		$size = \Pipa\fnn(@$dispatch->result->options['pdfSize'], self::DEFAULT_SIZE);
		$orientation = \Pipa\fnn(@$dispatch->result->options['pdfOrientation'], self::DEFAULT_ORIENTATION);
		$pdf->set_paper($size, $orientation);
		
		$pdf->render();
	
		if ($dispatch->response instanceof Response) {
			$dispatch->response->setContentType("application/pdf");
		}
		
		echo $pdf->output(); 
	}
}
