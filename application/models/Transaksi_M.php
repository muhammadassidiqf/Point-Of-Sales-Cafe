<?php defined('BASEPATH') or exit('No direct script access allowed');
class Transaksi_M extends CI_Model
{


    function simpan_barang()
    {
        $product = $this->input->post('name');
        $qty =  $this->input->post('qty');
        $iditem = $this->db->get_where('p_item', array('name' => $product))->row_array();
        $data           = array(
            'customer' => 'umum',
            'product' => $product,
            'harga' => $iditem['price'],
            'qty' => $qty,
            'status' => '0'
        );
        $this->db->insert('transaksi', $data);
    }

    function tampilkan()
    {
        $query  = "SELECT td.id_transaksi,td.product,td.qty,td.harga
                FROM transaksi as td
                WHERE td.status='0'";
        return $this->db->query($query);
    }

    function hapusitem($id)
    {
        $this->db->where('id_transaksi', $id);
        $this->db->delete('transaksi');
    }


    function selesai_belanja($data)
    {
        $this->db->insert('transaksi_detail', $data);
        $last_id =  $this->db->query("select id_transaksi from transaksi_detail order by id_transaksi desc")->row_array();
        $this->db->query("update transaksi set transaksi_id='" . $last_id['id_transaksi'] . "' where status='0'");
        $this->db->query("update transaksi set status='1' where status='0'");
    }
}
