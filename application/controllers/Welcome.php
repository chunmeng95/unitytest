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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct() {
        parent::__construct();

        $this->load->model('Phonebook_model');
        $this->load->library('session');
        $this->load->helper(array('url', 'form'));
    }

    public function index() {
        $data = array();

        $edit_entry = null;
        if ($this->input->get('edit')) {
            $edit_id = $this->input->get('edit');
            $edit_entry = $this->Phonebook_model->get_by_id($edit_id);
        }
        
        if ($this->input->post()) {
            $id = $this->input->post('id');
            $formData = array(
                'name'   => $this->input->post('name'),
                'phone'  => $this->input->post('phone'),
                'status' => $this->input->post('status'),
            );

            if (empty($id)) {
                $this->Phonebook_model->insert($formData);
                $this->session->set_flashdata('message', 'Entry added.');
            } else {
                $this->Phonebook_model->update($id, $formData);
                $this->session->set_flashdata('message', 'Entry updated.');
            }
            
            redirect(site_url('/'));
        }
        
        $data['phonebook']  = $this->Phonebook_model->get_all();
        $data['edit_entry'] = $edit_entry;
        $data['message']    = $this->session->flashdata('message');
        
        $this->load->view('welcome_message', $data);
    }
    
    public function delete($id) {
        $this->Phonebook_model->delete($id);
        $this->session->set_flashdata('message', 'Entry deleted.');
        redirect(site_url('/'));
    }

	
}
