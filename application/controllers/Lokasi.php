<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Lokasi_model');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }
    
    
    public function index() {
        $data['lokasi'] = $this->Lokasi_model->get_all_lokasi();
        $this->load->view('lokasi/index', $data);
    }

    public function create() {
        $this->load->view('lokasi/create');
    }

    public function store() {
        $data = [
            'namaLokasi' => $this->input->post('namaLokasi'),
            'negara' => $this->input->post('negara'),
            'provinsi' => $this->input->post('provinsi'),
            'kota' => $this->input->post('kota'),
            'createdAt' => gmdate('Y-m-d\TH:i:s\Z')
        ];
    
     
        $this->form_validation->set_rules('namaLokasi', 'Nama Lokasi', 'required');
        $this->form_validation->set_rules('negara', 'Negara', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('kota', 'Kota', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('lokasi/create');
        } else {
            $result = $this->Lokasi_model->add_lokasi($data);
            redirect('lokasi');
            if ($result && isset($result->status) && $result->status === 'success') {
                redirect('lokasi');
            } else {
                $error_message = isset($result->message) ? $result->message : 'Failed to add lokasi';
                $this->session->set_flashdata('error', $error_message);
                $this->load->view('lokasi/create');
            }
        }
    }
    
    
    

    public function edit($id) {
        $data['lokasi'] = $this->Lokasi_model->get_lokasi($id);
        $this->load->view('lokasi/edit', $data);
    }

    public function update() {
        $method = $this->input->server('REQUEST_METHOD');
     
        if ($method != 'POST') {
            show_error('Invalid method');
            return;
        }
     
        $id = (int) $this->input->post('id');
        $data = [
            'id' => $id,
            'namaLokasi' => $this->input->post('namaLokasi'),
            'negara' => $this->input->post('negara'),
            'provinsi' => $this->input->post('provinsi'),
            'kota' => $this->input->post('kota'),
            'createdAt' => date('c')
        ];
     
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules('namaLokasi', 'Nama Lokasi', 'required');
        $this->form_validation->set_rules('negara', 'Negara', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('kota', 'Kota', 'required');
     
        if ($this->form_validation->run() === FALSE) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => 'error',
                    'message' => 'Invalid input',
                    'input' => $data
                ]));
            return;
        }
     
        $result = $this->Lokasi_model->update_lokasi($data);
     
        if ($result) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => 'success',
                    'message' => 'Data updated successfully',
                    'input' => $data
                ]));
                redirect('lokasi');
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => 'error',
                    'message' => 'Failed to update data',
                    'input' => $data
                ]));
        }
    }    

    public function delete($id) {
        $this->Lokasi_model->delete_lokasi($id);
        redirect('lokasi');
    }
}
?>
