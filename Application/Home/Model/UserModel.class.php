<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model {
	
	protected $patchValidate = true;
	protected $_validate = array(
		array('name','/^\w{1,10}$/','帐号长度在1~10之间'), //默认情况下用正则进行验证
		array('password','/^[a-zA-Z]\w{5,17}$/','密码以字母开头，长度在6~18之间，只能包含字符、数字和下划线'),
		array('name','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
		array('email','email','email不合法',2), 
	);
	
	
	public function register($data) {
		
		if (!$this->create()){
		     // 如果创建失败 表示验证没有通过 输出错误提示信息
		     return($this->getError());
		}else{
		     // 验证通过 可以进行其他数据操作
		    $res = array();
			
			$data_arr['name'] = $data['name'];
			$data_arr['password'] = md5($data['password']);
			$data_arr['email'] = $data['email']?$data['email']:'';
			$data_arr['ip'] = $_SERVER['REMOTE_ADDR'];
			$data_arr['last_time'] = time();
			
		    if ($this->add($data_arr) > 0) {
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
		
		$res = array();
		
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

















