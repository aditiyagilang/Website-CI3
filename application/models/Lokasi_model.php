<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi_model extends CI_Model {

    private $api_url = 'http://localhost:8080/lokasi';

    public function get_all_lokasi() {
        $response = file_get_contents($this->api_url);
        return json_decode($response);
    }

    public function get_lokasi($id) {
        $response = file_get_contents("{$this->api_url}/{$id}");
        return json_decode($response);
    }

    public function add_lokasi($data) {
        $json_data = json_encode($data);
    
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'POST',
                'content' => $json_data,
            ),
        );
        $context  = stream_context_create($options);
        $response = file_get_contents($this->api_url, false, $context);

        return json_decode($response);
    }
    
    
    public function update_lokasi($data) {
        $options = array(
            'http' => array(
                'header'  => "Content-Type: application/json\r\n",
                'method'  => 'PUT',
                'content' => json_encode($data),
            ),
        );
        $context  = stream_context_create($options);
        $response = file_get_contents($this->api_url, false, $context);
    
        if ($response === FALSE) {
            return false;
        }
    
        return json_decode($response);
    }
    

    public function delete_lokasi($id) {
        $options = array(
            'http' => array(
                'method'  => 'DELETE',
            ),
        );
        $context  = stream_context_create($options);
        $response = file_get_contents("{$this->api_url}/{$id}", false, $context);
        return json_decode($response);
    }
}
?>
