
$(function(){
 var pageUrl=$('#pageurl').val();
 $('#form1').on('submit',function(e){
  e.preventDefault();
  var formData=new FormData($(this)[0]);
  $.ajax({
   type:'post',
   url:pageUrl+'appadmins/ajax_events',
   data:formData,
   contentType:false,
   processData:false,
   dataType:"json",
   success:function(data){
    if(data.status=='error'){
     $('#li_general').addClass('active');
     $('#general').addClass('active');
     $('#msg-gen').html('<div class="message error" id="e" onclick="this.classList.add(\'hidden\');">'+data.msg+'</div>');
    }
    if(data.status=='success'){
     $('#li_schedule').addClass('active');
     $('#schedule').addClass('active');
     $('#li_general').removeClass('active');
     $('#general').removeClass('active');
    }
    if(data.status=='edit_success'){
     $('#li_general').addClass('active');
     $('#general').addClass('active');
     $('#inputFiles').hide();
     $('#msg-gen').html('<div class="message success" onclick="this.classList.add(\'hidden\')" id="s">'+data.msg+'</div>');
     $('#img-cover').html('<div class = "col-sm-8"> <img width = "170" src = "'+pageUrl+'files/cover_photo/'+data.img+'" ></div><div class="col-md-6" style="text-align: center;"><a onclick="return confirm(\'Are you sure want to delete ?\')"href="'+pageUrl+'appadmins/change_coverphoto/'+data.lastId+'"><img  src="'+pageUrl+'img/trash.png"></a></div>');
    }
   }
  });
 });
});



$(function(){
 var pageUrl=$('#pageurl').val();
 $('#frm_sechudle_time').on('submit',function(e){
  e.preventDefault();
  var formData=new FormData($(this)[0]);
  $.ajax({
   type:'post',
   url:pageUrl+'appadmins/ajax_events_date',
   data:formData,
   contentType:false,
   processData:false,
   dataType:"json",
   success:function(data){
    if(data.status=='error'){
     $('#schedule').addClass('active');
     $('#li_schedule').addClass('active');
     // $('#error_msg_date').html(data.msg);
     $('#error_msg_date').html('<div class="message error" id="e" onclick="this.classList.add(\'hidden\');">'+data.msg+'</div>');
    }
    if(data.eventId){
     $('#li_ticket').addClass('active');
     $('#ticket').addClass('active');
     $('#schedule').removeClass('active');
     $('#li_schedule').removeClass('active');
    }
    if(data.status=='updateSuccess'){
     $('#schedule').addClass('active');
     $('#li_schedule').addClass('active');
     $('#calenderAjax').load(pageUrl+'appadmins/ajaxDateTime/'+data.id);
     $('#error_msg_date').html('<div class="message success" onclick="this.classList.add(\'hidden\')" id="s">'+data.msg+'</div>');
    }
   }
  });
 });
});


$(function(){
 var pageUrl=$('#pageurl').val();
 $('#frm_ticket').on('submit',function(e){
  e.preventDefault();
  var formData=new FormData($(this)[0]);
  $.ajax({
   type:'post',
   url:pageUrl+'appadmins/ajax_event_tkt',
   data:formData,
   contentType:false,
   processData:false,
   dataType:"json",
   success:function(data){
    if(data.status=='error'){
     $('#li_ticket').addClass('active');
     $('#ticket').addClass('active');
     $('#ticket-msg').html('<div class="message error" id="e" onclick="this.classList.add(\'hidden\');">'+data.msg+'</div>');
    }
    if(data.eventId){
     if(data.status=='9999'){
      $('#tkt_list').hide();
     }
     $('#li_ticket').removeClass('active');
     $('#ticket').removeClass('active');
     $('#li_photo').addClass('active');
     $('#photo').addClass('active');
     $('#photo-msg').html('<div class="message success" onclick="this.classList.add(\'hidden\')" id="s">'+data.msg+'</div>');

    }

    if(data.status=='updateSuccess'){
     $('#li_ticket').addClass('active');
     $('#ticket').addClass('active');
     $('#tkt_list').load(pageUrl+'appadmins/ajax_tkt_list/'+data.id);
     $('#ticket-msg').html('<div class="message success" onclick="this.classList.add(\'hidden\')" id="s">'+data.msg+'</div>');
    }
   }
  });
 });
});


