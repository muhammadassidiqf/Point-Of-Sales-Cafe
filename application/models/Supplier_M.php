<?php defined('BASEPATH') or exit('No direct script access allowed');

class supplier_M extends CI_Model
{
    private $_table = "supplier";

    public function rules()
    {
        return [

            [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
            ],

            [
                'field' => 'phone',
                'label' => 'Phone',
                'rules' => 'required'
            ],
            [
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'required'
            ],
            [
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    function get_one($id)
    {
        $param  =   array('id_supplier' => $id);
        return $this->db->get_where($this->_table, $param);
    }

    public function update()
    {
        $data = array(
            'name' =>  $this->input->post('name'),
            'phone' =>  $this->input->post('phone'),
            'address' =>  $this->input->post('address'),
            'description' =>  $this->input->post('description'),
            'updated' => date('Y-m-d H:i:s')
        );
        $this->db->where('id_supplier', $this->input->post('id'));
        $this->db->update($this->_table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id_supplier', $id);
        $this->db->delete($this->_table);
    }
}
