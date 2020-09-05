<?php defined('BASEPATH') or exit('No direct script access allowed');

class Customer_M extends CI_Model
{
    private $_table = "customer";

    public $id_customer;
    public $name;
    public $gender;
    public $phone;
    public $address;

    public function rules()
    {
        return [

            [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
            ],

            [
                'field' => 'gender',
                'label' => 'Gender',
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
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    function get_one($id)
    {
        $param  =   array('id_customer' => $id);
        return $this->db->get_where($this->_table, $param);
    }

    public function update()
    {
        $data = array(
            'name' =>  $this->input->post('name'),
            'gender' =>  $this->input->post('gender'),
            'phone' =>  $this->input->post('phone'),
            'address' =>  $this->input->post('address'),
            'updated' => date('Y-m-d H:i:s')
        );
        $this->db->where('id_customer', $this->input->post('id'));
        $this->db->update($this->_table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id_customer', $id);
        $this->db->delete($this->_table);
    }
}
