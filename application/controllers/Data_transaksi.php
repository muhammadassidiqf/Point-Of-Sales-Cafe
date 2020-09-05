<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_transaksi extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Data Transaksi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['transaksi'] = $this->db->get('transaksi')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/transaksi', $data);
        $this->load->view('templates/footer');
    }
    public function user()
    {
        $data['title'] = 'Data Kasir';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['transaksi'] = $this->db->get('transaksi_detail')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/data', $data);
        $this->load->view('templates/footer');
    }
}
