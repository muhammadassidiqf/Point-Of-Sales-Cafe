<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("supplier_m");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Supplier Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['supplier'] = $this->supplier_m->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('supplier/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('supplier/index');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'phone' => htmlspecialchars($this->input->post('phone', true)),
                'address' => htmlspecialchars($this->input->post('address', true)),
                'description' => htmlspecialchars($this->input->post('description', true))
            ];
            $this->db->insert('supplier', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Supplier has been added!</div>');
            redirect('supplier/index');
        }
    }

    public function edit()
    {
        if (isset($_POST['submit'])) {
            $this->supplier_m->update();
            redirect('supplier/index');
        } else {
            $id =  $this->uri->segment(3);
            $data['title'] = 'Edit supplier';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['supplier'] =  $this->supplier_m->get_one($id)->row_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('supplier/edit_supplier', $data);
            $this->load->view('templates/footer');
        }
    }

    public function delete()
    {
        $id =  $this->uri->segment(3);
        $this->supplier_m->delete($id);
        redirect('supplier');
    }
}
