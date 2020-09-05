<?php defined('BASEPATH') or exit('No direct script access allowed');

class Category_M extends CI_Model
{
    private $_table = "p_category";
    public $id_category;
    public $name;

    public function rules()
    {
        return [
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

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_category" => $id])->row();
    }

    public function update()
    {
        $data = array(
            'name' =>  $this->input->post('name')
        );
        $this->db->where('id_category', $this->input->post('id'));
        $this->db->update($this->_table, $data);
    }
    function get_one($id)
    {
        $param  =   array('id_category' => $id);
        return $this->db->get_where('p_category', $param);
    }
    public function delete($id)
    {
        $this->db->where('id_category', $id);
        $this->db->delete('p_category');
    }
}
