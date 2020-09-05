<?php defined('BASEPATH') or exit('No direct script access allowed');

class Unit_M extends CI_Model
{
    private $_table = "p_unit";

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
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    function get_one($id)
    {
        $param  =   array('id_unit' => $id);
        return $this->db->get_where($this->_table, $param);
    }

    public function update()
    {
        $data = array(
            'name' =>  $this->input->post('name'),
            'updated' => date('Y-m-d H:i:s')
        );
        $this->db->where('id_unit', $this->input->post('id'));
        $this->db->update($this->_table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id_unit', $id);
        $this->db->delete($this->_table);
    }
}
