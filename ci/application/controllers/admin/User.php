<?php
/**
 * Created by PhpStorm.
 * User: dancheng
 * Date: 2018/1/16
 * Time: 13:11
 */
class User extends CI_Controller{
    /**
     * User constructor.
     * 构造函数，初始化model类
     */
    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('url_helper');
    }

    /**
     * 列表
     */
    public function lst(){
        $data['users'] = $this->user_model->get_All();
        $this->load->view('user/list', $data);
    }

    /**
     * 添加人员
     */
    public function add(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('sex', 'Sex', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('user/add');
        } else {
            $data = array(
                'name' => $_POST['name'],
                'sex'  => $_POST['sex'],
                'age'  => $_POST['age']
            );
            $this->user_model->add_user($data);
            $this->lst();
        }
    }

    /**
     * @param $id
     * 修改人员信息
     */
    public function update($id){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('sex', 'Sex', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['user'] = $this->user_model->getUserById($id);
            $this->load->view('user/edit', $data);
        } else {
            $data = array(
                'id'   => $_POST['id'],
                'name' => $_POST['name'],
                'sex'  => $_POST['sex'],
                'age'  => $_POST['age']
            );
            $this->user_model->update_user($data);
            $this->lst();
        }
    }

    /**
     * @param $id
     * 删除人员
     */
    public function del($id){
        $this->user_model->delete_user($id);
        $this->lst();
    }
}