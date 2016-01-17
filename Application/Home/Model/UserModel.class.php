<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model {
	protected $_map = array(		//表单字段 => 映射到 =>数据库字段（下面验证写数据库字段）
		'con_pass' => 'password2',
	);
	
	protected $_auto = array(
		array('password','md5',3,'function'), // 对password字段在新增和编辑的时候使md5函数处理
		array('ip','get_client_ip',1,'function'),
		array('create_time','time',1,'function'),
		array('last_time','time',3,'function'),
	);
	
	protected $patchValidate = true;	//返回多个验证报错信息
	
	protected $_validate = array(
		array('name','/^\w{1,10}$/','帐号长度在1~10之间'),	//默认情况下用正则进行验证
		array('name','','帐号名称已经存在！',0,'unique',1),	// 在新增的时候验证name字段是否唯一
		array('password','/^[a-zA-Z]\w{5,17}$/','密码以字母开头，长度在6~18之间，只能包含字符、数字和下划线'),
		array('password2','password','确认密码不正确',0,'confirm'),	// 验证确认密码是否和密码一致
		array('email','email','email不合法',2), 
	);
	
	
	public function register($data) {
		if (!$this->create()){
		     // 如果创建失败 表示验证没有通过 输出错误提示信息
		     return($this->getError());
		}else{
		    if ($this->add() > 0) {
				$res = array(
					'status' => 1,
					'value' => 'reg success'
				);
				return $res;
			} else {
				$res = array(
					'status' => 0,
					'value' => 'reg error'
				);
				return $res;
			}
		}
	}
	
	public function login($data) {
		
		$map['name'] = $data['name'];
		
		$data_arr = $this->where($map)->find();
		if(count($data_arr) > 0){
			if($data_arr['password'] == md5($data['password'])){
				$res = array(
					'status' => 1,
					'value' => 'login success!'
				);
				return $res;
			}else {
				$res = array(
					'status' => 0,
					'value' => 'incorrect password!'
				);
				return $res;
			}
		}else {
			$res = array(
				'status' => 0,
				'value' => 'this name is not found!'
			);
			return $res;
		}
	}

}

















