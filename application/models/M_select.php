<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_select extends CI_Model {

	public function __construct(){
		parent::__construct();
		// $this->load->database();
	}

	public function provinsi(){
		$this->db->order_by('name', 'ASC');
		$provinsi=$this->db->get('provinces');
		return $provinsi->result_array();
	}

	public function kabupaten($provId){
		$kabupaten ="<option value='0'>--pilih--</pilih>";

		$this->db->order_by('name', 'ASC');
		$kab = $this->db->get_where('regencies', array('province_id'=>$provId));

		foreach ($kab->result_array() as $data) {
			$kabupaten.="<option value='$data[id]'>$data[name]</option>";
		}
		return $kabupaten;
	}
	

	public function kecamatan($kabId){
		$kecamatan="<option value='0'>--pilih--</pilih>";

		$this->db->order_by('name', 'ASC');
		$kec = $this->db->get_where('districts', array('regency_id'=>$kabId));

		foreach ($kec->result_array() as $data) {
			$kecamatan.="<option value='$data[id]'>$data[name]</option>";
		}
		return $kecamatan;

	}

	public function kelurahan_desa($kelId){
		$kelurahan="<option value='0'>--pilih--</pilih>";

		$this->db->order_by('name', 'ASC');
		$kec = $this->db->get_where('villages', array('district_id'=>$kelId));

		foreach ($kec->result_array() as $data) {
			$kelurahan.="<option value='$data[id]'>$data[name]</option>";
		}
		return $kelurahan;

	}

	
}