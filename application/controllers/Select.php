<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Select extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_select','sel');
	}

	public function index()
	{
		$data['provinsi'] =$this->sel->provinsi();
		$this->load->view('v_select',$data);
	}

	public function ambil_data(){
		$modul = $this->input->post('modul');
		$id    = $this->input->post('id');

		if ($modul=="kabupaten") {
			echo $this->sel->kabupaten($id);
		}else if ($modul=="kecamatan") {
			echo $this->sel->kecamatan($id);
			
		}else if ($modul=="kelurahan") {
			echo $this->sel->kelurahan_desa	($id);
		}

	}

}