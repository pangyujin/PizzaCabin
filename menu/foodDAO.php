<?php
class FoodDAO {
  private $type;
  private $name;
  private $img_path;
  private $price;
  private $desc;

  function __construct($type, $name, $img_path, $price, $desc) {
    $this->type = $type;
    $this->name = $name;
    $this->img_path = $img_path;
    $this->price = $price;
    $this->desc = $desc;
  }

  function set_type($type) {
    $this->type = $type;
  }
  function get_type($type) {
    return $this->type;
  }
  function set_name($name) {
    $this->name = $name;
  }
  function get_name($name) {
    return $this->name;
  }
  function set_imgpath($img_path) {
    $this->img_path = $img_path;
  }
  function get_imgpath($img_path) {
    return $this->img_path;
  }
  function set_price($price) {
    $this->price = $price;
  }
  function get_price($price) {
    return $this->price;
  }
  function set_desc($desc) {
    $this->desc = $desc;
  }
  function get_desc($desc) {
    return $this->desc;
  }

  function render_food() {
    echo '
      <div class="column">
        <div class="food_card" onclick="location.href=\'food_detail.php?pizza='.$this->get_name().'\'">
          <img class="food_img" src="'.$this->img_path.'" alt="'.$this->name.'">
          <div class="nametag">
            <h4><b>'.$this->name.'</b></h4>
          </div>
          <div class="caption">
            <p>$'.number_format((float)$this->price, 2, '.', '').'</p>
          </div>
          <div class="button_wrapper">
            <div class="add_button">Add</div>
          </div>
        </div>
      </div>';
  }
}
?>