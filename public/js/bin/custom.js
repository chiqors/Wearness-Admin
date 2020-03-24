function makeid(length) {
  var result = '';
  var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
  var charactersLength = characters.length;
  for (var i = 0; i < length; i++) {
    result += characters.charAt(Math.floor(Math.random() * charactersLength));
  }
  return result;
}

function imageClick(src) {
  $('#imgModal').attr('src', src)
  $('#modalImage').modal('show')
}

function pdfClick(src) {
  $('#modalPdf').modal('show')
  $('#content').attr('src', src)
}

function GoInFullscreen(element) {
  console.log(element)
  console.log($('#' + element))
  if (document.querySelector("#" + element).requestFullscreen)
    document.querySelector("#" + element).requestFullscreen();
  else if (document.querySelector("#" + element).mozRequestFullScreen)
    document.querySelector("#" + element).mozRequestFullScreen();
  else if (document.querySelector("#" + element).webkitRequestFullscreen)
    document.querySelector("#" + element).webkitRequestFullscreen();
  else if (document.querySelector("#" + element).msRequestFullscreen)
    document.querySelector("#" + element).msRequestFullscreen();
}

function addLoading() {
  $('.loading').removeClass('d-none');
}

function removeLoading() {
  $('.loading').addClass('d-none');
}


$(".nano").nanoScroller();
$('.btn-responsive').on('click', (e) => {
  $('.nano').toggleClass('left-side--menu-active');
})

$('.custom-file-input').on('change', (e) => {
  let ss = $(e.target).val()
  if (ss == "") {
    ss = "Choose file"
  }
  $('.custom-file-label').text(ss)
})

function ajax(url, data, method = null, dataTable = null) {
  addLoading();
  let formData, contentType, cache, processData
  if (data.photo !== null) {
    formData = new FormData()
    contentType = false
    cache = false
    processData = false
    $.each(data, function (i, val) {
      formData.append(i, val)
    })
    formData.append("photo", data.photo)
  } else {
    formData = data;
  }

  $.ajax({
    type: "POST",
    headers: {
      "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
    },
    method,
    data: formData,  // Data sent to server, a set of key/value pairs (i.e. form fields and values)
    contentType,       // The content type used when sending data to the server.
    cache,             // To unable request pages to be cached
    processData,
    url,
    dataType: "json",
    success: (data) => {
      removeLoading();
      if (data.respon === 'success') {
        swal({
          title: "Good job maker!",
          text: data.msg,
          icon: "success",
          button: "Ok!",
        });
        if (dataTable != null) {
          dataTable.ajax.reload()
        }
      } else {
        let text = " "
        $.each(data.msg, function (i, val) {
          text += " " + val
        })

        swal({
          title: "Oh no maker!",
          text: "" + text,
          icon: "error",
          button: "Ok!",
        });

      }
      if (data.reload == 'true') {
        location.reload()
      }
    }, error: function (x) {
      removeLoading();
      swal({
        title: "Oh no maker!",
        text: "ther some error with server call your adminstrator",
        icon: "error",
        button: "Ok!",
      });
      console.log(x);
    }
  });
}

function ajaxImage(url, data, name, loadtable) {
  addLoading();
  const formData = new FormData();
  formData.append("file", data);
  formData.append("name", name);

  $.ajax({
    type: "POST",
    headers: {
      "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
    },
    url,
    data: formData,  // Data sent to server, a set of key/value pairs (i.e. form fields and values)
    contentType: false,       // The content type used when sending data to the server.
    cache: false,             // To unable request pages to be cached
    processData: false,
    success: (data) => {
      // $('#table').load(loadtable)
      swal({
        title: "Good job maker!",
        text: "Image successfully uploaded",
        icon: "success",
        button: "Ok!",
      });
      removeLoading();
    }, error: function (x) {
      removeLoading();
      swal({
        title: "Oh no maker!",
        text: "ther some error with server call your adminstrator",
        icon: "error",
        button: "Ok!",
      });
      console.log(x);
    }
  })
}

//Maxlength textarea
var maxLength = $('textarea').attr('maxlength');
$('textarea').keyup(function () {
  var textlen = maxLength - $(this).val().length;
  $('.rchars').text(textlen);
});
