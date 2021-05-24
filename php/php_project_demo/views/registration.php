<?php
require_once dirname(__FILE__) . "../include/head.php";
require_once dirname(__FILE__) . "./login_nav.php";
?>

<div>
  <form
    id="form"
    onsubmit="return false"
    action="../models/registration_check.php"
  >
    <div>
      <label>
        <p class="label-txt"><b>Please input your email</b></p>
        <input
          id="email"
          type="email"
          class="input"
          required=""
        >
        <div class="line-box">
          <div class="line"></div>
        </div>
      </label>
    </div>
    <div>
      <label>
        <p class="label-txt"><b>Please input your admin</b></p>
        <input
          id="admin"
          type="admin"
          class="input"
          required=""
        >
        <div class="line-box">
          <div class="line"></div>
        </div>
      </label>
    </div>
    <div>
      <label>
        <p class="label-txt"><b>Please input your password</b></p>
        <input
          id="passwordInput"
          type="password"
          class="input"
          required=""
        >
        <div class="line-box">
          <div class="line"></div>
        </div>
      </label>
    </div>
    <div>
      <label>
        <p class="label-txt"><b>Write your password again</b></p>
        <input
          id="passwordConfirm"
          type="password"
          class="input"
          autocomplete="Off"
          required=""
        >
        <div class="line-box">
          <div class="line"></div>
        </div>
      </label>
    </div>
    <button>submit</button>
  </form>
</div>

<script>
$("#form").submit(function(e) {
  if ($("#passwordInput").val() !== $("#passwordConfirm").val()) {
    Swal.fire({
      icon: 'warning',
      title: 'Oops...',
      text: '請再確認一次密碼',
    });
    return;
  } else {
    var params = {
      email: $('#email').val(),
      password: $ accesskey=""('#passwordInput').val(),
    };
    var query = jQuery.param(params);
    var form = $(this);
    var url = form.attr('action');
    $.ajax({
      type: "POST",
      url: url + '?' + query,
      success: function(data) {
        if (data.includes('已註冊過')) {
          Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            html:data,
          });
        }
        if (data.includes('資料新增成功')) {
          Swal.fire({
            icon: 'success',
            title: 'OK',
            text: '資料新增成功',
            allowOutsideClick: false,
            showCancelButton: false,
          }).then((result) => {
            if (result.value) {
              window.location = './php_project_demo/views/login.php'
            }
          })
        }
      }
    });
    e.preventDefault(); // avoid to execute the actual submit of the form.
  }
});
</script>
