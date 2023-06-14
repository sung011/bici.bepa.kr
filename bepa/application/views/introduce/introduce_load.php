<?php
include $_SERVER['DOCUMENT_ROOT']."/application/views/common/header.php";
?>
<style>
    .wrap {position: absolute;left: 0;bottom: 40px;width: 288px;height: 132px;margin-left: -144px;text-align: left;overflow: hidden;font-size: 12px;font-family: 'Malgun Gothic', dotum, '돋움', sans-serif;line-height: 1.5;}
    .wrap * {padding: 0;margin: 0;}
    .wrap .info {width: 286px;height: 120px;border-radius: 5px;border-bottom: 2px solid #ccc;border-right: 1px solid #ccc;overflow: hidden;background: #fff;}
    .wrap .info:nth-child(1) {border: 0;box-shadow: 0px 1px 2px #888;}
    .info .title {padding: 5px 0 0 10px;height: 30px;background: #eee;border-bottom: 1px solid #ddd;font-size: 18px;font-weight: bold;}
    .info .close {position: absolute;top: 10px;right: 10px;color: #888;width: 17px;height: 17px;background: url('https://t1.daumcdn.net/localimg/localimages/07/mapapidoc/overlay_close.png');}
    .info .close:hover {cursor: pointer;}
    .info .body {position: relative;overflow: hidden;}
    .info .desc {position: relative;margin: 13px 0 0 90px;height: 75px;}
    .desc .ellipsis {overflow: hidden;text-overflow: ellipsis;white-space: nowrap;}
    .desc .jibun {font-size: 11px;color: #888;margin-top: -2px;}
    .info .img {position: absolute;top: 6px;left: 5px;width: 73px;height: 71px;border: 1px solid #ddd;color: #888;overflow: hidden;}
    .info:after {content: '';position: absolute;margin-left: -12px;left: 50%;bottom: 0;width: 22px;height: 12px;background: url('https://t1.daumcdn.net/localimg/localimages/07/mapapidoc/vertex_white.png')}
    .info .link {color: #5085BB;}
</style>
	<!-- Features -->
	<div class="features" >
		<div class="container">

			<div class="row features_row sub_feat_row">	
				<!-- Features Item -->
				<div class="col-lg-3 feature_col block_pad m-hidden" style="min-height:50vh;background:#fff;">
					<?php
						include $_SERVER['DOCUMENT_ROOT']."/application/views/common/left_menu.php";
					?>		
				</div>
				<!-- Features Item -->
				<div class="col-lg-9 col-xs-12 feature_col block_pad" style="background:#fff;" >
					
					<div class="notice_title">
						<h2>찾아오는길</h2>
						<!-- Home -->
						<div class="home-sub">
							<div class="breadcrumbs_container">
								<div class="row">
									<div class="col">
										<div class="breadcrumbs">
											<ul>
												<li><a href="index.html">공단소개</a></li>
												<li>찾아오는길</li>
											</ul>
										</div>
									</div>
								</div>
							</div>			
						</div>
					</div>
					<div class="notice_table " >
							<div id="map" style="width:100%;height:400px;border:2px solid #3753a8;border-radius:5px;padding:5px;"></div>	
							<div class="location-block">				
								<p>주소 : 부산광역시 연제구 중앙대로 1090, 프라임시티 B/D 3,4층 </p>
								<p>TEL : 051-000-0000</p>
							</div>
							<div class="location-block">
								<h3  style="margin-top:30px;margin-bottom:10px;">대중교통 이용시</h3>
								<!--<p><strong>지하철 8호선</strong> / '단대오거리역' 하차 후 버스 이용<br><br></p>
								<p>
									<strong>마을버스 3-6</strong> / '단대오거리역,(구)종점' 승차 → '공단본부,샤니' 정류장 하차<br>
									<strong>마을버스 3-5</strong> / '단대오거리역,(구)종점' 승차 → '공단본부,샤니' 정류장 하차<br>
									<strong>일반버스 220</strong> / '성남세무서,미도아파트' 승차 → '공단본부,샤니' 정류장 하차
								</p>-->
							</div>
					</div>
					<div><div class="sub-footer"></div></div>
				</div>
			</div>
		</div>
	</div>
		
	<!-- Footer -->
<?php
  include $_SERVER['DOCUMENT_ROOT'] . '/application/views/common/footer.php'; 
?>

<script>

    var mapContainer = document.getElementById('map'), // 지도의 중심좌표
        mapOption = {
            center: new kakao.maps.LatLng(35.1847746, 129.0788739), // 지도의 중심좌표
            level: 3 // 지도의 확대 레벨
        };

    var map = new kakao.maps.Map(mapContainer, mapOption); // 지도를 생성합니다

    // 지도에 마커를 표시합니다
    var marker = new kakao.maps.Marker({
        map: map,
        position: new kakao.maps.LatLng(35.1847746, 129.0788739)
    });

    // 커스텀 오버레이에 표시할 컨텐츠 입니다
    // 커스텀 오버레이는 아래와 같이 사용자가 자유롭게 컨텐츠를 구성하고 이벤트를 제어할 수 있기 때문에
    // 별도의 이벤트 메소드를 제공하지 않습니다
    var content = '<div class="wrap">' +
        '    <div class="info">' +
        '        <div class="title">' +
        '            부산산업단지지원시스템' +
        '            <div class="close" onclick="closeOverlay()" title="닫기"></div>' +
        '        </div>' +
        '        <div class="body">' +
        '            <div class="img">' +
        '                <img src="https://cfile181.uf.daum.net/image/250649365602043421936D" width="73" height="70">' +
        '           </div>' +
        '            <div class="desc">' +
        '                <div class="ellipsis">부산광역시 연제구 중앙대로 1090</div>' +
        '                <div class="ellipsis">프라임시티 B/D 3,4층</div>' +
        // '                <div><a href="https://www.kakaocorp.com/main" target="_blank" class="link">홈페이지</a></div>' +
        '            </div>' +
        '        </div>' +
        '    </div>' +
        '</div>';

    // 마커 위에 커스텀오버레이를 표시합니다
    // 마커를 중심으로 커스텀 오버레이를 표시하기위해 CSS를 이용해 위치를 설정했습니다
    var overlay = new kakao.maps.CustomOverlay({
        content: content,
        map: map,
        position: marker.getPosition()
    });

    // 마커를 클릭했을 때 커스텀 오버레이를 표시합니다
    kakao.maps.event.addListener(marker, 'click', function() {
        overlay.setMap(map);
    });

    // 커스텀 오버레이를 닫기 위해 호출되는 함수입니다
    function closeOverlay() {
        overlay.setMap(null);
    }




</script>
</body>
</html>