$(function(){
 var pageUrl=$('#pageurl').val();
 $('#frmPhoto').on('submit',function(e){
  e.preventDefault();
  var formData=new FormData($(this)[0]);
  $.ajax({
   type:'post',
   url:pageUrl+'appadmins/ajax_event_photo',
   data:formData,
   contentType:false,
   processData:false,
   dataType:"json",
   success:function(data){
    if(data.status=='error'){
     $('#li_photo').addClass('active');
     $('#photo').addClass('active');
     $('#photo-msg').html('<div class="message error" id="e" onclick="this.classList.add(\'hidden\');">'+data.msg+'</div>');
    }
    if(data.eventId){
     $('#li_photo').removeClass('active');
     $('#photo').removeClass('active');
     $('#li_video').addClass('active');
     $('#video').addClass('active');
    }
   }
  });
 });
});


$(function(){
 var pageUrl=$('#pageurl').val();
 $('#finish').on('click',function(){
  $.ajax({
   type:'post',
   url:pageUrl+'appadmins/ajaxYoutube',
   dataType:'json',
   data:$('form#vidForm').serialize(),
   success:function(data){
    if(data.status=='error'){
     $('#li_video').addClass('active');
     $('#video').addClass('active');
    }
    if(data.eventId){
     $('#li_video').addClass('active');
     $('#video').addClass('active');
     $('.video-class').val('');
     $('#video-msg').html('<div class="message success" onclick="this.classList.add(\'hidden\')" id="s">'+data.msg+'</div>');

    }
    if(data.status=='updatSuccess'){
     $('#li_video').addClass('active');
     $('#video').addClass('active');
     $('.video-class').val('');
     $('#video_list').load(pageUrl+'appadmins/ajax_video_list/'+data.id);
     $('#video-msg').html('<div class="message success" onclick="this.classList.add(\'hidden\')" id="s">'+data.msg+'</div>');


    }
   }
  });
 });
 $('#saveDraft').on('click',function(){
  var pageUrl=$('#pageurl').val();
  $.ajax({
   url:pageUrl+'appadmins/ajaxYoutubeDraft',
   type:'post',
   dataType:'json',
   data:$('form#vidForm').serialize(),
   success:function(data){
    if(data.status=='error'){
     $('#li_video').addClass('active');
     $('#video').addClass('active');
    }
    if(data.eventId){
     $('#li_video').addClass('active');
     $('#video').addClass('active');
     $('.video-class').val('');
     $('#video-msg').html('<div class="message success" onclick="this.classList.add(\'hidden\')" id="s">'+data.msg+'</div>');

    }
    if(data.status=='updatSuccess'){
     $('#li_video').addClass('active');
     $('#video').addClass('active');
     $('.video-class').val('');

     $('#video_list').load(pageUrl+'appadmins/ajax_video_list/'+data.id);
     $('#video-msg').html('<div class="message success" onclick="this.classList.add(\'hidden\')" id="s">'+data.msg+'</div>');

    }
   }
  });
 });
});




function getDay(day,month,year){
 if(day>=10){
  var day1=day;
 }else{
  var day1='0'+day;
 }
 if(month>=10){
  var month1=month;
 }else{
  var month1='0'+month;
 }
 var currentDate=$('#currentDate').val();
 var formDate=year+'-'+month1+'-'+day1;
 if(formDate>=currentDate){
  var checkClass=$('#'+day+'-'+month+'-'+year).hasClass("event");
  if(checkClass===true){
   var eventId=$('#event_id_sechudle').val();
   if(eventId){
    var date=day+'-'+month+'-'+year;
    var checkDuplicatValue=$('#multi_date_html').html();
    var checkVl=checkDuplicatValue.search(date+',');
    if(checkVl=='-1'){

     // $('#timeSet').show();
//     $("ul#event_chose_date").html('<li data-id="' + date + '" class="dateClass"   id="d' + date + '">' + date + '<span data-id="' + date + '">x</span></li>');
     //$('#multi_date_html').html(date + ',');
     // var datevalue = $('#multi_date_html').html();
     //$('#multi_date').val(datevalue);
    }
   }
  }else{
   $('#'+day+'-'+month+'-'+year).addClass('event');
   getAlldate(day+'-'+month+'-'+year);
  }
 }else{
  $('#error_msg_date').html('<div class="message error" id="e" onclick="this.classList.add(\'hidden\');">You have chosen past date</div>');
 }
}


