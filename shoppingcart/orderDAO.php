<?php
class CartItem {
  private $type;
  private $food_name;
  private $price;
  private $qty;
  private $op1;
  private $op2;
  private $subtotal;

  function __construct($type, $food_name, $price, $qty, $op1, $op2, $subtotal) {
    $this->type = $type;
    $this->price = $price;
    $this->subtotal = $subtotal;
    $this->food_name = $food_name;
    $this->qty = $qty;
    $this->op1 = $op1;
    $this->op2 = $op2;
  }

  function set_type($type) {
    $this->type = $type;
  }
  function get_type($type) {
    return $this->type;
  }
  function set_food_name($food_name) {
    $this->food_name = $food_name;
  }
  function get_food_name($food_name) {
    return $this->food_name;
  }
  function set_qty($qty) {
    $this->qty = $qty;
  }
  function get_qty($qty) {
    return $this->qty;
  }
  function set_op1($op1) {
    $this->op1 = $op1;
  }
  function get_op1($op1) {
    return $this->op1;
  }
  function set_op2($op2) {
    $this->op2 = $op2;
  }
  function get_op2($op2) {
    return $this->op2;
  }
  function set_price($price) {
    $this->price = $price;
  }
  function get_price($price) {
    return $this->price;
  }
  function set_subtotal($subtotal) {
    $this->subtotal = $subtotal;
  }
  function get_subtotal($subtotal) {
    return $this->subtotal;
  }

}

class Order {
  private $user_email;
  private $order_time;
  private $item_list;
  private $status;
  
  function __construct($user_email, $order_time, $status, $item_list) {
    $this->user_email = $user_email;
    $this->order_time = $order_time;
    $this->item_list = $item_list;
    $this->status = $status;
  }
  
  function set_user_email($user_email) {
    $this->user_email = $user_email;
  }
  function get_user_email($user_email) {
    return $this->user_email;
  }
  function set_order_time($order_time) {
    $this->order_time = $order_time;
  }
  function get_order_time($order_time) {
    return $this->order_time;
  }
  function set_item_list($item_list) {
    $this->item_list = $item_list;
  }
  function get_item_list($item_list) {
    return $this->item_list;
  }
  function set_status($status) {
    $this->status = $status;
  }
  function get_status($status) {
    return $this->status;
  }

}
?>