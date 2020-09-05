<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("customer_m");
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['title'] = 'Customer Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['customer'] = $this->customer_m->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('customer/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('gender', 'Gender', 'required|trim');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('customer/index');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'gender' => htmlspecialchars($this->input->post('gender', true)),
                'phone' => htmlspecialchars($this->input->post('phone', true)),
                'address' => htmlspecialchars($this->input->post('address', true)),
            ];
            $this->db->insert('customer', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Customer has been added!</div>');
            redirect('customer/index');
        }
    }
    public function edit()
    {
        if (isset($_POST['submit'])) {
            $this->customer_m->update();
            redirect('customer/index');
        } else {
            $id =  $this->uri->segment(3);
            $data['title'] = 'Edit Customer';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['customer'] =  $this->customer_m->get_one($id)->row_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('customer/edit_customer', $data);
            $this->load->view('templates/footer');
        }
    }

    public function delete()
    {
        $id =  $this->uri->segment(3);
        $this->customer_m->delete($id);
        redirect('customer');
    }
}
