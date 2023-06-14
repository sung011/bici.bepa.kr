<?php
include $_SERVER['DOCUMENT_ROOT']."/application/views/common/header.php";
?>
<style>

/* Style the tab */
.restab {
	position: relative;
    padding-left: 0;
    list-style: none;
	margin-top: 0;
	height:49px;
	border-bottom: 1px solid #ddd;
}

/* Style the buttons inside the tab */
.restab .tablinks {
  position: relative;
  display: block;
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding:10px 13px;
  transition: 0.3s;
  font-size: 17px;
  margin-bottom:-1px;
  
}

/* Change background color of buttons on hover */
.restab .tablinks:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.restab li.active  {
    color: #555;
    background-color: #fff;
    border: 1px solid #ddd;
    border-bottom-color: transparent;
	 z-index:100000;
}

/* Style the tab content */
.tabcontent {
  clear:both;
  display: none;
  padding: 6px 12px;
  border-top: none;
  height:500px;
}
.content-wrap{
  width: 100%;
  margin:0 auto;
  border: 4px solid rgba(161, 161, 161, 0.5); 
  border-radius: 20px;
  overflow: hidden;
  background: #ddaf35;
}
.content-left{
  background: #0b0809;
  color:#ddaf35;
  float: left;
  width: 100%;
  padding: 30px;
}
.main-wrap{
  text-align: center;
  padding: 20px 0 0 0;
}
.main-day{
  font-size: 30px;
  font-weight: bold;
}
.main-date{
  font-size: 120px;
  font-weight: bold;
  margin: 20px 0;
}
.todo-wrap{
  padding: 0 0 0 40px;
}
.todo-title{
  font-size: 20px;
  font-weight: 100;
  margin: 0 0 10px 0;
}
.input-box{
  width: 50%;
  margin-right: 20px;
  height: auto; 
  background: #0b0809;
  color: #ddaf35;
  line-height : normal;
  padding: .8em .5em 0 0; 
  font-family: inherit;
  border: 0; 
  border-bottom: 1px dashed #ddaf35;; 
  border-radius: 0; 
  outline-style: none; 
  -webkit-appearance: none; 
  -moz-appearance: none; 
  appearance: none;
}
.input-data{
  cursor: pointer;
  font-size: 10px;
  padding: 10px;
  margin: 10px 0 10px 0;
  background: #ddaf35;
  border: none;
  color: #0b0809;
  border-radius: 10px;
}
.input-data:hover{
  background: #ffffff;
  color: #0b0809;
}
.input-list > div{
  font-size: 10px;
  width: 60%;
  float: left;
  color: #ddaf35;
}
.input-list > .checked{
  color: #FFFFFF;
  text-decoration:line-through
}
.del-data{
  display: block;
  color: #ddaf35;
  float: left;
  width: 10%;
  cursor: pointer;
  font-size: 10px;
  padding: 10px;
  background: #0b0809;
  border: none;
  border-radius: 10px;
}
.content-right{
  float: left;
  width: 90%;
  padding: 10px;
}
.sun{
  color:#ef3333;
}
.sat{
  color:#2107e0;
}
.content-right table tr td{
  width: 40px;
  height: 40px;
  text-align: center;
  font-size: 20px;
  font-weight: bold;
}
.active{
  background: #0b0809;
  border-radius: 50%;
  color: #ffffff;
}

