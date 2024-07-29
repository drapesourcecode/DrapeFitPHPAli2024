$(document).ready(function () {
 var strUrl = $("#pageurl").val();


 // enable fileuploader plugin
 $('input[name="files"]').fileuploader({
  changeInput: '<div class="fileuploader-input">' +
          '<div class="fileuploader-input-inner">' +
          '<img src="' + strUrl + 'drag/fileuploader-dragdrop-icon.png">' +
          '<h3 class="fileuploader-input-caption"><span>Drag and drop files here</span></h3>' +
          '<p>or</p>' +
          '<div class="fileuploader-input-button"><span>Browse Files</span></div>' +
          '</div>' +
          '</div>',
  theme: 'dragdrop',
  upload: {
   url: strUrl + '/appadmins/ajax_upload_file/',
   data: null,
   type: 'POST',
   enctype: 'multipart/form-data',
   start: true,
   synchron: true,
   beforeSend: null,
   onSuccess: function (result, item) {
    var data = JSON.parse(result);
    if (data.status == 'success') {
     //$('#li_photo').addClass('active');
     //$('#photo').addClass('active');
     var eventId = $("#event_id_photo").val();
     $('#ajax-photo').load(strUrl + 'appadmins/ajax_photo_list/' + eventId);
     $('#photo-msg').html('<div class="message success" onclick="this.classList.add(\'hidden\')" id="s">Events photo has been added successfully </div>');
    }




    // if success
    if (data.isSuccess && data.files[0]) {
     item.name = data.files[0].name;
     getFilename(item.name);
    }

    // if warnings
    if (data.hasWarnings) {
     for (var warning in data.warnings) {
      alert(data.warnings);
     }

     item.html.removeClass('upload-successful').addClass('upload-failed');
     // go out from success function by calling onError function
     // in this case we have a animation there
     // you can also response in PHP with 404
     return this.onError ? this.onError(item) : null;
    }

    //item.html.find('.column-actions').append('<a class="fileuploader-action fileuploader-action-remove fileuploader-action-success" title="Remove"><i></i></a>');
    setTimeout(function () {
     item.html.find('.progress-bar2').fadeOut(400);
    }, 400);
   },
   onError: function (item) {
    var progressBar = item.html.find('.progress-bar2');

    if (progressBar.length > 0) {
     progressBar.find('span').html(0 + "%");
     progressBar.find('.fileuploader-progressbar .bar').width(0 + "%");
     item.html.find('.progress-bar2').fadeOut(400);
    }

    item.upload.status != 'cancelled' && item.html.find('.fileuploader-action-retry').length == 0 ? item.html.find('.column-actions').prepend(
            '<a class="fileuploader-action fileuploader-action-retry" title="Retry"><i></i></a>'
            ) : null;
   },
   onProgress: function (data, item) {
    var progressBar = item.html.find('.progress-bar2');

    if (progressBar.length > 0) {
     progressBar.show();
     progressBar.find('span').html(data.percentage + "%");
     progressBar.find('.fileuploader-progressbar .bar').width(data.percentage + "%");
    }
   },
   onComplete: null,
  },
  onRemove: function (item) {
   $.post(strUrl + 'php/ajax_remove_file.php', {
    file: item.name
   });
  },
  captions: {
   feedback: 'Drag and drop files here',
   feedback2: 'Drag and drop files here',
   drop: 'Drag and drop files here'
  },
 });

});

