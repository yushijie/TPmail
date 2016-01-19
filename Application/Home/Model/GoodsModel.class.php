<?php
namespace Home\Model;
use Think\Model;
class GoodsModel extends Model {
	protected $_map = array(		//表单字段 => 映射到 =>数据库字段（下面验证写数据库字段）
		
	);
	
	protected $_auto = array(
		array('create_time','time',1,'function'),
		array('update_time','time',3,'function'),
	);
	
	protected $patchValidate = true;	//返回多个验证报错信息
	
	protected $_validate = array(
		array('title','require','商品名不能为空'), 
		array('price','/^(0|[1-9][0-9]{0,9})(\.[0-9]{1,2})?$/','商品价格为正数且最多保留2位小数'), 
	);
	
	public function addGoods($data) {
		if (!$this->create()){
		     // 如果创建失败 表示验证没有通过 输出错误提示信息
		     return($this->getError());
		}else{
		    if ($this->add() > 0) {
				$res = array(
					'status' => 1,
					'value' => 'add success'
				);
				return $res;
			} else {
				$res = array(
					'status' => 0,
					'value' => 'add error'
				);
				return $res;
			}
		}
	}
	
	public function getGoodsInfo(){
		$id = I('id',0,'int');
		$info = $this->where("id='{$id}'")->find();
		
		return $info;
	}
	
	public function getGoodsList() {
		$p = I('p', 1, 'int');
		$limit = 8;

		$data = $this -> order('price DESC') -> page($p . ',' . $limit) -> select();
		$count = $this -> count();

		$Page = new \Think\Page($count, $limit);
		// 实例化分页类 传入总记录数和每页显示的记录数

		$show = $Page -> show();

		return array('data' => $data, 'page' => $show);

	}
	
	public function editGoodsInfo($data){
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
	
	public function deleteGoods($data){
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






