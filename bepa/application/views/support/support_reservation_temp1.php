<?php
include $_SERVER['DOCUMENT_ROOT'] . "/application/views/common/header.php";
?>
<link rel="stylesheet" href="/application/views/common/css/support.css">

<!-- Home -->
<div class="home-sub">
    <div class="breadcrumbs_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="index.html">기업지원</a></li>
                            <li>대회의실 예약</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Features -->
<div class="features">
    <div class="container">

        <div class="row features_row">
            <!-- Features Item -->
            <div class="col-lg-12 col-xs-12 feature_col block_pad" style="background:#fff;">
                <!--
                    <div class="notice_title">
                        <h2 >공간공유서비스</h2>
                    </div>-->
                <div class="notice_table notice-block2" style="padding:15px 5px 15px 5px;min-height:800px;">

                    <ul class="restab">
                        <li class="tablinks active">
                            대회의실 실시간예약
                        </li>
                        <li class="tablinks " onclick="Room_moving('2');">
                            소회의실 실시간예약
                        </li>
                        <li class="tablinks" onclick="Room_moving('3');">
                            예약확인/취소
                        </li>
                    </ul>
                    <div id="Sground1" class="tabcontent">
                        <div class="content-right" style="float:left;width:60%;">
                            <table id="calendar" class="shcjel-table">
                                <thead>
                                <tr style="height:50px;">
                                    <td style="border:none;">
                                        <button id="before" class="btn btn-default" onClick="prevCalendar();"
                                                style="cursor:pointer;">이전
                                        </button>
                                    </td>
                                    <td style="border:none;font-size:18px;" align="center" id="yearmonth" colspan="5">
                                    </td>
                                    <td style="border:none;text-align: right;">
                                        <button id="next" class="btn btn-default" onClick="nextCalendar();"
                                                style="cursor:pointer; ">다음
                                        </button>
                                    </td>
                                </tr>
                                <tr class="tr-th-top">
                                    <th class="schjel-th">Sun
                                    </td>
                                    <th class="schjel-th">Mon
                                    </td>
                                    <th class="schjel-th">Tue
                                    </td>
                                    <th class="schjel-th">Wed
                                    </td>
                                    <th class="schjel-th">Thu
                                    </td>
                                    <th class="schjel-th">Fri
                                    </td>
                                    <th class="schjel-th">Sat
                                    </td>
                                </tr>
                                </thead>
                                <tbody id="calendar-body" class="calendar-body"></tbody>
                            </table>
                        </div>
                        <div class="content-left" style="float:left;width:39%;padding:5px 5px 5px 15px;">

                            <div class="reserdate">
                                <div class="">예약일 : <span id="select-date-text"></span></div>
                            </div>

                            <form method="post" name="wzfrm" id="wzfrm" action="/support/reserwrite" onload="reset();">
                                <input type="hidden" name="mode" id="mode" value="step2">
                                <input type="hidden" name="sch_day" id="sch_day" value="">
                                <input type="hidden" name="sch_month" id="sch_month" value="">
                                <input type="hidden" name="sch_year" id="sch_year" value="">
                                <input type="hidden" name="sch_room" id="sch_room" value="">
                                <input type="hidden" name="sch_time1" id="sch_time1" value="">
                                <input type="hidden" name="sch_time2" id="sch_time2" value="">


                                <div class="row">

                                    <div class="col-md-12">

                                        <div id="room-select-list">

                                            <div class="media-body info">
                                                <h4 class="room-heading" id="top-aligned-media">대회의실</h4>
                                                <div class="room-desc">13시(PM 1시) 기준 오전 및 오후로 예약 가능합니다.
                                                    <br>종일 예약시에는 오전과 오후 2건을 함께 선택 후 '다음단계'로 이동하시기 바랍니다.
                                                    <br>* 종일 예약을 하실때는 꼭 '오전' 을 먼저 선택하신 후 '오후'를 선택하시기 바랍니다.
                                                </div>
                                            </div>

                                            <ul class="bx-times">
                                                <li>
                                                    <a href="#none" class="btn-time cal_rm_list" data-rm-ix="1"
                                                       data-time="09:00" data-index="1" id="btn_time_1_1"><span
                                                                class="time">오전</span><span
                                                                class="time_i">09시 ~ 13시</span></a></li>
                                                <li>
                                                    <a href="#none" class="btn-time cal_rm_list" data-rm-ix="1"
                                                       data-time="13:00" data-index="2" id="btn_time_1_2"><span
                                                                class="time">오후</span><span
                                                                class="time_i">13시 ~ 17시</span></a></li>
                                            </ul>
                                            <div id="room-select-form"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-block btn-step" id="meeting_step"
                                                onclick="schejul_step3();">다음단계 <i
                                                    class="fa fa-chevron-right fa-sm"></i></button>
                                    </div>

                                </div>

                            </form>

                            <div class="clearfix" style="height:15px;"></div>

                            <div class="panel panel-default hidden-md hidden-lg">
                                <!-- List group -->
                                <ul class="list-group">
                                    <li class="list-group-item"><i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                        달력에서 원하시는 예약일을 선택하시면 이용가능한 정보가 출력됩니다.
                                    </li>
                                    <li class="list-group-item"><i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                        예약 전 반드시 주의사항을 숙지하시기 바랍니다.
                                    </li>
                                </ul>

                                <div class="panel-body">
                                    <p></p>
                                    <p>- 대회의실 : 면적&nbsp;282.86㎡, 수용인원 100석, 현수막 사용가능, 음향시설 사용가능, 빔프로젝트 사용가능, 냉온풍기
                                        사용가능.<br></p>
                                    <p>- 소회의실 : 면적&nbsp;132.77㎡, 수용인원 20석, 현수막 사용불가, 음향시설 사용불가, 빔프로젝트 사용가능, 냉온풍기
                                        사용가능.</p>
                                    <p>- 종일 예약은 오전과 오후 2건을 선택하신 후 '다음단계' 로 이동하시기 바랍니다.</p>
                                    <p></p>
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
<script>
    var today = new Date(); // @param 전역 변수, 오늘 날짜 / 내 컴퓨터 로컬을 기준으로 today에 Date 객체를 넣어줌
    var date = new Date();  // @param 전역 변수, today의 Date를 세어주는 역할
    var limit = new Date(); // @param 전역 변수, 45일 이내만 신청가능
    document.addEventListener("DOMContentLoaded", function () {
        limit.setDate(limit.getDate() + 45);
        buildCalendar();
    });
    /**
     * @brief   이전달 버튼 클릭
     */
    function prevCalendar() {
        this.today = new Date(today.getFullYear(), today.getMonth() - 1, today.getDate());
        buildCalendar();    // @param 전월 캘린더 출력 요청
    }

    /**
     * @brief   다음달 버튼 클릭
     */
    function nextCalendar() {
        this.today = new Date(today.getFullYear(), today.getMonth() + 1, today.getDate());
        buildCalendar();    // @param 명월 캘린더 출력 요청
    }
    /**
     * @brief   캘린더 오픈
     * @details 날짜 값을 받아 캘린더 폼을 생성하고, 날짜값을 채워넣는다.
     */
    function buildCalendar() {
        $.ajax({
            type: 'POST',
            dataType: "json",
            url: "/Support/roomclose",
            data: {
                'rm_ix': '1',
                'rms_year': today.getFullYear(),
                'rms_month': today.getMonth() + 1
            },
            cache: false,
            success: function(data) {
                renderRow(data);
            }
        });
    }

    function renderRow(data) {
        var doMonth = new Date(today.getFullYear(), today.getMonth(), 1);
        var lastDate = new Date(today.getFullYear(), today.getMonth() + 1, 0);
        var nowMonth = doMonth.getMonth() + 1;
        var tbCalendar = document.querySelector('#calendar-body');
        $('#yearmonth').text(today.getFullYear() + '년 ' + autoLeftPad((today.getMonth() + 1), 2)  + '월');

        // @details 이전 캘린더의 출력결과가 남아있다면, 이전 캘린더를 삭제한다.
        while (tbCalendar.rows.length > 0) {
            tbCalendar.deleteRow(tbCalendar.rows.length - 1);
        }

        // @param 첫번째 개행
        var row = tbCalendar.insertRow();
        // @param 날짜가 표기될 열의 증가값
        var dom = 1;
        // @details 시작일의 요일값( doMonth.getDay() ) + 해당월의 전체일( lastDate.getDate())을  더해준 값에서
        //               7로 나눈값을 올림( Math.ceil() )하고 다시 시작일의 요일값( doMonth.getDay() )을 빼준다.
        var daysLength = (Math.ceil((doMonth.getDay() + lastDate.getDate()) / 7) * 7) - doMonth.getDay();

        // @param 달력 출력
        // @details 시작값은 1일을 직접 지정하고 요일값( doMonth.getDay() )를 빼서 마이너스( - )로 for문을 시작한다.
        for (var day = 1 - doMonth.getDay(); daysLength >= day; day++) {


            var column = row.insertCell();// @param 평일( 전월일과 익월일의 데이터 제외 )
            $.each(data, function (index, item) {
                var rms_day = item['rms_day'];
                var rms_time = item['rms_time'];
                var rm_ix = item['rm_ix'];
                if(day == Number(rms_day)){
                    column.innerText = '예약';
                    console.log('예약');
                }else{
                    column.innerText = '공실';
                }
            });
            if (Math.sign(day) == 1 && lastDate.getDate() >= day) {
                // @param 평일 날짜 데이터 삽입
                column.innerText = autoLeftPad(day, 2);
                // @param 일요일인 경우
                if (dom % 7 == 1) {
                    column.style.color = "#FF4D4D";
                }

                // @param 토요일인 경우
                if (dom % 7 == 0) {
                    column.style.color = "#4D4DFF";
                    row = tbCalendar.insertRow();   // @param 토요일이 지나면 다시 가로 행을 한줄 추가한다.
                }
            } else {// @param 평일 전월일과 익월일의 데이터 날짜변경
                var exceptDay = new Date(doMonth.getFullYear(), doMonth.getMonth(), day);
                column.innerText = autoLeftPad(exceptDay.getDate(), 2);
                column.style.color = "#A9A9A9";
            }

            // @brief   전월, 명월 음영처리
            // @details 현재년과 선택 년도가 같은경우
            if (today.getFullYear() == date.getFullYear()) {

                // @details 현재월과 선택월이 같은경우
                if (today.getMonth() == date.getMonth()) {

                    // @details 현재일보다 이전인 경우이면서 현재월에 포함되는 일인경우
                    if (date.getDate() > day && Math.sign(day) == 1) {
                        column.style.backgroundColor = "#E5E5E5";
                    } else if (date.getDate() < day && lastDate.getDate() >= day) { // @details 현재일보다 이후이면서 현재월에 포함되는 일인경우
                        column.style.backgroundColor = "#FFFFFF";
                        column.style.cursor = "pointer";
                        column.onclick = function () {
                            calendarChoiceDay(this);
                        }
                    } else if (date.getDate() < day && lastDate.getDate() >= day) { // @details 현재일보다 이후이면서 현재월에 포함되는 일인경우
                        column.style.backgroundColor = "#FFFFFF";
                        column.style.cursor = "pointer";
                        column.onclick = function () {
                            calendarChoiceDay(this);
                        }
                    } else if (date.getDate() == day) {// @details 현재일인 경우
                        column.style.backgroundColor = "#FFFFE6";
                        column.style.cursor = "pointer";
                        column.onclick = function () {
                            //calendarChoiceDay(this);
                        }
                    }

                    // @details 현재월보다 이전인경우
                } else if (today.getMonth() < date.getMonth()) {
                    if (Math.sign(day) == 1 && day <= lastDate.getDate()) {
                        column.style.backgroundColor = "#E5E5E5";
                    }
                } else if (nowMonth >= limit.getMonth() + 1) {
                    if (nowMonth == limit.getMonth() + 1) {
                        console.log(nowMonth);

                        if (limit.getDate() >= day) {
                            column.style.backgroundColor = "#FFFFFF";
                            column.style.cursor = "pointer";
                            column.onclick = function () {
                                calendarChoiceDay(this);
                            }
                        } else {
                            column.style.backgroundColor = "#E5E5E5";
                        }
                    } else {
                        column.style.backgroundColor = "#E5E5E5";
                    }

                } else { // @details 현재월보다 이후인경우
                    if (Math.sign(day) == 1 && day <= lastDate.getDate()) {
                        column.style.backgroundColor = "#FFFFFF";
                        column.style.cursor = "pointer";
                        column.onclick = function () {
                            calendarChoiceDay(this);
                        }
                    }
                }
            } else if (today.getFullYear() < date.getFullYear()) {// @details 선택한년도가 현재년도보다 작은경우
                if (Math.sign(day) == 1 && day <= lastDate.getDate()) {
                    column.style.backgroundColor = "#E5E5E5";
                }
            } else if (today.getFullYear() > date.getFullYear()) {// @details 선택한년도가 현재년도보다 작은경우
                column.style.backgroundColor = "#E5E5E5";
            } else {// @details 선택한년도가 현재년도보다 큰경우
                if (Math.sign(day) == 1 && day <= lastDate.getDate()) {
                    column.style.backgroundColor = "#FFFFFF";
                    column.style.cursor = "pointer";
                    column.onclick = function () {
                        calendarChoiceDay(this);
                    }
                }
            }
            dom++;
        }
    }

    /**
     * @brief   날짜 선택
     * @details 사용자가 선택한 날짜에 체크표시를 남긴다.
     */
    function calendarChoiceDay(column) {

        // @param 기존 선택일이 존재하는 경우 기존 선택일의 표시형식을 초기화 한다.
        if (document.getElementsByClassName("choiceDay")[0]) {
            document.getElementsByClassName("choiceDay")[0].style.backgroundColor = "#FFFFFF";
            document.getElementsByClassName("choiceDay")[0].classList.remove("choiceDay");
        }

        // @param 선택일 체크 표시
        column.style.backgroundColor = "#FF9999";

        // @param 선택일 클래스명 변경
        column.classList.add("choiceDay");
    }

    /**
     * @brief   숫자 두자릿수( 00 ) 변경
     * @details 자릿수가 한지라인 ( 1, 2, 3등 )의 값을 10, 11, 12등과 같은 두자리수 형식으로 맞추기위해 0을 붙인다.
     * @param   num     앞에 0을 붙일 숫자 값
     * @param   digit   글자의 자릿수를 지정 ( 2자릿수인 경우 00, 3자릿수인 경우 000 … )
     */
    function autoLeftPad(num, digit) {
        if (String(num).length < digit) {
            num = new Array(digit - String(num).length + 1).join("0") + num;
        }
        return num;

    }
</script>
</body>
</html>