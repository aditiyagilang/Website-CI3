<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyek_model extends CI_Model {

    private $api_url = 'http://localhost:8080/proyek';


    public function get_all_proyek() {
        $response = file_get_contents($this->api_url);
        return json_decode($response);
    }
    

    public function get_proyek($id) {
        $response = file_get_contents("{$this->api_url}/{$id}");
        return json_decode($response);
    }


    public function add_proyek($data) {
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

    
    public function update_proyek($data) {
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
    

    public function delete_proyek($data) {
        $url = $this->api_url; 
    
        $json_data = json_encode($data);
    
        $ch = curl_init($url);
    

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE'); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($json_data)
        ));
    
        $response = curl_exec($ch);
    
        if(curl_errno($ch)) {
            $response = json_encode(array('status' => 'error', 'message' => curl_error($ch)));
        }
  
        curl_close($ch);
    
        return json_decode($response);
    }
    
    

}
?>