@media(min-width: 850px){
  .main{
    display: flex;
    align-items: center;
    justify-content:  center;
    width: 100vw;
    height: 100vh;
    background: #ababab;
  }
  .content-wrap{
    width: 800px;
    height: 600px;
    margin:0 auto;
    border: 4px solid rgba(161, 161, 161, 0.5); 
    border-radius: 20px;
    overflow: hidden;
    background: #ddaf35;
  }
  .content-left{
    background: #0b0809;
    color:#ddaf35;
    float: left;
    width: 360px;
    height: 600px;
    padding: 90px 20px 20px 0;
  }
  .main-wrap{
    text-align: center;
    margin: 20px 0 0 0;
  }
  .main-day{
    font-size: 30px;
    font-weight: bold;
  }
  .main-date{
    font-size: 120px;
    font-weight: bold;
    margin: 20px 0;
  }
  .todo-wrap{
    padding: 0 0 0 40px;
  }
  .todo-title{
    font-size: 20px;
    font-weight: 100;
    margin: 0 0 10px 0;
  }
  .input-box{
    width: 70%;
    height: auto; 
    background: #0b0809;
    color: #ddaf35;
    line-height : normal;
    padding: .8em .5em 0 0; 
    font-family: inherit;
    border: 0; 
    border-bottom: 1px dashed #ddaf35;; 
    border-radius: 0; 
    outline-style: none; 
    -webkit-appearance: none; 
    -moz-appearance: none; 
    appearance: none;
  }
  .input-data{
    cursor: pointer;
    font-size: 10px;
    padding: 10px;
    margin: 20px 0 30px 0;
    background: #ddaf35;
    border: none;
    color: #0b0809;
    border-radius: 10px;
  }
  .input-data:hover{
    background: #ffffff;
    color: #0b0809;
  }
  .input-list > div{
    font-size: 10px;
    width: 60%;
    float: left;
    color: #ddaf35;
  }
  .del-data{
    display: block;
    color: #ddaf35;
    float: left;
    width: 10%;
    cursor: pointer;
    font-size: 10px;
    padding: 10px;
    background: #0b0809;
    border: none;
    border-radius: 10px;
  }
  .content-right{
    float: left;
    width: 360px;
    height: 600px;
    padding: 100px 20px 20px 20px;
  }
  .sun{
    color:#ef3333;
  }
  .sat{
    color:#2107e0;
  }
  .content-right table tr td{
    width: 50px;
    height: 50px;
    text-align: center;
    font-size: 20px;
    font-weight: bold;
  }
  .active{
    background: #0b0809;
    border-radius: 50%;
    color: #ffffff;
  }
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
				<div class="col-lg-12 col-xs-12 feature_col block_pad" style="background:#fff;" >					
					<div class="notice_title">
						<h2 >공간공유서비스</h2>
					</div>
					<div class="notice_table notice-block2" style="padding:15px 5px 15px 5px;height:700px;">						
			
						<ul class="restab">
							<li class="tablinks active" onclick="resRoom(event, 'Sground1')">
								실시간예약
							</li>
							<li class="tablinks" onclick="resRoom(event, 'Sground2')">
							예약확인/취소
							</li>
						</li>
						<div id="Sground1" class="tabcontent">
							<div class="main">
							<div class="content-wrap">
						    <div class="content-left">
								<div class="main-wrap">
									<div id="main-day" class="main-day"></div>
									<div id="main-date" class="main-date"></div>
								</div>
								<div class="todo-wrap">
									<div class="todo-title">Todo List</div>
									<div class="input-wrap">
										<input type="text" placeholder="please write here!!" id="input-box" class="input-box">
										<button type="button" id="input-data" class="input-data">INPUT</button>
									<div id="input-list" class="input-list"></div>
								  </div>
								</div>
							</div>
							<div class="content-right">
								<table id="calendar" align="center">
								  <thead>
									<tr class="btn-wrap clearfix">
									  <td>
										<label id="prev">
											&#60;
										</label>
									  </td>
									  <td align="center" id="current-year-month" colspan="5"></td>
									  <td>
										<label id="next">
											&#62;
										</label>
									  </td>
									</tr>
									<tr>
										<td class = "sun" align="center">Sun</td>
										<td align="center">Mon</td>
										<td align="center">Tue</td>
										<td align="center">Wed</td>
										<td align="center">Thu</td>
										<td align="center">Fri</td>
										<td class= "sat" align="center">Sat</td>
									  </tr>
								  </thead>
								  <tbody id="calendar-body" class="calendar-body"></tbody>
								</table>
							</div>
							</div>
							</div>
						</div>
						<div id="Sground2" class="tabcontent">
							bbb
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
alert('aaa');


function resRoom(evt, resblock) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(resblock).style.display = "block";
  evt.currentTarget.className += " active";
}
showCalendar();
$("#Sground1").css('display','block');
</script>
</body>
</html>