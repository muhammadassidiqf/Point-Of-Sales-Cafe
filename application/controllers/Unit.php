<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("unit_m");
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['title'] = 'Data Unit';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['unit'] = $this->unit_m->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('product/unit', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('unit/index');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
            ];
            $this->db->insert('p_unit', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Item has been added!</div>');
            redirect('unit/index');
        }
    }

    public function edit()
    {
        if (isset($_POST['submit'])) {
            $this->unit_m->update();
            redirect('unit/index');
        } else {
            $id =  $this->uri->segment(3);
            $data['title'] = 'Edit Unit';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['unit'] =  $this->unit_m->get_one($id)->row_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('product/edit_unit', $data);
            $this->load->view('templates/footer');
        }
    }
    public function delete()
    {
        $id =  $this->uri->segment(3);
        $this->unit_m->delete($id);
        redirect('unit');
    }
}
