<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_M extends CI_Model
{
    private $_table = "user";
    public $id_category;
    public $name;

    public function rules()
    {
        return [
            [
                'field' => 'role',
                'label' => 'Role',
                'rules' => 'required'
            ]

        ];
    }
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function update()
    {
        $data = array(
            'role_id' =>  $this->input->post('role')
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->_table, $data);
    }
    function get_one($id)
    {
        $param  =   array('id' => $id);
        return $this->db->get_where($this->_table, $param);
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->_table);
    }
}
