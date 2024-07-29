$(document).ready(function () {
 $('#s').delay(5000).fadeOut('slow');
 $('#e').delay(5000).fadeOut('slow');
});


function checkEmailAvail(input) {
 var lookup = {'email': input};
 var url = $("#pageurl").val();
 var img = url + 'img/loader2.gif';
 if (input != '') {
  $("#eloader").html("<img src='" + img + "' style='height: 18px; margin-left: 250px; margin-top: 32px;'>");
  $("#eloader").show();
 }
 $.ajax({
  type: 'POST',
  url: url + 'users/ajaxCheckEmailAvail',
  data: JSON.stringify(lookup),
  cache: false,
  success: function (response) {
   if (response.status == 'success') {
    $("#eloader").hide();
    $("#email_validation_msg").html("<span style='color:green;'>" + response.msg + "</span>");
   } else {
    $("#eloader").hide();
    $("#email_validation_msg").html("<span style='color:red;'>" + response.msg + "</span>");
   }

  },
  contentType: 'application/json',
  dataType: 'json'
 });
}

function checkAdminEmailAvail(input) {
 var lookup = {'email': input};
 var url = $("#pageurl").val();
 var img = url + 'img/loader2.gif';
 if (input != '') {
  $("#eloader").html("<img src='" + img + "' style='height: 18px; margin-left: 250px; margin-top: 32px;'>");
  $("#eloader").show();
 }
 $.ajax({
  type: 'POST',
  url: url + 'appadmins/ajaxCheckEmailAvail',
  data: JSON.stringify(lookup),
  cache: false,
  success: function (response) {
   if (response.status == 'success') {
    $("#eloader").hide();
    $("#email_validation_msg").html("<span style='color:green;'>" + response.msg + "</span>");
   } else {
    $("#eloader").hide();
    $("#email_validation_msg").html("<span style='color:red;'>" + response.msg + "</span>");
   }

  },
  contentType: 'application/json',
  dataType: 'json'
 });
}

function validateImgExt(id) {
 var value = $('#' + id).val();
 var ext = value.substring(value.lastIndexOf('.') + 1);
 var ext = ext.toLowerCase();
 var extList = new Array;
 extList = ["png", "gif", "ttf", "jpg", "jpeg", "bmp"];
 if ($.inArray(ext, extList) < 0) {
  $('#' + id).val('');
  alert("Invalid input file format! Please upload only IMAGE file");
  return false;
 } else {
  return true;
 }
}

function validatePdfExt(id) {
 var value = $('#' + id).val();
 var ext = value.substring(value.lastIndexOf('.') + 1);
 var ext = ext.toLowerCase();
 var extList = new Array;
 extList = ["pdf"];
 if ($.inArray(ext, extList) < 0) {
  $('#' + id).val('');
  alert("Invalid input file format! Please upload only PDF file");
  return false;
 } else {
  return true;
 }
}



