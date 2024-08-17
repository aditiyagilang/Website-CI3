<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyek extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Proyek_model');
        $this->load->model('Lokasi_model');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['proyek'] = $this->Proyek_model->get_all_proyek();
        $this->load->view('proyek/index', $data);
    }

    public function create() {
        $data['lokasi_list'] = $this->Lokasi_model->get_all_lokasi(); 
        if (empty($data['lokasi_list'])) {
            echo "Data lokasi tidak tersedia.";
        } else {
            $this->load->view('proyek/create', $data); 
        }
    }
    

    public function store() {
        $this->form_validation->set_rules('namaProyek', 'Nama Proyek', 'required');
        $this->form_validation->set_rules('client', 'Client', 'required');
        $this->form_validation->set_rules('tglMulai', 'Tanggal Mulai', 'required');
        $this->form_validation->set_rules('tglSelesai', 'Tanggal Selesai', 'required');
        $this->form_validation->set_rules('pimpinanProyek', 'Pimpinan Proyek', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('lokasiId', 'Lokasi', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('proyek/create');
        } else {
            $data = [
                'namaProyek' => $this->input->post('namaProyek'),
                'client' => $this->input->post('client'),
                'tglMulai' => $this->input->post('tglMulai'),
                'tglSelesai' => $this->input->post('tglSelesai'),
                'pimpinanProyek' => $this->input->post('pimpinanProyek'),
                'keterangan' => $this->input->post('keterangan'),
                'createdAt' => date('c'), 
                'lokasiId' => $this->input->post('lokasiId')
            ];
    
            try {
                $result = $this->Proyek_model->add_proyek($data);
                redirect('proyek');
                if ($result && isset($result->status) && $result->status === 'success') {
                    redirect('proyek');
                } else {
                    $error_message = isset($result->message) ? $result->message : 'Failed to add project';
                    $this->session->set_flashdata('error', $error_message);
                    $this->load->view('proyek/create');
                }
            } catch (Exception $e) {
                $this->session->set_flashdata('error', 'An error occurred while adding the project: ' . $e->getMessage());
                $this->load->view('proyek/create');
            }
        }
    }
    

    public function edit($id, $id_lokasi) {
        $data['proyek'] = $this->Proyek_model->get_proyek($id);  
        
        if (empty($data['proyek'])) {
            show_404();
            return;
        }
    
        $data['proyek']->tglMulai = date('Y-m-d', strtotime($data['proyek']->tglMulai));
        $data['proyek']->tglSelesai = date('Y-m-d', strtotime($data['proyek']->tglSelesai));
    
        $data['lokasi'] = $this->Lokasi_model->get_lokasi($id_lokasi);
        
        $data['lokasi_list'] = $this->Lokasi_model->get_all_lokasi(); 
        
        if (empty($data['lokasi_list'])) {
            echo "Data lokasi tidak tersedia.";
            return;
        }
        $this->load->view('proyek/edit', $data);
    }
    
    
    

    public function update() {
        $method = $this->input->server('REQUEST_METHOD');
    
        if ($method != 'POST') {
            show_error('Invalid method');
            return;
        }
    
        // Ambil ID proyek dan data lainnya dari POST request
        $id = (int) $this->input->post('id');
        $data = [
            'id' => $id,
            'namaProyek' => $this->input->post('namaProyek'),
            'client' => $this->input->post('client'),
            'tglMulai' => $this->input->post('tglMulai'),
            'tglSelesai' => $this->input->post('tglSelesai'),
            'pimpinanProyek' => $this->input->post('pimpinanProyek'),
            'keterangan' => $this->input->post('keterangan'),
            'createdAt' => date('c'), // Format ISO 8601
            'lokasiId' => (int) $this->input->post('locationId') // Pastikan lokasiId adalah integer
        ];
    
        // Set rules untuk validasi form
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules('namaProyek', 'Nama Proyek', 'required');
        $this->form_validation->set_rules('client', 'Client', 'required');
        $this->form_validation->set_rules('tglMulai', 'Tanggal Mulai', 'required');
        $this->form_validation->set_rules('tglSelesai', 'Tanggal Selesai', 'required');
        $this->form_validation->set_rules('pimpinanProyek', 'Pimpinan Proyek', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('lokasiId', 'Lokasi', 'required|integer'); // Pastikan lokasiId valid
    
        // Cek hasil validasi
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
    
        // Perbarui data proyek
        $result = $this->Proyek_model->update_proyek( $data);
    
        if ($result) {
           
    
            redirect('proyek');
    
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
        $data = ['id' => $id];
        $result = $this->Proyek_model->delete_proyek($data);

        redirect('proyek');
    
        if ($result && isset($result->status) && $result->status === 'success') {
            
        } else {
            $error_message = isset($result->message) ? $result->message : 'Failed to delete project';
            $this->session->set_flashdata('error', $error_message);
            redirect('proyek');
        }
    }
    
    
    
    
    
      
        
}
?>
