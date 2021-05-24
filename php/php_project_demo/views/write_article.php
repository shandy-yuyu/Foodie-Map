<?php
require_once dirname(__FILE__) . "/login_status.php";
require_once dirname(__FILE__) . "/blog_nav.php";
?>

<div>
  <form 
    id="form" 
    onsubmit="return false"
    method="post"   
    action="/php_project_demo/models/article_check.php"
  >
    <label>
      <p class="label-txt"><b>文章標題</b></p>
      <input 
        id="title"
        name="title"  
        class="input" 
        type="text" 
        maxlength="50"
        required=""
      >
      <div class="line-box">
        <div class="line"></div>
      </div>
    </label>
    <label>
      <p class="label-txt"><b>文章內容</b></p>
      <textarea
        id="content" 
        name="content"
        class="input"   
        cols="50" 
        rows="10" 
        type="text" 
        maxlength="500"
        required=""
      ></textarea>
      <div class="line-box">
        <div class="line"></div>
      </div>
    </label>
    <label class="text-center mb-5 image-preview-wrapper" for="file-uploader">
      <img 
        id="img" 
        src="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://". $_SERVER['HTTP_HOST']. '/php_project_demo/src/img/up-arrow.png';?>" 
        alt="image-placehoder" 
        data-target="image-preview"
        style="width:10%"
      >
      <div class="custom-file">
        <input 
          type="file" 
          class="custom-file-input" 
          data-target="file-uploader" 
          id="file-uploader"
        >
      </div>
    </label>
    <div>
      <div align="center">
        <button id="submit" name="submit">submit</button>
      </div>
    </div>
  </form>
</div>

<script>
var imagePreview = document.querySelector('[data-target="image-preview"]');
var fileUploader = document.querySelector('[data-target="file-uploader"]');
var imgUrl = '';
var base64Img = '';
fileUploader.addEventListener("change", handleFileUpload);

$("#form").submit(function(e) {
  $("#submit").attr("disabled", true);
  var params= {
    writeArticle: '',
    title: $('#title').val(),
    content: $('#content').val(),
    img: base64Img
  };
  var query=jQuery.param(params);
  var form=$(this);
  var url=form.attr('action');
  $.ajax({
    type: "POST",
    url: url,
    data: params,
    success: function(data) {
      if(data.includes('文章新增成功')) {
        Swal.fire({
          icon: 'success',
          title: 'OK',
          text: '文章新增成功',
          allowOutsideClick: false,
          showCancelButton: false,
        }).then((result) => {
          if (result.value) {
            window.location = '/php_project_demo/views/blog.php'
          }
        })
      }
    }
  });
  e.preventDefault(); // 避免將表單直接發送而造成頁面跳轉.
});

async function handleFileUpload(e) {
  try {
    var file = e.target.files[0];
    if (!file) return;

    var beforeUploadCheck = await beforeUpload(file);
    if (!beforeUploadCheck.isValid) {
      throw Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: beforeUploadCheck.errorMessages,
      });;
    }
    await getArrayBuffer(file);
    showPreviewImage(file);
  } catch (error) {
    console.log("Catch Error: ", error);
  } finally {
    e.target.value = '';  // reset input file
  }
}

function showPreviewImage(fileObj) {
  imgUrl = URL.createObjectURL(fileObj);
  imagePreview.src = imgUrl;
  $('#img').css("width", "80%");
}

function getArrayBuffer(fileObj) {
  return new Promise((resolve, reject) => {
    var reader = new FileReader();
    reader.addEventListener("load", () => {
      resolve(reader.result);
    });
    reader.addEventListener("error", () => {
      reject("error occurred in getArrayBuffer");
    });
    reader.readAsArrayBuffer(fileObj);
    reader.onload = function (event) {
      var blob = new Blob([event.target.result]);
      window.URL = window.URL || window.webkitURL;
      var blobURL = window.URL.createObjectURL(blob); 
      var image = new Image();
      image.src = blobURL;
      image.onload = function() {
        var resized = resizeImg(image); // send it to canvas
      }
    }
  });
}

function beforeUpload(fileObject) {
  return new Promise(resolve => {
    var validFileTypes = ["image/jpeg", "image/png"];
    var isValidFileType = validFileTypes.includes(fileObject.type);
    var errorMessages = [];

    if (!isValidFileType) {
      errorMessages.push("只能上傳JPG or PNG檔。");
    }

    var isValidFileSize = fileObject.size / 1024 / 1024 < 10;
    if (!isValidFileSize) {
      errorMessages.push("檔案需小於 10MB。");
    }

    resolve({
      isValid: isValidFileType && isValidFileSize,
      errorMessages: errorMessages.join("\n")
    });
  });
}

function resizeImg(img) {  // 壓縮檔案用
  var canvas = document.createElement('canvas');

  var max_width = 500;
  var max_height = 950;
  var width = img.width;
  var height = img.height;

  if (width > height) {
    if (width > max_width) {
      height = Math.round(height *= max_width / width);
      width = max_width;
    }
  } else {
    if (height > max_height) {
      width = Math.round(width *= max_height / height);
      height = max_height;
    }
  }
  
  canvas.width = width;
  canvas.height = height;
  var ctx = canvas.getContext("2d");
  ctx.fillStyle = '#fff'; /// 避免png檔背景變為黑色
  ctx.fillRect(0, 0, canvas.width, canvas.height);
  ctx.drawImage(img, 0, 0, width, height);
  base64Img = canvas.toDataURL("image/jpeg",0.8);
  return base64Img; 
}
</script>
