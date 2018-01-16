<?php
/**
 * Created by PhpStorm.
 * User: dancheng
 * Date: 2018/1/16
 * Time: 13:12
 */
class User_model extends CI_Model{
    public $name;
    public $sex;
    public $age;

    /**
     * User_model constructor.
     * 构造函数，加载数据库配置文件
     */
    public function __construct() {
        $this->load->database();
    }

    /**
     * @return mixed
     * 查询全部人员信息
     */
    public function get_All(){
        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function getUserById($id){
        $query = $this->db->get_where('user', array('id' => $id));
        return $query->row_array();
    }

    /**
     * 添加人员
     */
    public function add_user($data){
        $this->db->insert('user', $data);
    }

    /**
     * 修改信息
     */
    public function update_user($data){
        $this->db->update('user', $data, array('id' => $data['id']));
    }

    public function delete_user($id){
        $this->db->delete('user', array('id' => $id));
    }
}