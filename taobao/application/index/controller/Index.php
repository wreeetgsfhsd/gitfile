<?php
namespace app\index\controller;

use think\Controller;
use think\Db;

class Index extends Controller {


    public function index(){
        return $this->fetch();
      }


      public function find(){
        $name=input('name');

        $result=db('link')->where('name','like','%'.$name.'%')->select();
          if($result){
              $this->assign('result',$result);
              return  $this->fetch();
          }else{
              return $this->success('查找失败','index');
          }
      }


      public function findAll(){
          $page = input('page');
          if(!isset($page)){
            $page=1;
          }
          echo "12";
          $result=db('link')->paginate(array('list_rows'=>5,'page'=>$page));
          $this->assign('page',$page);
          $this->assign('results',$result);
          return  $this->fetch();
      }

      public function add(){
          return $this->fetch();
      }


      public function insert(){
          $data=input();
          $result= db('link')->insert($data);
          if($result){
              $this->assign('result',$result);
              //return $this->success('添加成功','findAll');
              return $this->redirect('findAll');
          }else{
              return $this->success('添加失败','add');
          }
      }

      public function edit(){
          $id=input('id');
          $page = input ('page');
          $result= db('link')->where('id','=',$id)->find();
          $this->assign('result',$result);
          $this->assign('page',$page);
          return $this->fetch();
      }


    public function update(){
        $data=array(
            'id'=>input('id'),
            'name'=>input('name'),
            'link'=>input('link'),
            'password'=>input('password'),
            'notes'=>input('notes'),
        );
        $page = input('page');
        if(db('link')->update($data)){
            return  $this->success('修改成功',"findAll?page=$page");
        }else{
            return $this->success('修改失败',"findAll?page=$page");
        }
    }


    public function delete(){
        $id=input('id');
        $page = input('page');
        if( db('link')->where('id','=',$id)->delete()){
            return $this->success('删除成功',"findAll?page=$page");
        }else{
            return $this->success('删除失败',"findAll?page=$page");
        }
    }
    public function wrong(){
        $id=input('id');
        $page = input('page');
        Db::execute("update  link  set notes = 1 where id=$id");
        return $this->success('错误成功',"findAll?page=$page");

    }


}
