<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("item_m");
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['title'] = 'Data item';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['item'] = $this->item_m->getAll();
        $data['category'] = $this->db->get('p_category')->result_array();
        $data['unit'] = $this->db->get('p_unit')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('product/item', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('category', 'Category', 'required|trim');
        $this->form_validation->set_rules('unit', 'Unit', 'required|trim');
        $this->form_validation->set_rules('price', 'Price', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('item/index');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'id_category' => htmlspecialchars($this->input->post('category', true)),
                'id_unit' => htmlspecialchars($this->input->post('unit', true)),
                'price' => htmlspecialchars($this->input->post('price', true)),
            ];
            $this->db->insert('p_item', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Item has been added!</div>');
            redirect('item/index');
        }
    }

    public function edit()
    {
        if (isset($_POST['submit'])) {
            // proses kategori
            $this->item_m->update();
            redirect('item/index');
        } else {
            $id =  $this->uri->segment(3);
            $data['title'] = 'Edit Item';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['item'] =  $this->item_m->get_one($id)->row_array();
            $data['category'] = $this->db->get('p_category')->result_array();
            $data['unit'] = $this->db->get('p_unit')->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('product/edit_item', $data);
            $this->load->view('templates/footer');
        }
    }
    public function delete()
    {
        $id =  $this->uri->segment(3);
        $this->item_m->delete($id);
        redirect('item');
    }
}
