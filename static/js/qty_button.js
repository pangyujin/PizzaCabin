
function check_qty() {
  var qty = document.getElementById("qty");
  if(parseInt(qty.value) < 1) {
    qty.value = 1;
  } else {
    qty.value = parseInt(qty.value);
  }
}

function btn_minus() {
  var qty = document.getElementById("qty");
  qty.value = parseInt(qty.value) - 1;
  check_qty();
}

function btn_plus() {
  var qty = document.getElementById("qty");
  qty.value = parseInt(qty.value) + 1;
  check_qty();
}