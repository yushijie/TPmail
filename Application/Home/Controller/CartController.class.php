<?php
namespace Home\Controller;
use Think\Controller;
class CartController extends Controller {

	public function showCart() {
		
		if (session('login_id')) {
			$uid = session('login_id');
			$cart_goods = D('Cart')->getCartGoods($uid);
			
			
		} else {
			$cart_goods = unserialize(session('cart_goods'));
		}
		
		$this -> assign('cart_goods', $cart_goods);
		$this -> display();
	}


}
