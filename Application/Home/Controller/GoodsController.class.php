<?php
namespace Home\Controller;
use Think\Controller;
class GoodsController extends Controller {

	public function detail() {
		$goods_info = D('Goods') -> getGoodsInfo();

		$this -> assign('goods_info', $goods_info);
		$this -> display();
	}

	public function addToCart() {
		$data = I('post.');

		if (session('login_id')) {

		} else {
			$good_arr = array('id' => $data['id'], 'num' => intval($data['num']));
			$goods_arr = unserialize(session('cart_goods'));

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
			session('cart_goods', $goods_arr);

			//echo session('cart_goods');
			$this -> ajaxReturn(array('status' => 1, 'value' => 'add to cart success!'));
		}
	}

	public function add() {
		if (IS_POST) {
			$data = I('post.');
			$status = D('Goods') -> addGoods($data);

			$this -> ajaxReturn($status);
		} else {
			$this -> display();
		}
	}

	public function edit() {
		if (IS_POST) {
			$data = I('post.');
			$status = D('Goods') -> editGoodsInfo($data);

			$this -> ajaxReturn($status);
		} else {
			$goods_info = D('Goods') -> getGoodsInfo();

			$this -> assign('goods_info', $goods_info);
			$this -> display();
		}
	}

	public function delete() {
		if (IS_POST) {
			$data = I('post.');

			$status = D('Goods') -> deleteGoods($data);

			$this -> ajaxReturn($status);
		} else {

		}
	}

}