function getAlldate(date){
 var eventId=$('#event_id_sechudle').val();
 if(eventId){
  $('#timeSet').show();
  //var selected = $('#select_date').val();
  //$('#' + selected).removeClass('event');
  $("ul#event_chose_date").append('<li  class="dateClass"   id="d'+date+'">'+date+'<span data-id="'+date+'">x</span></li>');
  $('#multi_date_html').append(date+',');
  var datevalue=$('#multi_date_html').html();
  $('#multi_date').val(datevalue);
  //$('#select_date').val(date);


 }else{
  $('#timeSet').show();
  $("ul#event_chose_date").append('<li  class="dateClass"   id="d'+date+'">'+date+'<span data-id="'+date+'">x</span></li>');
  $('#multi_date_html').append(date+',');
  var datevalue=$('#multi_date_html').html();
  $('#multi_date').val(datevalue);
 }
}


$(function(){
 $(document).on("click","li.dateClass span",function(){
  var dateId=$(this).attr("data-id");
  $("#d"+dateId).remove();
  var eventId=$('#event_id_sechudle').val();
  if(eventId){
   var pageUrl=$('#pageurl').val();
   $.ajax({
    url:pageUrl+'appadmins/ajax_date_delete',
    type:'post',
    dataType:'json',
    data:{eventId:eventId,date:dateId},
    success:function(data){
    }
   });

  }



  $('#'+dateId).removeClass('event');
  $('#'+dateId).removeClass('active');
  var str=$('#multi_date_html').html();
  var addingText=dateId+',';
  var res=str.replace(addingText,"");
  $('#multi_date').val(res);
  $('#multi_date_html').html(res);
  var olCount=$('#event_chose_date li').length;
  if(olCount==0){
   $('#timeSet').hide();
  }
 });
});

$(function(){
 $(document).on("click","div a.closeTime",function(){
  var id=this.id;
  var dateId=$(this).attr("data-id");
  var pageUrl=$('#pageurl').val();
  if(id){
   $.ajax({
    url:pageUrl+'appadmins/ajax_time_delete',
    type:'post',
    dataType:'json',
    data:{id:id},
    success:function(data){
     $("#d"+id).remove();
     $('#'+dateId).removeClass('event');
     $('#'+dateId).removeClass('active');

    }
   });
  }
 });
});
function getTicektDelete(id){
 if(id){
  var pageUrl=$('#pageurl').val();
  var result=confirm("Are you want to delete?");
  if(result){
   $.ajax({
    url:pageUrl+'appadmins/ticket_delete',
    type:'post',
    dataType:'json',
    data:{id:id},
    success:function(data){
     if(data.status='success'){
      $('#li_ticket').addClass('active');
      $('#ticket').addClass('active');
      $('#tr'+id).remove();
      $('#ticket-msg').html('<div class="message success" onclick="this.classList.add(\'hidden\')" id="s">'+data.msg+'</div>');
     }
    }
   });
  }
 }
}
function getPhotoDelete(id){
 if(id){
  var pageUrl=$('#pageurl').val();
  var result=confirm("Are you want to delete?");
  if(result){
   $.ajax({
    url:pageUrl+'appadmins/photo_delete',
    type:'post',
    dataType:'json',
    data:{id:id},
    success:function(data){
     if(data.status='success'){
      $('#li_photo').addClass('active');
      $('#photo').addClass('active');
      $('#p'+id).remove();
      $('#photo-msg').html('<div class="message success" onclick="this.classList.add(\'hidden\')" id="s">'+data.msg+'</div>');
     }
    }
   });
  }
 }
}
function getVideoDelete(id){
 if(id){
  var pageUrl=$('#pageurl').val();
  var result=confirm("Are you want to delete?");
  if(result){
   $.ajax({
    url:pageUrl+'appadmins/video_delete',
    type:'post',
    dataType:'json',
    data:{id:id},
    success:function(data){
     if(data.status='success'){
      $('#li_video').addClass('active');
      $('#video').addClass('active');
      $('#p'+id).remove();
      $('#video-msg').html('<div class="message success" onclick="this.classList.add(\'hidden\')" id="s">'+data.msg+'</div>');
     }
    }
   });
  }
 }
}

