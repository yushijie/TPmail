<?php
namespace Admin\Model;
use Think\Model;
class UserModel extends Model {
	protected $_map = array(		//表单字段 => 映射到 =>数据库字段（下面验证写数据库字段）
		
	);
	
	protected $_auto = array(
		array('password','md5',3,'function'), // 对password字段在新增和编辑的时候使md5函数处理
	);
	
	protected $patchValidate = true;	//返回多个验证报错信息
	
	protected $_validate = array(
		array('name','/^\w{1,10}$/','帐号长度在1~10之间'),	//默认情况下用正则进行验证
		array('name','','帐号名称已经存在！',0,'unique',1),	// 在新增的时候验证name字段是否唯一
		array('password','/^[a-zA-Z]\w{5,17}$/','密码以字母开头，长度在6~18之间，只能包含字符、数字和下划线'),
		array('password2','password','确认密码不正确',0,'confirm'),	// 验证确认密码是否和密码一致
		array('email','email','email不合法',2), 
	);
	
	public function getUserList() {
		$p = I('p', 1, 'int');
		$limit = 5;

		$data = $this -> order('create_time DESC') -> page($p . ',' . $limit) -> select();
		$count = $this -> count();

		$Page = new \Think\Page($count, $limit);
		// 实例化分页类 传入总记录数和每页显示的记录数

		$show = $Page -> show();

		return array('data' => $data, 'page' => $show);

	}
	
	public function getUserInfo(){
		$id = I('id',0,'int');
		$info = $this->where("id='{$id}'")->find();
		
		return $info;
	}
	
	public function editUserInfo($data){
		if (!$this->create()){
		     // 如果创建失败 表示验证没有通过 输出错误提示信息
		     return($this->getError());
		}else{
			$id = $data['id'];
		    if ($this->where("id='{$id}'")->save() > 0) {
				$res = array(
					'status' => 1,
					'value' => 'edit success'
				);
				return $res;
			} else {
				$res = array(
					'status' => 0,
					'value' => 'edit error'
				);
				return $res;
			}
		}
	}
	
	public function deleteUser($data){
		$id = $data['id'];
		
		if ($this->where("id='{$id}'")->delete() > 0) {
			$res = array(
				'status' => 1,
				'value' => 'delete success'
			);
			return $res;
		} else {
			$res = array(
				'status' => 0,
				'value' => 'delete error'
			);
			return $res;
		}
	}

}






