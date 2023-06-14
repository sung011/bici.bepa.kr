<?php
include $_SERVER['DOCUMENT_ROOT'] . "/application/views/common/header.php";

?>
<link rel="stylesheet" href="/assets/css/complex.css">
<style>
    .tac {
        text-align: center;
    }

    .tar {
        text-align: right;
    }

    .tal {
        text-align: left;
    }
</style>
<!-- Features -->
<div class="features">
    <div class="container">

        <div class="row features_row sub_feat_row">
            <!-- Features Item -->
            <div class="col-lg-3 feature_col block_pad m-hidden" style="min-height:50vh;background:#fff;">
                <?php
                include $_SERVER['DOCUMENT_ROOT'] . "/application/views/common/left_menu.php";
                ?>
            </div>

            <!-- Features Item -->
            <div class="col-lg-9 col-xs-12 feature_col block_pad" style="background:#fff;">


                <div class="notice_title">
                    <h2><?php echo $co_subject; ?></h2>
                    <!-- Home -->
                    <div class="home-sub">
                        <div class="breadcrumbs_container">
                            <div class="row">
                                <div class="col">
                                    <div class="breadcrumbs">
                                        <ul>
                                            <li>부산 산업 단지 정보</li>
                                            <li><?php echo $co_subject; ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="notice_table complex-block">
                    <div class="sub_docu">
                        <h2 class="sub_tit">부산지역 산업단지 입주현황 ※ ’21.1분기, 조성완료 산업단지</h2>
                        <table class="Base" id="comp_div_table">
                            <caption>산업단지 업종현황</caption>
                            <colgroup>
                                <col style="width: 5%;">
                                <col style="width: 35%;">
                                <col style="width: 15%;">
                                <col style="width: 15%;">
                                <col style="width: 15%;">
                                <col style="width: 15%;">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th scope="col">연번</th>
                                    <th scope="col">산업단지명</th>
                                    <th scope="col">전체면적(㎡)</th>
                                    <th scope="col">산업용지(㎡) </th>
                                    <th scope="col">입주업체(개)</th>
                                    <th scope="col">고용인원(명)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row" style="background-color: #d5e9f6; font-size: 13px;"></th>
                                    <th class="tac" style="background-color: #d5e9f6; font-size: 13px;">계</th>
                                    <th class="tar" style="background-color: #d5e9f6; font-size: 13px;">3,517만</th>
                                    <th class="tar" style="background-color: #d5e9f6; font-size: 13px;">1,965만</th>
                                    <th class="tar" style="background-color: #d5e9f6; font-size: 13px;">6,907</th>
                                    <th class="tar" style="background-color: #d5e9f6; font-size: 13px;">106,539</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>동부산권<br>(기장,해운대,금정구)</th>
                                    <th class="tar">758만</th>
                                    <th class="tar">395만</th>
                                    <th class="tar">2,814</th>
                                    <th class="tar">30,148</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td class="tal">정관 농공단지</td>
                                    <td class="tar">26만</td>
                                    <td class="tar">19만</td>
                                    <td class="tar">31</td>
                                    <td class="tar">1,830</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td class="tal">센첨시티 일반산단</td>
                                    <td class="tar">118만</td>
                                    <td class="tar">21만</td>
                                    <td class="tar">2,181</td>
                                    <td class="tar">14,652</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td class="tal">기룡1 일반산단</td>
                                    <td class="tar">8만</td>
                                    <td class="tar">6만</td>
                                    <td class="tar">1</td>
                                    <td class="tar">68</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td class="tal">정관 일반산단</td>
                                    <td class="tar">121만</td>
                                    <td class="tar">61만</td>
                                    <td class="tar">209</td>
                                    <td class="tar">3,453</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td class="tal">장안 일반산단</td>
                                    <td class="tar">130만</td>
                                    <td class="tar">77만</td>
                                    <td class="tar">78</td>
                                    <td class="tar">3,728</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td class="tal">기룡2 일반산단</td>
                                    <td class="tar">5만</td>
                                    <td class="tar">3만</td>
                                    <td class="tar">1</td>
                                    <td class="tar">29</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td class="tal">정관코리 일반산단</td>
                                    <td class="tar">8만</td>
                                    <td class="tar">6만</td>
                                    <td class="tar">4</td>
                                    <td class="tar">105</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td class="tal">화동선대 도시첨단산단</td>
                                    <td class="tar">23만</td>
                                    <td class="tar">13만</td>
                                    <td class="tar">111</td>
                                    <td class="tar">2,399</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td class="tal">명례 일반산단</td>
                                    <td class="tar">157만</td>
                                    <td class="tar">87만</td>
                                    <td class="tar">81</td>
                                    <td class="tar">1,491</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td class="tal">부산신소재 일반산단</td>
                                    <td class="tar">26만</td>
                                    <td class="tar">17만</td>
                                    <td class="tar">4</td>
                                    <td class="tar">396</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td class="tal">반룡 일반산단</td>
                                    <td class="tar">55만</td>
                                    <td class="tar">33만</td>
                                    <td class="tar">64</td>
                                    <td class="tar">1,209</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td class="tal">오리 일반산단</td>
                                    <td class="tar">61만</td>
                                    <td class="tar">39만</td>
                                    <td class="tar">34</td>
                                    <td class="tar">492</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td class="tal">에코장안 일반산단</td>
                                    <td class="tar">20만</td>
                                    <td class="tar">13만</td>
                                    <td class="tar">15</td>
                                    <td class="tar">296</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="tac">서부산권<br>(감서,사하,사상,복구)</td>
                                    <td class="tar">2,759만</td>
                                    <td class="tar">1,570만</td>
                                    <td class="tar">4,093</td>
                                    <td class="tar">76,391</td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td class="tal">신평장림 일반산단</td>
                                    <td class="tar">282만</td>
                                    <td class="tar">175만</td>
                                    <td class="tar">644</td>
                                    <td class="tar">14,636</td>
                                </tr>
                                <tr>
                                    <td>15</td>
                                    <td class="tal">녹산 국가산단</td>
                                    <td class="tar">700만</td>
                                    <td class="tar">411만</td>
                                    <td class="tar">1,557</td>
                                    <td class="tar">28,448</td>
                                </tr>
                                <tr>
                                    <td>16</td>
                                    <td class="tal">신호 일반산단</td>
                                    <td class="tar">312만</td>
                                    <td class="tar">171만</td>
                                    <td class="tar">75</td>
                                    <td class="tar">3,077</td>
                                </tr>
                                <tr>
                                    <td>17</td>
                                    <td class="tal">부산과학 일반산단</td>
                                    <td class="tar">196만</td>
                                    <td class="tar">103만</td>
                                    <td class="tar">164</td>
                                    <td class="tar">4,153</td>
                                </tr>
                                <tr>
                                    <td>18</td>
                                    <td class="tal">화전 일반산단</td>
                                    <td class="tar">245만</td>
                                    <td class="tar">142만</td>
                                    <td class="tar">299</td>
                                    <td class="tar">5,830</td>
                                </tr>
                                <tr>
                                    <td>19</td>
                                    <td class="tal">감서보고 일반산단</td>
                                    <td class="tar">10만</td>
                                    <td class="tar">5만</td>
                                    <td class="tar">21</td>
                                    <td class="tar">197</td>
                                </tr>
                                <tr>
                                    <td>20</td>
                                    <td class="tal">모라 도시첨단산단</td>
                                    <td class="tar">1만</td>
                                    <td class="tar">1만</td>
                                    <td class="tar">204</td>
                                    <td class="tar">1,357</td>
                                </tr>
                                <tr>
                                    <td>21</td>
                                    <td class="tal">생곡 일반산단</td>
                                    <td class="tar">56만</td>
                                    <td class="tar">33만</td>
                                    <td class="tar">101</td>
                                    <td class="tar">1,014</td>
                                </tr>
                                <tr>
                                    <td>22</td>
                                    <td class="tal">성우 일반산단</td>
                                    <td class="tar">6만</td>
                                    <td class="tar">5만</td>
                                    <td class="tar">3</td>
                                    <td class="tar">161</td>
                                </tr>
                                <tr>
                                    <td>23</td>
                                    <td class="tal">풍상 일반산단</td>
                                    <td class="tar">6만</td>
                                    <td class="tar">5만</td>
                                    <td class="tar">3</td>
                                    <td class="tar">149</td>
                                </tr>
                                <tr>
                                    <td>24</td>
                                    <td class="tal">미음 일반산단</td>
                                    <td class="tar">355만</td>
                                    <td class="tar">193만</td>
                                    <td class="tar">420</td>
                                    <td class="tar">8,224</td>
                                </tr>
                                <tr>
                                    <td>25</td>
                                    <td class="tal">지사2 일반산단</td>
                                    <td class="tar">10만</td>
                                    <td class="tar">5만</td>
                                    <td class="tar">16</td>
                                    <td class="tar">177</td>
                                </tr>
                                <tr>
                                    <td>26</td>
                                    <td class="tal">국제산업물류도시1단계<br>일반산단</td>
                                    <td class="tar">571만</td>
                                    <td class="tar">319만</td>
                                    <td class="tar">571</td>
                                    <td class="tar">8,907</td>
                                </tr>
                                <tr>
                                    <td>27</td>
                                    <td class="tal">정주 일반산단</td>
                                    <td class="tar">10만</td>
                                    <td class="tar">4만</td>
                                    <td class="tar">2</td>
                                    <td class="tar">61</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="notice_table complex-block">
                    <div class="sub_docu">
                        <h2 class="sub_tit">부산지역 산업단지 산업동향</h2>
                        <div class="sub_docu">
                            <span style="font-size:12px;">※ 조사기간 : ’20. 11월 ~ ‘21. 2월 / 조성완료 산업단지 25개 (녹산국가산업단지, 정주일반산업단지 제외) / 응답률 80%</span>
                        </div>
                        <table class="Base" id="comp_div_table">
                            <caption>산업단지 업종현황</caption>
                            <colgroup>
                                <col style="width: 3%;">
                                <col style="width: 8%;">
                                <col style="width: 10%;">
                                <col style="width: 10%;">
                                <col style="width: 10%;">
                                <col style="width: 10%;">
                                <col style="width: 10%;">
                                <col style="width: 10%;">
                                <col style="width: 10%;">
                                <col style="width: 10%;">
                                <col style="width: 10%;">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th scope="col" rowspan="2" colspan="2">단지명</th>
                                    <th scope="col" colspan="4">생 산 액(백만원)</th>
                                    <th scope="col" colspan="4">수 출 액(천달러)</th>
                                    <th scope="col" rowspan="2">가동률<br>(‘20.3분기)</th>
                                </tr>
                                <tr>
                                    <th scope="col">‘19년</th>
                                    <th scope="col">‘20.1분기</th>
                                    <th scope="col">‘20.2분기</th>
                                    <th scope="col">‘20.3분기</th>
                                    <th scope="col">‘19년</th>
                                    <th scope="col">‘20.1분기</th>
                                    <th scope="col">‘20.2분기</th>
                                    <th scope="col">‘20.3분기</th>
                                </tr>
                                <tr>
                                    <th style="background-color:#d5e9f6;font-size:13px;" scope="col" colspan="2">계</th>
                                    <th style="background-color:#d5e9f6;font-size:13px;" scope="col">24,284,157</th>
                                    <th style="background-color:#d5e9f6;font-size:13px;" scope="col">5,735,366</th>
                                    <th style="background-color:#d5e9f6;font-size:13px;" scope="col">5,577,634</th>
                                    <th style="background-color:#d5e9f6;font-size:13px;" scope="col">5,706,857</th>
                                    <th style="background-color:#d5e9f6;font-size:13px;" scope="col">5,796,503</th>
                                    <th style="background-color:#d5e9f6;font-size:13px;" scope="col">1,155,917</th>
                                    <th style="background-color:#d5e9f6;font-size:13px;" scope="col">940,258</th>
                                    <th style="background-color:#d5e9f6;font-size:13px;" scope="col">1,002,954</th>
                                    <th style="background-color:#d5e9f6;font-size:13px;" scope="col">63.1%</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td rowspan="13">
                                        동부산
                                    </td>
                                    <td>
                                        기룡1
                                    </td>
                                    <td> - </td>
                                    <td> - </td>
                                    <td> - </td>
                                    <td> - </td>
                                    <td> - </td>
                                    <td> - </td>
                                    <td> - </td>
                                    <td> - </td>
                                    <td> - </td>
                                </tr>
                                <tr>
                                    <td>
                                        기룡2
                                    </td>
                                    <td> - </td>
                                    <td> - </td>
                                    <td> - </td>
                                    <td> - </td>
                                    <td> - </td>
                                    <td> - </td>
                                    <td> - </td>
                                    <td> - </td>
                                    <td> - </td>
                                </tr>
                                <tr>
                                    <td>장안</td>
                                    <td>975,726</td>
                                    <td>261,013</td>
                                    <td>247,570</td>
                                    <td>274,138</td>
                                    <td>189,833</td>
                                    <td>49,965</td>
                                    <td>51,550</td>
                                    <td>56,035</td>
                                    <td>77.8%</td>
                                </tr>
                                <tr>
                                    <td>정관</td>
                                    <td>1,101,005</td>
                                    <td>253,862</td>
                                    <td>246,043</td>
                                    <td>255,037</td>
                                    <td>270,592</td>
                                    <td>55,866</td>
                                    <td>55,921</td>
                                    <td>59,506</td>
                                    <td>70.7%</td>
                                </tr>
                                <tr>
                                    <td>정관농공</td>
                                    <td><?=number_format('598600')?></td>
                                    <td><?=number_format('130059')?></td>
                                    <td><?=number_format('106267')?></td>
                                    <td><?=number_format('120430')?></td>
                                    <td><?=number_format('147299')?></td>
                                    <td><?=number_format('28943')?></td>
                                    <td><?=number_format('12107')?></td>
                                    <td><?=number_format('21786')?></td>
                                    <td>75.0%</td>
                                </tr>
                                <tr>
                                    <td>정관코리</td>
                                    <td><?=number_format('7200')?></td>
                                    <td><?=number_format('1600')?></td>
                                    <td><?=number_format('1600')?></td>
                                    <td><?=number_format('1700')?></td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>47.2%</td>
                                </tr>
                                <tr>
                                    <td>신소재</td>
                                    <td><?=number_format('200000')?></td>
                                    <td><?=number_format('45000')?></td>
                                    <td><?=number_format('45000')?></td>
                                    <td><?=number_format('50000')?></td>
                                    <td><?=number_format('110000')?></td>
                                    <td><?=number_format('25000')?></td>
                                    <td><?=number_format('25000')?></td>
                                    <td><?=number_format('25000')?></td>
                                    <td>90.9%</td>
                                </tr>
                                <tr>
                                    <td>방룡</td>
                                    <td><?=number_format('170352')?></td>
                                    <td><?=number_format('43831')?></td>
                                    <td><?=number_format('42381')?></td>
                                    <td><?=number_format('4608')?></td>
                                    <td><?=number_format('1379')?></td>
                                    <td><?=number_format('1623')?></td>
                                    <td><?=number_format('1363')?></td>
                                    <td><?=number_format('1363')?></td>
                                    <td>60.1%</td>
                                </tr>
                                <tr>
                                    <td>오리</td>
                                    <td><?=number_format('7782')?></td>
                                    <td><?=number_format('1605')?></td>
                                    <td><?=number_format('1680')?></td>
                                    <td><?=number_format('1710')?></td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>53.1%</td>
                                </tr>
                                <tr>
                                    <td>에코장안</td>
                                    <td><?=number_format('8300')?></td>
                                    <td><?=number_format('1000')?></td>
                                    <td><?=number_format('1000')?></td>
                                    <td><?=number_format('1000')?></td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>40.0%</td>
                                </tr>
                                <tr>
                                    <td>명례</td>
                                    <td><?=number_format('655901')?></td>
                                    <td><?=number_format('156381')?></td>
                                    <td><?=number_format('166905')?></td>
                                    <td><?=number_format('164277')?></td>
                                    <td><?=number_format('80935')?></td>
                                    <td><?=number_format('22388')?></td>
                                    <td><?=number_format('28477')?></td>
                                    <td><?=number_format('33977')?></td>
                                    <td>71.6%</td>
                                </tr>
                                <tr>
                                    <td>센텀시티</td>
                                    <td><?=number_format('3875640')?></td>
                                    <td><?=number_format('1039291')?></td>
                                    <td><?=number_format('1006532')?></td>
                                    <td><?=number_format('1055536')?></td>
                                    <td><?=number_format('410478')?></td>
                                    <td><?=number_format('166022')?></td>
                                    <td><?=number_format('159773')?></td>
                                    <td><?=number_format('152904')?></td>
                                    <td>54.9%</td>
                                </tr>
                                <tr>
                                    <td>회동석대</td>
                                    <td><?=number_format('512903')?></td>
                                    <td><?=number_format('119646')?></td>
                                    <td><?=number_format('199544')?></td>
                                    <td><?=number_format('126364')?></td>
                                    <td><?=number_format('118622')?></td>
                                    <td><?=number_format('89614')?></td>
                                    <td><?=number_format('29171')?></td>
                                    <td><?=number_format('29492')?></td>
                                    <td>60.5%</td>
                                </tr>
                                <tr>
                                    <td rowspan="12">서부산</td>
                                    <td>화전</td>
                                    <td><?=number_format('1891933')?></td>
                                    <td><?=number_format('442016')?></td>
                                    <td><?=number_format('407759')?></td>
                                    <td><?=number_format('412603')?></td>
                                    <td><?=number_format('492075')?></td>
                                    <td><?=number_format('113702')?></td>
                                    <td><?=number_format('110964')?></td>
                                    <td><?=number_format('114726')?></td>
                                    <td>65.9%</td>
                                </tr>
                                <tr>
                                    <td>신호</td>
                                    <td><?=number_format('5053437')?></td>
                                    <td><?=number_format('1009428')?></td>
                                    <td><?=number_format('1039001')?></td>
                                    <td><?=number_format('978531')?></td>
                                    <td><?=number_format('2539223')?></td>
                                    <td><?=number_format('235937')?></td>
                                    <td><?=number_format('113256')?></td>
                                    <td><?=number_format('155826')?></td>
                                    <td>71.6%</td>
                                </tr>
                                <tr>
                                    <td>모라</td>
                                    <td><?=number_format('278715')?></td>
                                    <td><?=number_format('62750')?></td>
                                    <td><?=number_format('48424')?></td>
                                    <td><?=number_format('64768')?></td>
                                    <td><?=number_format('28210')?></td>
                                    <td><?=number_format('5278')?></td>
                                    <td><?=number_format('5210')?></td>
                                    <td><?=number_format('5236')?></td>
                                    <td>71.0%</td>
                                </tr>
                                <tr>
                                    <td>과학</td>
                                    <td><?=number_format('1463362')?></td>
                                    <td><?=number_format('359373')?></td>
                                    <td><?=number_format('325986')?></td>
                                    <td><?=number_format('347007')?></td>
                                    <td><?=number_format('218929')?></td>
                                    <td><?=number_format('60344')?></td>
                                    <td><?=number_format('55531')?></td>
                                    <td><?=number_format('56981')?></td>
                                    <td>62.1%</td>
                                </tr>
                                <tr>
                                    <td>강서보고</td>
                                    <td><?=number_format('62904')?></td>
                                    <td><?=number_format('16803')?></td>
                                    <td><?=number_format('16429')?></td>
                                    <td><?=number_format('15086')?></td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>70.5%</td>
                                </tr>
                                <tr>
                                    <td>지사2</td>
                                    <td><?=number_format('32386')?></td>
                                    <td><?=number_format('9320')?></td>
                                    <td><?=number_format('9166')?></td>
                                    <td><?=number_format('9027')?></td>
                                    <td><?=number_format('700')?></td>
                                    <td><?=number_format('40')?></td>
                                    <td><?=number_format('40')?></td>
                                    <td><?=number_format('40')?></td>
                                    <td>68.2%</td>
                                </tr>
                                <tr>
                                    <td>성우</td>
                                    <td><?=number_format('36300')?></td>
                                    <td><?=number_format('8570')?></td>
                                    <td><?=number_format('7730')?></td>
                                    <td><?=number_format('8990')?></td>
                                    <td><?=number_format('470')?></td>
                                    <td><?=number_format('50')?></td>
                                    <td><?=number_format('40')?></td>
                                    <td><?=number_format('40')?></td>
                                    <td>62.6%</td>
                                </tr>
                                <tr>
                                    <td>풍상</td>
                                    <td><?=number_format('123700')?></td>
                                    <td><?=number_format('3920')?></td>
                                    <td><?=number_format('4430')?></td>
                                    <td><?=number_format('3490')?></td>
                                    <td><?=number_format('8458')?></td>
                                    <td><?=number_format('1580')?></td>
                                    <td><?=number_format('1770')?></td>
                                    <td><?=number_format('1340')?></td>
                                    <td>69.6%</td>
                                </tr>
                                <tr>
                                    <td>미음</td>
                                    <td><?=number_format('1145819')?></td>
                                    <td><?=number_format('292856')?></td>
                                    <td><?=number_format('288584')?></td>
                                    <td><?=number_format('276750')?></td>
                                    <td><?=number_format('104449')?></td>
                                    <td><?=number_format('26851')?></td>
                                    <td><?=number_format('28780')?></td>
                                    <td><?=number_format('25189')?></td>
                                    <td>61.3%</td>
                                </tr>
                                <tr>
                                    <td>생곡</td>
                                    <td><?=number_format('701886')?></td>
                                    <td><?=number_format('155009')?></td>
                                    <td><?=number_format('147629')?></td>
                                    <td><?=number_format('174019')?></td>
                                    <td><?=number_format('33164')?></td>
                                    <td><?=number_format('6931')?></td>
                                    <td><?=number_format('8770')?></td>
                                    <td><?=number_format('7939')?></td>
                                    <td>76.3%</td>
                                </tr>
                                <tr>
                                    <td>국제물류</td>
                                    <td><?=number_format('2441137')?></td>
                                    <td><?=number_format('600168')?></td>
                                    <td><?=number_format('605516')?></td>
                                    <td><?=number_format('596745')?></td>
                                    <td><?=number_format('551243')?></td>
                                    <td><?=number_format('149453')?></td>
                                    <td><?=number_format('136141')?></td>
                                    <td><?=number_format('136840')?></td>
                                    <td>64.1%</td>
                                </tr>
                                <tr>
                                    <td>신평장림</td>
                                    <td><?=number_format('2930499')?></td>
                                    <td><?=number_format('721025')?></td>
                                    <td><?=number_format('691875')?></td>
                                    <td><?=number_format('726823')?></td>
                                    <td><?=number_format('487209')?></td>
                                    <td><?=number_format('116573')?></td>
                                    <td><?=number_format('116133')?></td>
                                    <td><?=number_format('118733')?></td>
                                    <td>65.1%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="sub_docu">
                        <span style="color:red">※ 기룡1,2 일반산업단지는 1개 기업이 소재하는 산업단지로, 기업경영정보 보호를 위해 미공개</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-add-receiver">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">표준산업분류코드</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="Base" id="comp_div_table">
                    <caption>표준산업분류코드</caption>
                    <colgroup>
                        <col style="width: 40%;">
                        <col style="width: 20%;">
                        <col style="width: 40%;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th scope="col">대분류</th>
                            <th scope="col">분류코드(중분류)</th>
                            <th scope="col">분류명</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style='text-align: justify' rowspan="25">C. 제조업(10~34)</td>
                            <td>10</td>
                            <td style='text-align: justify'>식료품 제조업</td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td style='text-align: justify'>음료 제조업</td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td style='text-align: justify'>담배 제조업</td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td style='text-align: justify'>섬유제품 제조업; 의복제외</td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td style='text-align: justify'>의복, 의복액세서리 및 모피제품 제조업</td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td style='text-align: justify'>가죽, 가방 및 신발 제조업</td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td style='text-align: justify'>목재 및 나무제품 제조업; 가구 제외</td>
                        </tr>
                        <tr>
                            <td>17</td>
                            <td style='text-align: justify'>펄프, 종이 및 종이제품 제조업</td>
                        </tr>
                        <tr>
                            <td>18</td>
                            <td style='text-align: justify'>인쇄 및 기록매체 복제업</td>
                        </tr>
                        <tr>
                            <td>19</td>
                            <td style='text-align: justify'>코크스, 연탄 및 석유정제품 제조업</td>
                        </tr>
                        <tr>
                            <td>20</td>
                            <td style='text-align: justify'>화학물질 및 화학제품 제조업; 의약품제외</td>
                        </tr>
                        <tr>
                            <td>21</td>
                            <td style='text-align: justify'>의료용 물질 및 의약품 제조업</td>
                        </tr>
                        <tr>
                            <td>22</td>
                            <td style='text-align: justify'>고무 및 플라스틱제품 제조업</td>
                        </tr>
                        <tr>
                            <td>23</td>
                            <td style='text-align: justify'>비금속 광물제품 제조업</td>
                        </tr>
                        <tr>
                            <td>24</td>
                            <td style='text-align: justify'>1차 금속 제조업</td>
                        </tr>
                        <tr>
                            <td>25</td>
                            <td style='text-align: justify'>금속 가공제품 제조업; 기계 및 가구 제외</td>
                        </tr>
                        <tr>
                            <td>26</td>
                            <td style='text-align: justify'>전자부품, 컴퓨터, 영상, 음향 및 통신장비 제조업</td>
                        </tr>
                        <tr>
                            <td>27</td>
                            <td style='text-align: justify'>의료, 정밀, 광학기기 및 시계 제조업</td>
                        </tr>
                        <tr>
                            <td>28</td>
                            <td style='text-align: justify'>전기장비 제조업</td>
                        </tr>
                        <tr>
                            <td>29</td>
                            <td style='text-align: justify'>기타 기계 및 장비 제조업</td>
                        </tr>
                        <tr>
                            <td>30</td>
                            <td style='text-align: justify'>자동차 및 트레일러 제조업</td>
                        </tr>
                        <tr>
                            <td>31</td>
                            <td style='text-align: justify'>기타 운송장비 제조업</td>
                        </tr>
                        <tr>
                            <td>32</td>
                            <td style='text-align: justify'>가구 제조업</td>
                        </tr>
                        <tr>
                            <td>33</td>
                            <td style='text-align: justify'>기타 제품 제조업</td>
                        </tr>
                        <tr>
                            <td>34</td>
                            <td style='text-align: justify'>산업용 기계 및 장비 수리업</td>
                        </tr>
                        <tr>
                            <td style='text-align: justify'>D. 전기, 가스, 증기 및 공기 조절 공급업(35)</td>
                            <td>35</td>
                            <td style='text-align: justify'></td>
                        </tr>
                        <tr>
                            <td style='text-align: justify'>E. 수도, 하수 및 폐기물 처리, 원료 재생업(36~39)</td>
                            <td>36~39</td>
                            <td style='text-align: justify'></td>
                        </tr>
                        <tr>
                            <td style='text-align: justify'>F. 건설업(41~42)</td>
                            <td>41~42</td>
                            <td style='text-align: justify'></td>
                        </tr>
                        <tr>
                            <td style='text-align: justify'>G. 도매 및 소매업(45~47)</td>
                            <td>45~47</td>
                            <td style='text-align: justify'></td>
                        </tr>
                        <tr>
                            <td style='text-align: justify'>H. 운수 및 창고업(49~52)</td>
                            <td>49~52</td>
                            <td style='text-align: justify'></td>
                        </tr>
                        <tr>
                            <td style='text-align: justify'>I. 숙박 및 음식점업(55~56)</td>
                            <td>55~56</td>
                            <td style='text-align: justify'></td>
                        </tr>
                        <tr>
                            <td style='text-align: justify'>J. 정보통신업(58~63)</td>
                            <td>58~63</td>
                            <td style='text-align: justify'></td>
                        </tr>
                        <tr>
                            <td style='text-align: justify'>K. 금융 및 보험업(64~66)</td>
                            <td>64~66</td>
                            <td style='text-align: justify'></td>
                        </tr>
                        <tr>
                            <td style='text-align: justify'>L. 부동산업(68)</td>
                            <td>68</td>
                            <td style='text-align: justify'></td>
                        </tr>
                        <tr>
                            <td style='text-align: justify'>M. 전문, 과학 및 기술 서비스업(70~73)</td>
                            <td>70~73</td>
                            <td style='text-align: justify'></td>
                        </tr>
                        <tr>
                            <td style='text-align: justify'>N. 사업시설 관리, 사업 지원 및 임대 서비스업(74~76)</td>
                            <td>74~76</td>
                            <td style='text-align: justify'></td>
                        </tr>
                        <tr>
                            <td style='text-align: justify'>O. 공공 행정, 국방 및 사회보장 행정(84)</td>
                            <td>84</td>
                            <td style='text-align: justify'></td>
                        </tr>
                        <tr>
                            <td style='text-align: justify'>P. 교육 서비스업(85)</td>
                            <td>85</td>
                            <td style='text-align: justify'></td>
                        </tr>
                        <tr>
                            <td style='text-align: justify'>Q. 보건업 및 사회복지 서비스업(86~87)</td>
                            <td>86~87</td>
                            <td style='text-align: justify'></td>
                        </tr>
                        <tr>
                            <td style='text-align: justify'>R. 예술, 스포츠 및 여가관련 서비스업(90~91)</td>
                            <td>90~91</td>
                            <td style='text-align: justify'></td>
                        </tr>
                        <tr>
                            <td style='text-align: justify'>S. 협회 및 단체, 수리 및 기타 개인 서비스업(94~96)</td>
                            <td>94~96</td>
                            <td style='text-align: justify'></td>
                        </tr>
                        <tr>
                            <td style='text-align: justify'>T. 가구 내 고용활동 및 달리 분류되지 않은 자가 소비 생산활동(97~98)</td>
                            <td>97~98</td>
                            <td style='text-align: justify'></td>
                        </tr>
                        <tr>
                            <td style='text-align: justify'>U. 국제 및 외국기관(99)</td>
                            <td>99</td>
                            <td style='text-align: justify'></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Footer -->

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/application/views/common/footer.php';

?>

</body>

</html>