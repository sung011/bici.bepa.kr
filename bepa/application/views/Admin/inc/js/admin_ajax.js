var clareCalendar = {
	monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
	dayNamesMin: ['일','월','화','수','목','금','토'],
	weekHeader: 'Wk',
	dateFormat: 'yy-mm-dd', //형식(20120303)
	autoSize: false, //오토리사이즈(body등 상위태그의 설정에 따른다)
	changeMonth: true, //월변경가능
	changeYear: true, //년변경가능
	showMonthAfterYear: false, //년 뒤에 월 표시	
	yearRange: "2002:<?=date('Y')+1?>" //1990년부터 2020년까지
};
$("#begin_date").datepicker(clareCalendar);
$("#end_date").datepicker(clareCalendar);


function date_modify(seq){
	var begindate="";
	var enddate="";
	var currentDay = new Date();
	var theYear = currentDay.getFullYear();
	var theMonth = currentDay.getMonth() +1;
	
	var theDate  = currentDay.getDate();
	var theDayOfWeek = currentDay.getDay();

	

	if(seq == '1'){		
		if(theMonth < 10) theMonth = "0"+theMonth;
		if(theDate < 10) theDate = "0"+theDate;
		var nowDate = theYear + '-' + theMonth + '-' + theDate ;
		begindate = nowDate;
		enddate = nowDate;
	}

	if(seq == '2'){		
		if(theMonth < 10) theMonth = "0"+theMonth;
		let theDate = currentDay.getDate() - 1;
		if(theDate < 10) theDate = "0"+theDate;
		var nowDate = theYear + '-' + theMonth + '-' + theDate ;
		begindate = nowDate;
		enddate = nowDate;
	}

	if(seq == '3'){		
		var sDay = new Date(theYear, theMonth, theDate + (0 - theDayOfWeek));
		var syyyy = sDay.getFullYear();
		var smm = Number(sDay.getMonth()) ;
		var sdd = sDay.getDate();
 
		smm = String(smm).length === 1 ? '0' + smm : smm;
		sdd = String(sdd).length === 1 ? '0' + sdd : sdd;
		begindate = syyyy + '-' + smm + '-' + sdd;

		var lDay = new Date(theYear, theMonth, theDate + (6 - theDayOfWeek));
		var lyyyy = lDay.getFullYear();
		var lmm = Number(lDay.getMonth());
		var ldd = lDay.getDate();
 
		lmm = String(lmm).length === 1 ? '0' + lmm : lmm;
		ldd = String(ldd).length === 1 ? '0' + ldd : ldd;
		enddate = lyyyy + '-' + lmm + '-' + ldd;
	}
	if(seq == '4'){		
		var lastDate = new Date(theYear,theMonth,0);
		var lastDay  = lastDate.getDate();
		if(theMonth < 10) theMonth = "0"+theMonth;
		begindate = theYear + '-' + theMonth + '-' + "01";
		enddate = theYear + '-' + theMonth + '-' + lastDay;
	}

	$("#begin_date").val(begindate);
	$("#end_date").val(enddate);
}
