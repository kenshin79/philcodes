<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->form_validation->set_rules('term', 'Search Term', 'required|min_length[3]');

		if($this->form_validation->run()==FALSE)
		{
			if(validation_errors()){
				$this->session->set_flashdata('message', validation_errors());
			}
			$data['medical']="";
			$data['surgical']="";
			$data['term'] = "";
			$this->load->view('templates/header', $data);
			$this->load->view('templates/footer');
		}
		else{
			$term = $this->input->post('term', TRUE);
			$data['term'] = $term;
			if($medical = $this->Codefinder_model->get_icd($term))
			{
				$data['medical'] = $medical;
			}
			else {
				$data['medical'] = "None";
			}
			if($surgical = $this->Codefinder_model->get_rvs($term))
			{
				$data['surgical'] = $surgical;
			}
			else {
				$data['surgical'] = "None";
			}
			$this->load->view('templates/header', $data);
			$this->load->view('templates/footer');
		}
	}


}
