<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ViewController extends CI_Controller {

	// proses yang akan di buka saat pertama masuk ke controller
	public function index()
	{
        //Get Penjualan
        $model = 'Penjualan_M';
        $this->load->model($model);
        $data['penjualan'] = $this->$model->get();

        //Get Motor
        $model = 'Motor_M';
        $this->load->model($model);
        $data['motor'] = $this->$model->get();
        //Get Cicilan
        $model = 'Cicil_M';
        $this->load->model($model);
        $data['cicil'] = $this->$model->get();
        //Get UangMuka
        $model = 'UangMuka_M';
        $this->load->model($model);
        $data['uangmuka'] = $this->$model->get();

        $this->load->view('templates/header');
        $this->load->view('v_penjualan', $data);
        //print_r($data['penjualan']);
		$this->load->view('templates/footer');
	}

    public function motor()
    {
        $model = 'Motor_M';
        $this->load->model($model);
        $data['motor'] = $this->$model->get();

        $this->load->view('templates/header');
        $this->load->view('v_motor', $data);
        //print_r($data['motor']);
		$this->load->view('templates/footer');
    }

    public function cicil()
    {
        $model = 'Cicil_M';
        $this->load->model($model);
        $data['cicil'] = $this->$model->get();

        $this->load->view('templates/header');
        $this->load->view('v_cicil', $data);
		$this->load->view('templates/footer');
    }

	
}
