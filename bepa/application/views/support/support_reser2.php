<?php
include $_SERVER['DOCUMENT_ROOT']."/application/views/common/header.php";
?>

<link rel="stylesheet" href="/application/views/common/fullcalendar/dist/fullcalendar.min.css">
<link rel="stylesheet" href="/application/views/common/fullcalendar/dist/fullcalendar.print.min.css" media="print">
<style>
@media (max-width: 767px)
.case_study_area.case_page {
    padding-bottom: 50px;
}

.case_study_area.case_page {
    padding-bottom: 100px;
}
@media (max-width: 767px)
.case_study_area {
    padding-top: 50px;
}
.portfolio-menu {
    margin-bottom: 40px;
}
.text-center {
    text-align: center!important;
}
*, ::after, ::before {
    box-sizing: border-box;
}

.portfolio-menu button {
    font-size: 17px;
    font-weight: 400;
    color: #1F1F1F;
    border: none;
	min-width:150px;
    background: transparent;
    border: 1px solid transparent;
    padding: 5px 17px;
    margin: 0 2px;
    -webkit-border-radius: 30px;
    -moz-border-radius: 30px;
    border-radius: 30px;
    cursor: pointer;
}
.portfolio-menu button.active {
    border: 1px solid #5DB2FF;
    color: #5DB2FF;
}
.portfolio-menu button:hover {
       color: #fff;
    background: #4cd3e3;
    border: 1px solid transparent;
}
.portfolio-menu button:focus {
    outline: none;
}
a:focus, .button:focus, button:focus {
    text-decoration: none;
    outline: none;
}
.tabcontent {
  width:100%;
  display: none;
  padding: 10px;
  border: none;
  min-height:400px;
}
#Sground1{
	display:block;
}

table {
    background-color: transparent;
	border-collapse: collapse;
    border-spacing: 0;
	width:100%;
}
.tr-th-top th{text-align:center;padding:10px;border-bottom: 1px solid #ddd;
    border-right: 1px solid #ddd;}
.room-table td {
    padding: 10px 14px 10px 14px;
    font-size: 14px;
    font-weight: 400;
    background: #fff;
    border-bottom: 1px solid #ddd;
    border-right: 1px solid #ddd;
    text-align: center;
    box-sizing: border-box;
    color: #515151;
}
th.th_left {
    background: #1f81d3;
    font-weight: 400;
    color: #fff;
	
	padding: 10px 14px 10px 14px;
	border-bottom:#fff;
}
.room-div>ul>li {
    padding: 0 5px;
    float: left;
    width: 50%;
    box-sizing: border-box;
    text-indent: 0;
}
.room-div>ul>li img {
    width: 100%;
    max-width: 650px;
}
</style>
	<!-- Home -->
	<div class="home-sub">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="index.html">기업지원</a></li>
								<li>공간공유서비스 예약</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>	
	<!-- Features -->
	<div class="features" >
		<div class="container" >

			<div class="row features_row" >	
				<!-- Features Item -->
z
				<!-- Features Item -->
				<div class="col-lg-9 col-xs-12 feature_col block_pad" style="background:#fff;" >					
					
					<div class="notice_table notice-block2" style="padding:15px 5px 15px 5px;overflow:hidden">						
						<div class="case_study_area case_page" style="">
						<div class="container">
							<div class="row">
								<div class="col-xl-12">
									<div class="portfolio-menu text-center">
										<button class="tablinks active" onclick="openRoom(event, 'Sground1')">회의실</button>
										<button class="tablinks" onclick="openRoom(event, 'Sground2')">문화놀이터</button>
										<button class="tablinks" onclick="openRoom(event, 'Sground3')">지식산업센터 회의실</button>								
									</div>
								</div>
							</div>
							<div class="grid">
								<div id="Sground1" class="tabcontent">
									 <div id="calendar"></div>
								</div>

								
								
							</div>
							
						</div>
					</div>
					</div>

				</div>
			</div>
		</div>
	</div>	
<!-- Footer -->
<?php
  include $_SERVER['DOCUMENT_ROOT'] . '/application/views/common/footer.php'; 
?>
<script src="/application/views/common/moment/moment.js"></script>
<script src="/application/views/common/fullcalendar/dist/fullcalendar.min.js"></script>
<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
  

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
      //Random default events
      
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)

        // assign it the date that was reported
        copiedEventObject.start           = date
        copiedEventObject.allDay          = allDay
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove()
        }

      }
    })

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events').prepend(event)

      //Add draggable funtionality
      init_events(event)

      //Remove event from text input
      $('#new-event').val('')
    })
  })
</script>
</body>
</html>