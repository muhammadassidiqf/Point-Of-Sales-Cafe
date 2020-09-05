<?php defined('BASEPATH') or exit('No direct script access allowed');

class Item_M extends CI_Model
{
    private $_table = "p_item";

    public function rules()
    {
        return [
            [
                'field' => 'id',
                'label' => 'Id',
                'rules' => 'required'
            ],
            [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
            ],

            [
                'field' => 'category',
                'label' => 'Category',
                'rules' => 'required'
            ],
            [
                'field' => 'unit',
                'label' => 'Unit',
                'rules' => 'required'
            ],
            [
                'field' => 'price',
                'label' => 'Price',
                'rules' => 'required'
            ]

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }


    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_item" => $id])->row();
    }

    function get_one($id)
    {
        $param  =   array('id_item' => $id);
        return $this->db->get_where('p_item', $param);
    }

    public function update()
    {
        $data = array(
            'name' =>  $this->input->post('name'),
            'id_category' =>  $this->input->post('category'),
            'id_unit' =>  $this->input->post('unit'),
            'price' =>  $this->input->post('price'),
            'updated' => date('Y-m-d H:i:s')
        );
        $this->db->where('id_item', $this->input->post('id'));
        $this->db->update($this->_table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id_item', $id);
        $this->db->delete('p_item');
    }
}
