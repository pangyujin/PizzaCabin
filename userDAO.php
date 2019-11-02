<?php
class UserDAO {
  private $email;
  private $username;
  private $phone;
  private $address;
  private $postal;

  function __construct($email, $username, $phone, $address, $postal) {
    $this->email = $email;
    $this->username = $username;
    $this->phone = $phone;
    $this->address = $address;
    $this->postal = $postal;
  }

  function set_email($email) {
    $this->email = $email;
  }
  function get_email($email) {
    return $this->email;
  }
  function set_username($username) {
    $this->username = $username;
  }
  function get_username($username) {
    return $this->username;
  }
  function set_phone($phone) {
    $this->phone = $phone;
  }
  function get_phone($phone) {
    return $this->phone;
  }
  function set_address($address) {
    $this->address = $address;
  }
  function get_address($address) {
    return $this->address;
  }
  function set_postal($postal) {
    $this->postal = $postal;
  }
  function get_postal($postal) {
    return $this->postal;
  }
}
?>