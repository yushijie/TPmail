<?php
namespace Home\Model;
use Think\Model;
class CartModel extends Model {
	protected $_map = array(		//表单字段 => 映射到 =>数据库字段（下面验证写数据库字段）
	);
	
	protected $_auto = array(
	);
	
	protected $patchValidate = true;	//返回多个验证报错信息
	
	protected $_validate = array(
	);
	
	public function addToCart($uid,$data) {
		if (!$this->create()){
		     // 如果创建失败 表示验证没有通过 输出错误提示信息
		     return($this->getError());
		}else{
			
			$good_arr = array('id' => $data['id'], 'num' => intval($data['num']));
			$goods_arr = unserialize($this->where("uid='{$uid}'")->getField('goods'));
			
			$is_repeat = false;
			foreach ($goods_arr as $key => $value) {
				if ($good_arr['id'] == $value['id']) {
					$goods_arr[$key]['num'] = intval($value['num']) + intval($good_arr['num']);
					$is_repeat = true;
					break;
				}
			}
			if (!$is_repeat) {
				$goods_arr[] = $good_arr;
			}

			$goods_arr = serialize($goods_arr);
			
			$ndata['uid'] = $uid;
			$ndata['goods'] = $goods_arr;
			$ndata['update_time'] = time();
			
		    if ($this->add($ndata,array(),true) > 0) {
				$res = array(
					'status' => 1,
					'value' => 'add to cart success'
				);
				return $res;
			} else {
				$res = array(
					'status' => 0,
					'value' => 'add to cart error'
				);
				return $res;
			}
		}
	}
	
	public function getCartGoods($uid){
		$info = unserialize($this->where("uid='{$uid}'")->getField('goods'));
		
		return $info;
	}
		

}






