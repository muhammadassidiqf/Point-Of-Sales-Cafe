<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("category_m");
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['title'] = 'Data Category';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['category'] = $this->category_m->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('product/category', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('category/index');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
            ];
            $this->db->insert('p_category', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Category has been added!</div>');
            redirect('category/index');
        }
    }
    public function edit()
    {
        if (isset($_POST['submit'])) {
            // proses kategori
            $this->category_m->update();
            redirect('category/index');
        } else {
            $id =  $this->uri->segment(3);
            $data['title'] = 'Edit Category';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['category'] =  $this->category_m->get_one($id)->row_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('product/edit_category', $data);
            $this->load->view('templates/footer');
        }
    }
    public function delete()
    {
        $id =  $this->uri->segment(3);
        $this->category_m->delete($id);
        redirect('category');
    }
}
