<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRUD_Controller extends CI_Controller {

    var $API = "";
    var  $headers = array('X-Nim :1703027');

    function __construct() {
		parent::__construct();
		$this->API="https://api.akhmad.id/uaspromnet/uangmuka";
	}

    // proses untuk menambah data
	function add(){

		$data = array(
			'id_motor'      =>  $this->input->post('id_motor'),
			'id_cicil'    =>  $this->input->post('id_cicil'),
			'id_uang_muka'	  =>  $this->input->post('id_uang_muka'),
			'cicilan_pokok' =>  $this->input->post('cicilan_pokok'),
            'cicilan_bunga'	  =>  $this->input->post('cicilan_bunga'),
            'cicilan_pokok' =>  $this->input->post('cicilan_pokok'));

        print_r($data);
		//$insert =  $this->curl->simple_post($this->API.'/Karyawan', $data, array(CURLOPT_BUFFERSIZE => 0));

		// if($insert)
		// {
		// 	$this->session->set_flashdata('hasil','Insert Data Berhasil');
		// }else
		// {
		// 	$this->session->set_flashdata('hasil','Insert Data Gagal');
		// }

		// redirect('C_karyawan');

	}


	// proses untuk menghapus data pada database
	function delete($id){
		if(empty($id)){
			redirect('C_karyawan');
		}else{
			$delete =  $this->curl->simple_delete($this->API.'/Karyawan', array('id'=>$id), array(CURLOPT_BUFFERSIZE => 10));
			if($delete)
			{
				$this->session->set_flashdata('hasil','Delete Data Berhasil');
			}else
			{
				$this->session->set_flashdata('hasil','Delete Data Gagal');
			}

			redirect('C_karyawan');
		}
	}

	function edit($id=''){
		// if(empty($id)){
		// 	redirect('C_karyawan');
		// }else{
			
			//echo "test";
			$data = array(
				'id'      =>  $id,
				'name'    =>  $this->input->post('name'),
				'email'	  =>  $this->input->post('email'),
				'address' =>  $this->input->post('address'),
				'phone'	  =>  $this->input->post('phone')
			);
			//print_r($data);
			$update =  $this->curl->simple_put($this->API.'/Karyawan', $data, array(CURLOPT_BUFFERSIZE => 0));
			if($update)
			{
				$this->session->set_flashdata('hasil','Update Data Berhasil');
			}else
			{
				$this->session->set_flashdata('hasil','Update Data Gagal');
			}

			redirect('C_karyawan');

		//}
	}
    
}

?>