<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model {
	
	protected $patchvalidate = true;
	protected $_validate = array(
		array('name','require','验证码必须！'), //默认情况下用正则进行验证
		array('name','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
	);
	
	
	public function register($data) {
		
		if (!$this->create()){
		     // 如果创建失败 表示验证没有通过 输出错误提示信息
		     return($User->getError());
		}else{
		     // 验证通过 可以进行其他数据操作
		}
		
		$res = array();
		if ($data['name'] != '' && $data['password'] != '') {
			
			$data_arr['name'] = $data['name'];
			$data_arr['password'] =md5($data['password']);
			$data_arr['ip'] =$_SERVER['REMOTE_ADDR'];
			$data_arr['last_time'] = time();
			
			$map['name'] = $data_arr['name'];
			
			if(count($this->where($map)->select()) > 0){
				$res = array(
					'status' => 0,
					'value' => 'this name has existed'
				);
				return $res;
			}else{
				if ($this->add($data_arr) > 0) {
					$res = array(
						'status' => 1,
						'value' => 'success'
					);
					return $res;
				} else {
					$res = array(
						'status' => 0,
						'value' => 'fail'
					);
					return $res;
				}
			}	
		} else {
			$res = array(
				'status' => 0,
				'value' => 'error'
			);
			return $res;
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

















