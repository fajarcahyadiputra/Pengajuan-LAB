<?php 
/**
 * 
 */
use Dompdf\Dompdf;
class Pdf extends Dompdf
{
	
	function __construct()
	{
		parent:: __construct();
		$this->filename = 'pengajuan_lab.pdf';
	}

	protected function ci()
	{
		return get_instance();
	}

	public function load_view($view, $data = array())
	{
		$html = $this->ci()->load->view($view, $data, TRUE);

		$this->load_html($html);

		$this->render();

		$this->stream($this->filename, array('Attacment' => 0));
	}
}
