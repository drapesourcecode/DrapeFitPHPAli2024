var calendar1={
 init:function(ajax){
  var pageUrl=$('#pageurl').val();
  var eventId=$('#hidden_event_id').val();
  if(ajax){

   // ajax call to print json
   $.ajax({
    url:pageUrl+'data/events.json',
    type:'POST',
    data:{event_id:eventId},
   }).done(function(data){
    var events=data.events;
    for(var i=0;i<events.length;i++){
     $('.list1 ul').append('<li style="display:'+events[i].display+'" class="day-event1" date-day1="'+events[i].day+'" date-month1="'+events[i].month+'" date-year1="'+events[i].year+'" data-number1="'+i+'">'+events[i].day+'-'+events[i].month+'-'+events[i].year+'</li>');
    }
    // start calendar
    calendar1.startCalendar1();
   })
           .fail(function(data){
            console.log(data);
           });
  }else{
   // if not using ajax start calendar
   calendar1.startCalendar1();
  }
 },
 startCalendar1:function(){
  var mon='Mon';
  var tue='Tue';
  var wed='Wed';
  var thur='Thu';
  var fri='Fri';
  var sat='Sat';
  var sund='Sun';

  /**
   * Get current date
   */
  var d=new Date();
  var strDate=yearNumber+"/"+(d.getMonth()+1)+"/"+d.getDate();
  var yearNumber=(new Date).getFullYear();
  /**
   * Get current month and set as '.current-month' in title
   */
  var monthNumber=d.getMonth()+1;

  function GetMonthName1(monthNumber){
   var months=['January','February','March','April','May','June','July','August','September','October','November','December'];
   return months[monthNumber-1];
  }

  setMonth1(monthNumber,mon,tue,wed,thur,fri,sat,sund);

  function setMonth1(monthNumber,mon,tue,wed,thur,fri,sat,sund){
   $('.month1').text(GetMonthName1(monthNumber)+' '+yearNumber);
   $('.month1').attr('data-month1',monthNumber);
   printDateNumber1(monthNumber,mon,tue,wed,thur,fri,sat,sund);
  }

  $('.btn-next1').on('click',function(e){
   var monthNumber=$('.month1').attr('data-month1');
   if(monthNumber>11){
    $('.month1').attr('data-month1','0');
    var monthNumber=$('.month1').attr('data-month1');
    yearNumber=yearNumber+1;
    setMonth1(parseInt(monthNumber)+1,mon,tue,wed,thur,fri,sat,sund);
   }else{
    setMonth1(parseInt(monthNumber)+1,mon,tue,wed,thur,fri,sat,sund);
   }
   ;
  });

  $('.btn-prev1').on('click',function(e){
   var monthNumber=$('.month1').attr('data-month1');
   if(monthNumber<2){
    $('.month1').attr('data-month1','13');
    var monthNumber=$('.month1').attr('data-month1');
    yearNumber=yearNumber-1;
    setMonth1(parseInt(monthNumber)-1,mon,tue,wed,thur,fri,sat,sund);
   }else{
    setMonth1(parseInt(monthNumber)-1,mon,tue,wed,thur,fri,sat,sund);
   }
   ;
  });

  /**
   * Get all dates for current month
   */

  function printDateNumber1(monthNumber,mon,tue,wed,thur,fri,sat,sund){

   $($('tbody.event-calendar1 tr')).each(function(index){
    $(this).empty();
   });

   $($('thead.event-days1 tr')).each(function(index){
    $(this).empty();
   });

   function getDaysInMonth1(month,year){
    // Since no month has fewer than 28 days
    var date=new Date(year,month,1);
    var days=[];
    while(date.getMonth()===month){
     days.push(new Date(date));
     date.setDate(date.getDate()+1);
    }
    return days;
   }

   i=0;

   setDaysInOrder1(mon,tue,wed,thur,fri,sat,sund);

   function setDaysInOrder1(mon,tue,wed,thur,fri,sat,sund){
    var monthDay=getDaysInMonth1(monthNumber-1,yearNumber)[0].toString().substring(0,3);
    if(monthDay==='Mon'){
     $('thead.event-days1 tr').append('<td>'+mon+'</td><td>'+tue+'</td><td>'+wed+'</td><td>'+thur+'</td><td>'+fri+'</td><td>'+sat+'</td><td>'+sund+'</td>');
    }else if(monthDay==='Tue'){
     $('thead.event-days1 tr').append('<td>'+tue+'</td><td>'+wed+'</td><td>'+thur+'</td><td>'+fri+'</td><td>'+sat+'</td><td>'+sund+'</td><td>'+mon+'</td>');
    }else if(monthDay==='Wed'){
     $('thead.event-days1 tr').append('<td>'+wed+'</td><td>'+thur+'</td><td>'+fri+'</td><td>'+sat+'</td><td>'+sund+'</td><td>'+mon+'</td><td>'+tue+'</td>');
    }else if(monthDay==='Thu'){
     $('thead.event-days1 tr').append('<td>'+thur+'</td><td>'+fri+'</td><td>'+sat+'</td><td>'+sund+'</td><td>'+mon+'</td><td>'+tue+'</td><td>'+wed+'</td>');
    }else if(monthDay==='Fri'){
     $('thead.event-days1 tr').append('<td>'+fri+'</td><td>'+sat+'</td><td>'+sund+'</td><td>'+mon+'</td><td>'+tue+'</td><td>'+wed+'</td><td>'+thur+'</td>');
    }else if(monthDay==='Sat'){
     $('thead.event-days1 tr').append('<td>'+sat+'</td><td>'+sund+'</td><td>'+mon+'</td><td>'+tue+'</td><td>'+wed+'</td><td>'+thur+'</td><td>'+fri+'</td>');
    }else if(monthDay==='Sun'){
     $('thead.event-days1 tr').append('<td>'+sund+'</td><td>'+mon+'</td><td>'+tue+'</td><td>'+wed+'</td><td>'+thur+'</td><td>'+fri+'</td><td>'+sat+'</td>');
    }
   }
   ;
   $(getDaysInMonth1(monthNumber-1,yearNumber)).each(function(index){
    var index=index+1;
    if(index<8){
     $('tbody.event-calendar1 tr.1').append('<td id='+index+'-'+monthNumber+'-'+yearNumber+'  date-month="'+monthNumber+'" date-day="'+index+'" date-year="'+yearNumber+'" onclick="getDay1('+index+','+monthNumber+','+yearNumber+')" ><span>'+index+'</span></td>');
    }else if(index<15){
     $('tbody.event-calendar1 tr.2').append('<td id='+index+'-'+monthNumber+'-'+yearNumber+'  date-month1="'+monthNumber+'" date-day1="'+index+'" date-year1="'+yearNumber+'" onclick="getDay1('+index+','+monthNumber+','+yearNumber+')"><span>'+index+'</span></td>');
    }else if(index<22){
     $('tbody.event-calendar1 tr.3').append('<td id='+index+'-'+monthNumber+'-'+yearNumber+'  date-month1="'+monthNumber+'" date-day1="'+index+'" date-year1="'+yearNumber+'" onclick="getDay1('+index+','+monthNumber+','+yearNumber+')"><span>'+index+'</span></td>');
    }else if(index<29){
     $('tbody.event-calendar1 tr.4').append('<td id='+index+'-'+monthNumber+'-'+yearNumber+'  date-month1="'+monthNumber+'" date-day1="'+index+'" date-year1="'+yearNumber+'" onclick="getDay1('+index+','+monthNumber+','+yearNumber+')"><span>'+index+'</span></td>');
    }else if(index<32){
     $('tbody.event-calendar1 tr.5').append('<td id='+index+'-'+monthNumber+'-'+yearNumber+'  date-month1="'+monthNumber+'" date-day1="'+index+'" date-year1="'+yearNumber+'" onclick="getDay1('+index+','+monthNumber+','+yearNumber+')"><span>'+index+'</span></td>');
    }
    i++;
   });
   var date=new Date();
   var month=date.getMonth()+1;
   var thisyear=new Date().getFullYear();
   setCurrentDay1(month,thisyear);
   setEvent1();
   displayEvent1();
  }

  /**
   * Get current day and set as '.current-day'
   */
  function setCurrentDay1(month,year){
   var viewMonth=$('.month1').attr('data-month1');
   var eventYear=$('.event-days1').attr('date-year1');
   if(parseInt(year)===yearNumber){
    if(parseInt(month)===parseInt(viewMonth)){
     $('tbody.event-calendar1 td[date-day1="'+d.getDate()+'"]').addClass('current-day1');
    }
   }
  }
  ;

  /**
   * Add class '.active' on calendar date
   */
  $('tbody td').on('click',function(e){
   if($(this).hasClass('event1')){
    $('tbody.event-calendar1 td').removeClass('active1');
    $(this).addClass('active1');
   }else{
    $('tbody.event-calendar1 td').removeClass('active1');
   }
   ;
  });

  /**
   * Add '.event' class to all days that has an event
   */
  function setEvent1(){
   $('.day-event1').each(function(i){
    var eventMonth=$(this).attr('date-month1');
    var eventDay=$(this).attr('date-day1');
    var eventYear=$(this).attr('date-year1');
    var eventClass=$(this).attr('event-class1');
    if(eventClass===undefined){
     eventClass='event1';
    }else{
     eventClass='event1 '+eventClass;
    }
    var d1=new Date(eventYear+'-'+eventMonth+'-'+eventDay).getTime();
    var d2=new Date().getTime()-60000000;
    if(d2<=d1){
     $('tbody.event-calendar1 tr td[date-month1="'+eventMonth+'"][date-day1="'+eventDay+'"]').addClass(eventClass);
    }else{
     $('tbody.event-calendar1 tr td[date-month1="'+eventMonth+'"][date-day1="'+eventDay+'"]').addClass('pass-event1');
    }
   });
  }
  ;
  function displayEvent1(){
   $('tbody.event-calendar1 td').on('click',function(e){
    var calss_name=this.className;
    if(calss_name=='event1'){
     $('.day-event1').slideUp('fast');
     var monthEvent=$(this).attr('date-month1');
     var yearEvent=$(this).attr('date-year1');
     var dayEvent=$(this).text();
     $('.day-event1[date-month1="'+monthEvent+'"][date-day1="'+dayEvent+'"]').slideDown('fast');
     var getDate=yearEvent+'-'+monthEvent+'-'+dayEvent;
    }
    if(calss_name=='current-day1 event1'){
     $('.day-event1').slideUp('fast');
     var yearEvent=$(this).attr('date-year1');
     var monthEvent=$(this).attr('date-month1');
     var dayEvent=$(this).text();
     $('.day-event1[date-month1="'+monthEvent+'"][date-day1="'+dayEvent+'"]').slideDown('fast');
     var getDate=yearEvent+'-'+monthEvent+'-'+dayEvent;
    }
   });
  }
  ;
  $('.close1').on('click',function(e){
   $(this).parent().slideUp('fast');
  });
 },
};

$(document).ready(function(){
 calendar1.init('ajax');
});

function getDay1(day,month,year){
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
  var checkClass=$('#'+day+'-'+month+'-'+year).hasClass("event1");
  if(checkClass===true){
  }else{
   $('#'+day+'-'+month+'-'+year).addClass('event1');
   getAlldate1(year+'-'+month+'-'+day);
  }
 }else{
  $('#error_msg_date').html('<div class="message error" id="e" onclick="this.classList.add(\'hidden\');">You have chosen past date</div>');
 }

}
function getAlldate1(date){
 $('#multi_date_html').append(date+',');
 var datevalue=$('#multi_date_html').html();
 $('#multi_date').val(datevalue);
}