var calendar = {
 init: function (ajax) {
  var pageUrl = $('#pageurl').val();
  var eventId = $('#hidden_event_id').val();
  if (ajax) {

   // ajax call to print json
   $.ajax({
    url: pageUrl + 'users/ajax_events',
    type: 'POST',
    data: {event_id: eventId},
   }).done(function (data) {
    var events = data.events;
    // loop json & append to dom

    $('#choseTime').html('Select Show Timing');
    // $('.list ul.dateTimelist').html('');
    for (var i = 0; i < events.length; i++) {
     //alert(events[i].event_schedule_id);
     //alert(events[i].eventType);
     // $('.list').append('<div class="day-event" date-day="' + events[i].day + '" date-month="' + events[i].month + '" date-year="' + events[i].year + '" data-number="' + i + '"></div>');
     $('.list ul').append('<li style="display:' + events[i].display + '" id="li' + events[i].event_schedule_id + '" data-event_id="' + events[i].event_id + '" data-event_schedule_id="' + events[i].event_schedule_id + '" class="day-event" date-day="' + events[i].day + '" date-month="' + events[i].month + '" date-year="' + events[i].year + '" data-number="' + i + '">' + events[i].day + '-' + events[i].month + '-' + events[i].year + '</li>');
    }


    // start calendar
    calendar.startCalendar();

   })
           .fail(function (data) {
            console.log(data);
           });
  } else {

   // if not using ajax start calendar
   calendar.startCalendar();
  }

 },
 startCalendar: function () {
  var mon = 'Mon';
  var tue = 'Tue';
  var wed = 'Wed';
  var thur = 'Thu';
  var fri = 'Fri';
  var sat = 'Sat';
  var sund = 'Sun';

  /**
   * Get current date
   */
  var d = new Date();
  var strDate = yearNumber + "/" + (d.getMonth() + 1) + "/" + d.getDate();
  var yearNumber = (new Date).getFullYear();
  /**
   * Get current month and set as '.current-month' in title
   */
  var monthNumber = d.getMonth() + 1;

  function GetMonthName(monthNumber) {
   var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
   return months[monthNumber - 1];
  }

  setMonth(monthNumber, mon, tue, wed, thur, fri, sat, sund);

  function setMonth(monthNumber, mon, tue, wed, thur, fri, sat, sund) {
   $('.month').text(GetMonthName(monthNumber) + ' ' + yearNumber);
   $('.month').attr('data-month', monthNumber);
   printDateNumber(monthNumber, mon, tue, wed, thur, fri, sat, sund);
  }

  $('.btn-next').on('click', function (e) {
   var monthNumber = $('.month').attr('data-month');
   if (monthNumber > 11) {
    $('.month').attr('data-month', '0');
    var monthNumber = $('.month').attr('data-month');
    yearNumber = yearNumber + 1;
    setMonth(parseInt(monthNumber) + 1, mon, tue, wed, thur, fri, sat, sund);
   } else {
    setMonth(parseInt(monthNumber) + 1, mon, tue, wed, thur, fri, sat, sund);
   }
   ;
  });

  $('.btn-prev').on('click', function (e) {
   var monthNumber = $('.month').attr('data-month');
   if (monthNumber < 2) {
    $('.month').attr('data-month', '13');
    var monthNumber = $('.month').attr('data-month');
    yearNumber = yearNumber - 1;
    setMonth(parseInt(monthNumber) - 1, mon, tue, wed, thur, fri, sat, sund);
   } else {
    setMonth(parseInt(monthNumber) - 1, mon, tue, wed, thur, fri, sat, sund);
   }
   ;
  });

  /**
   * Get all dates for current month
   */

  function printDateNumber(monthNumber, mon, tue, wed, thur, fri, sat, sund) {

   $($('tbody.event-calendar tr')).each(function (index) {
    $(this).empty();
   });

   $($('thead.event-days tr')).each(function (index) {
    $(this).empty();
   });

   function getDaysInMonth(month, year) {
    // Since no month has fewer than 28 days
    var date = new Date(year, month, 1);
    var days = [];
    while (date.getMonth() === month) {
     days.push(new Date(date));
     date.setDate(date.getDate() + 1);
    }
    return days;
   }

   i = 0;

   setDaysInOrder(mon, tue, wed, thur, fri, sat, sund);

   function setDaysInOrder(mon, tue, wed, thur, fri, sat, sund) {
    var monthDay = getDaysInMonth(monthNumber - 1, yearNumber)[0].toString().substring(0, 3);
    if (monthDay === 'Mon') {
     $('thead.event-days tr').append('<td>' + mon + '</td><td>' + tue + '</td><td>' + wed + '</td><td>' + thur + '</td><td>' + fri + '</td><td>' + sat + '</td><td>' + sund + '</td>');
    } else if (monthDay === 'Tue') {
     $('thead.event-days tr').append('<td>' + tue + '</td><td>' + wed + '</td><td>' + thur + '</td><td>' + fri + '</td><td>' + sat + '</td><td>' + sund + '</td><td>' + mon + '</td>');
    } else if (monthDay === 'Wed') {
     $('thead.event-days tr').append('<td>' + wed + '</td><td>' + thur + '</td><td>' + fri + '</td><td>' + sat + '</td><td>' + sund + '</td><td>' + mon + '</td><td>' + tue + '</td>');
    } else if (monthDay === 'Thu') {
     $('thead.event-days tr').append('<td>' + thur + '</td><td>' + fri + '</td><td>' + sat + '</td><td>' + sund + '</td><td>' + mon + '</td><td>' + tue + '</td><td>' + wed + '</td>');
    } else if (monthDay === 'Fri') {
     $('thead.event-days tr').append('<td>' + fri + '</td><td>' + sat + '</td><td>' + sund + '</td><td>' + mon + '</td><td>' + tue + '</td><td>' + wed + '</td><td>' + thur + '</td>');
    } else if (monthDay === 'Sat') {
     $('thead.event-days tr').append('<td>' + sat + '</td><td>' + sund + '</td><td>' + mon + '</td><td>' + tue + '</td><td>' + wed + '</td><td>' + thur + '</td><td>' + fri + '</td>');
    } else if (monthDay === 'Sun') {
     $('thead.event-days tr').append('<td>' + sund + '</td><td>' + mon + '</td><td>' + tue + '</td><td>' + wed + '</td><td>' + thur + '</td><td>' + fri + '</td><td>' + sat + '</td>');
    }
   }
   ;
   $(getDaysInMonth(monthNumber - 1, yearNumber)).each(function (index) {
    var index = index + 1;
    if (index < 8) {
     $('tbody.event-calendar tr.1').append('<td date-month="' + monthNumber + '" date-day="' + index + '" date-year="' + yearNumber + '"><span>' + index + '</span></td>');
    } else if (index < 15) {
     $('tbody.event-calendar tr.2').append('<td date-month="' + monthNumber + '" date-day="' + index + '" date-year="' + yearNumber + '"><span>' + index + '</span></td>');
    } else if (index < 22) {
     $('tbody.event-calendar tr.3').append('<td date-month="' + monthNumber + '" date-day="' + index + '" date-year="' + yearNumber + '"><span>' + index + '</span></td>');
    } else if (index < 29) {
     $('tbody.event-calendar tr.4').append('<td date-month="' + monthNumber + '" date-day="' + index + '" date-year="' + yearNumber + '"><span>' + index + '</span></td>');
    } else if (index < 32) {
     $('tbody.event-calendar tr.5').append('<td date-month="' + monthNumber + '" date-day="' + index + '" date-year="' + yearNumber + '"><span>' + index + '</span></td>');
    }
    i++;
   });
   var date = new Date();
   var month = date.getMonth() + 1;
   var thisyear = new Date().getFullYear();
   setCurrentDay(month, thisyear);
   setEvent();
   displayEvent();
  }

  /**
   * Get current day and set as '.current-day'
   */
  function setCurrentDay(month, year) {
   var viewMonth = $('.month').attr('data-month');
   var eventYear = $('.event-days').attr('date-year');
   if (parseInt(year) === yearNumber) {
    if (parseInt(month) === parseInt(viewMonth)) {
     $('tbody.event-calendar td[date-day="' + d.getDate() + '"]').addClass('current-day');
    }
   }
  }
  ;

  /**
   * Add class '.active' on calendar date
   */
  $('tbody td').on('click', function (e) {
   if ($(this).hasClass('event')) {
    $('tbody.event-calendar td').removeClass('active');
    $(this).addClass('active');
   } else {
    $('tbody.event-calendar td').removeClass('active');
   }
   ;
  });

  /**
   * Add '.event' class to all days that has an event
   */
  function setEvent() {
   $('.day-event').each(function (i) {
    var eventMonth = $(this).attr('date-month');
    var eventDay = $(this).attr('date-day');
    var eventYear = $(this).attr('date-year');
    var eventClass = $(this).attr('event-class');
    if (eventClass === undefined)
     eventClass = 'event';
    else
     eventClass = 'event ' + eventClass;
    var d1 = new Date(eventYear + '-' + eventMonth + '-' + eventDay).getTime();
    var d2 = new Date().getTime() - 60000000;

    //alert(d1);
    //alert(d2);

    if (d2 <= d1) {
     $('tbody.event-calendar tr td[date-month="' + eventMonth + '"][date-day="' + eventDay + '"]').addClass(eventClass);
    } else {
     $('tbody.event-calendar tr td[date-month="' + eventMonth + '"][date-day="' + eventDay + '"]').addClass('pass-event');
    }
   });
  }
  ;

  /**
   * Get current day on click in calendar
   * and find day-event to display
   */
  function displayEvent() {
   $('tbody.event-calendar td').on('click', function (e) {

    var calss_name = this.className;

    if (calss_name == 'event') {
     $('.day-event').slideUp('fast');
     var monthEvent = $(this).attr('date-month');
     var yearEvent = $(this).attr('date-year');
     var dayEvent = $(this).text();
     $('.day-event[date-month="' + monthEvent + '"][date-day="' + dayEvent + '"]').slideDown('fast');
     $('#choseTime').show();
     var getDate = yearEvent + '-' + monthEvent + '-' + dayEvent;
     getTicket(getDate);

    }
    if (calss_name == 'current-day event') {
     $('.day-event').slideUp('fast');
     var yearEvent = $(this).attr('date-year');
     var monthEvent = $(this).attr('date-month');
     var dayEvent = $(this).text();
     $('.day-event[date-month="' + monthEvent + '"][date-day="' + dayEvent + '"]').slideDown('fast');
     $('#choseTime').show();
     var getDate = yearEvent + '-' + monthEvent + '-' + dayEvent;
     getTicket(getDate);

    }
   });
  }
  ;

  /**
   * Close day-event
   */
  $('.close').on('click', function (e) {
   $(this).parent().slideUp('fast');
  });

  /**
   * Save & Remove to/from personal list
   */
//  $('.save').click(function () {
//   if (this.checked) {
//    $(this).next().text('Remove from personal list');
//    var eventHtml = $(this).closest('.day-event').html();
//    var eventMonth = $(this).closest('.day-event').attr('date-month');
//    var eventDay = $(this).closest('.day-event').attr('date-day');
//    var eventNumber = $(this).closest('.day-event').attr('data-number');
//    $('.person-list').append('<div class="day" date-month="' + eventMonth + '" date-day="' + eventDay + '" data-number="' + eventNumber + '" style="display:none;">' + eventHtml + '</div>');
//    $('.day[date-month="' + eventMonth + '"][date-day="' + eventDay + '"]').slideDown('fast');
//    $('.day').find('.close').remove();
//    $('.day').find('.save').removeClass('save').addClass('remove');
//    $('.day').find('.remove').next().addClass('hidden-print');
//    remove();
//    sortlist();
//   } else {
//    $(this).next().text('Save to personal list');
//    var eventMonth = $(this).closest('.day-event').attr('date-month');
//    var eventDay = $(this).closest('.day-event').attr('date-day');
//    var eventNumber = $(this).closest('.day-event').attr('data-number');
//    $('.day[date-month="' + eventMonth + '"][date-day="' + eventDay + '"][data-number="' + eventNumber + '"]').slideUp('slow');
//    setTimeout(function () {
//     $('.day[date-month="' + eventMonth + '"][date-day="' + eventDay + '"][data-number="' + eventNumber + '"]').remove();
//    }, 1500);
//   }
//  });



  /**
   * Sort personal list
   */


  /**
   * Print button
   */

 },
};

$(document).ready(function () {
 calendar.init('ajax');
});
