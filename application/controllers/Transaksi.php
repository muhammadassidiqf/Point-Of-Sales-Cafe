<?php
class transaksi extends ci_controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('transaksi_m');
    }

    function index()
    {
        if (isset($_POST['submit'])) {
            $this->transaksi_m->simpan_barang();
            redirect('transaksi/index');
        } else {
            //$data['detail'] = $this->db->get('transaksi')->result();
            $data['detail'] = $this->transaksi_m->tampilkan()->result();
            $data['title'] = 'Sales';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['item'] = $this->db->get('p_item')->result_array();
            $data['customer'] = $this->db->get('Customer')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('transaksi/index', $data);
            $this->load->view('templates/footer');
        }
    }


    function hapusitem()
    {
        $id =  $this->uri->segment(3);
        $this->transaksi_m->hapusitem($id);
        redirect('transaksi');
    }


    function selesai_belanja()
    {
        $tanggal = date('Y-m-d');
        $email = $this->session->userdata('email');
        $kasir =  $this->db->get_where('user', array('email' => $email))->row_array();
        $data = array('date' => $tanggal, 'user' => $kasir['name']);
        $this->transaksi_m->selesai_belanja($data);
        redirect('transaksi');
    }
}
