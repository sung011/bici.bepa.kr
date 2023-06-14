<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ExcelDow extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library("Excel");
        $this->load->model('/notice/Movein_m');
    }

    function index()
    {

        $ymd = date("Ymd");
        if($_GET['excel'] == "statistics"){



            $status_list = $this->Movein_m->status_list();
            $filename = '부산광역시_자치구군별_통계';

            $this->excel->getActiveSheet()->setTitle($filename); 
            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(12); 
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(7);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(14);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(7);
            $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(14);
            $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(7);
            $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(14);
            $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
            $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
            $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(10);
            $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(10);
            $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(10);
            $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(10);
            $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(12);
            $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(12);

            $this->excel->getActiveSheet()->getStyle('A1:O2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('#222B35');
            $this->excel->getActiveSheet()->getStyle('A1:O2')->getFont()->getColor()->setRGB('FFFFFFFF');

            $this->excel->getActiveSheet()->mergeCells('A1:A2');
            $this->excel->getActiveSheet()->setCellValue('A1', '구군');
            $this->excel->getActiveSheet()->getStyle('A1:A2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('A1:A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            
            $this->excel->getActiveSheet()->mergeCells('B1:C1');
            $this->excel->getActiveSheet()->setCellValue('B1', '합계');
            $this->excel->getActiveSheet()->setCellValue('B2', '계');
            $this->excel->getActiveSheet()->setCellValue('C2', '면적(㎡)');
            $this->excel->getActiveSheet()->getStyle('B1:C1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('B1:C1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $this->excel->getActiveSheet()->mergeCells('D1:E1');
            $this->excel->getActiveSheet()->setCellValue('D1', '조성완료');
            $this->excel->getActiveSheet()->setCellValue('D2', '계');
            $this->excel->getActiveSheet()->setCellValue('E2', '면적(㎡)');
            $this->excel->getActiveSheet()->getStyle('D1:E1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('D1:E1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $this->excel->getActiveSheet()->mergeCells('F1:G1');
            $this->excel->getActiveSheet()->setCellValue('F1', '조성중');
            $this->excel->getActiveSheet()->setCellValue('F2', '계');
            $this->excel->getActiveSheet()->setCellValue('G2', '면적(㎡)');
            $this->excel->getActiveSheet()->getStyle('F1:G1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('F1:G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $this->excel->getActiveSheet()->mergeCells('H1:K1');
            $this->excel->getActiveSheet()->setCellValue('H1', '산업단지종류');
            $this->excel->getActiveSheet()->setCellValue('H2', '국가');
            $this->excel->getActiveSheet()->setCellValue('I2', '일반');
            $this->excel->getActiveSheet()->setCellValue('J2', '도시첨단');
            $this->excel->getActiveSheet()->setCellValue('K2', '농공단지');
            $this->excel->getActiveSheet()->getStyle('H1:K1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('H1:K1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $this->excel->getActiveSheet()->mergeCells('L1:M1');
            $this->excel->getActiveSheet()->setCellValue('L1', '사업유형');
            $this->excel->getActiveSheet()->setCellValue('L2', '공영개발');
            $this->excel->getActiveSheet()->setCellValue('M2', '민간개발');
            $this->excel->getActiveSheet()->getStyle('L1:M1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('L1:M1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 
            $this->excel->getActiveSheet()->mergeCells('N1:N2');
            $this->excel->getActiveSheet()->setCellValue('N1', '업체수');
            $this->excel->getActiveSheet()->getStyle('N1:N2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('N1:N2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $this->excel->getActiveSheet()->mergeCells('O1:O2');
            $this->excel->getActiveSheet()->setCellValue('O1', '총인원수');
            $this->excel->getActiveSheet()->getStyle('O1:O2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('O1:O2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $this->excel->getActiveSheet()->getStyle('A2:O2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $i = 3;
            $ins_num = 0;
            $ins_area = 0;
            $ing001 = 0;
            $ing001_area = 0;
            $ing002 = 0;
            $ing002_area = 0;
            $ins001 = 0;
            $ins002 = 0;
            $ins003 = 0;
            $ins004 = 0;
            $PRO001 = 0;
            $PRO002 = 0;
            $inc_nam = 0;
            $employee_cnt = 0;

            for ($j = 0; $j < count($status_list); $j++)
            {
                $this->excel->getActiveSheet()->getStyle("A$i")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                $this->excel->getActiveSheet()->setCellValue("A$i", $status_list[$j]['name']);
                $this->excel->getActiveSheet()->setCellValue("B$i", $status_list[$j]['ins_num']);
                $this->excel->getActiveSheet()->setCellValue("C$i", $status_list[$j]['ins_area']);
                $this->excel->getActiveSheet()->getStyle("B$i")->getNumberFormat()->setFormatCode('#,##0');
                $this->excel->getActiveSheet()->getStyle("C$i")->getNumberFormat()->setFormatCode('#,##0');

                $this->excel->getActiveSheet()->setCellValue("D$i", $status_list[$j]['ing001']);
                $this->excel->getActiveSheet()->setCellValue("E$i", $status_list[$j]['ing001_area']);
                $this->excel->getActiveSheet()->getStyle("D$i")->getNumberFormat()->setFormatCode('#,##0');
                $this->excel->getActiveSheet()->getStyle("E$i")->getNumberFormat()->setFormatCode('#,##0');

                $this->excel->getActiveSheet()->setCellValue("F$i", $status_list[$j]['ing002']);
                $this->excel->getActiveSheet()->setCellValue("G$i", $status_list[$j]['ing002_area']);
                
                $this->excel->getActiveSheet()->getStyle("F$i")->getNumberFormat()->setFormatCode('#,##0');
                $this->excel->getActiveSheet()->getStyle("G$i")->getNumberFormat()->setFormatCode('#,##0');
                
                $this->excel->getActiveSheet()->setCellValue("H$i", $status_list[$j]['ins001']);
                $this->excel->getActiveSheet()->setCellValue("I$i", $status_list[$j]['ins002']);
                $this->excel->getActiveSheet()->setCellValue("J$i", $status_list[$j]['ins003']);
                $this->excel->getActiveSheet()->setCellValue("K$i", $status_list[$j]['ins004']);
                $this->excel->getActiveSheet()->setCellValue("L$i", $status_list[$j]['PRO001']);
                $this->excel->getActiveSheet()->setCellValue("M$i", $status_list[$j]['PRO002']);

                $this->excel->getActiveSheet()->getStyle("H$i")->getNumberFormat()->setFormatCode('#,##0');
                $this->excel->getActiveSheet()->getStyle("I$i")->getNumberFormat()->setFormatCode('#,##0');
                $this->excel->getActiveSheet()->getStyle("J$i")->getNumberFormat()->setFormatCode('#,##0');
                $this->excel->getActiveSheet()->getStyle("K$i")->getNumberFormat()->setFormatCode('#,##0');
                $this->excel->getActiveSheet()->getStyle("L$i")->getNumberFormat()->setFormatCode('#,##0');
                $this->excel->getActiveSheet()->getStyle("M$i")->getNumberFormat()->setFormatCode('#,##0');

                $this->excel->getActiveSheet()->setCellValue("N$i", $status_list[$j]['inc_nam']);

                $this->excel->getActiveSheet()->getStyle("N$i")->getNumberFormat()->setFormatCode('#,##0');

                $this->excel->getActiveSheet()->setCellValue("O$i", $status_list[$j]['employee_cnt']);

                $this->excel->getActiveSheet()->getStyle("O$i")->getNumberFormat()->setFormatCode('#,##0');
                
                $ins_num += $status_list[$j]['ins_num'];
                $ins_area += $status_list[$j]['ins_area'];
                $ing001 += $status_list[$j]['ing001'];
                $ing001_area += $status_list[$j]['ing001_area'];
                $ing002 += $status_list[$j]['ing002'];
                $ing002_area += $status_list[$j]['ing002_area'];
                $ins001 += $status_list[$j]['ins001'];
                $ins002 += $status_list[$j]['ins002'];
                $ins003 += $status_list[$j]['ins003'];
                $ins004 += $status_list[$j]['ins004'];
                $PRO001 += $status_list[$j]['PRO001'];
                $PRO002 += $status_list[$j]['PRO002'];
                $inc_nam += $status_list[$j]['inc_nam'];
                $employee_cnt += $status_list[$j]['employee_cnt'];

                $i++;
            }

            $this->excel->getActiveSheet()->getStyle("A$i")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $this->excel->getActiveSheet()->setCellValue("A$i", '합계');
            $this->excel->getActiveSheet()->setCellValue("B$i", $ins_num);
            $this->excel->getActiveSheet()->setCellValue("C$i", $ins_area);
            $this->excel->getActiveSheet()->setCellValue("D$i", $ing001);
            $this->excel->getActiveSheet()->setCellValue("E$i", $ing001_area);
            $this->excel->getActiveSheet()->setCellValue("F$i", $ing002);
            $this->excel->getActiveSheet()->setCellValue("G$i", $ing002_area);
            $this->excel->getActiveSheet()->setCellValue("H$i", $ins001);
            $this->excel->getActiveSheet()->setCellValue("I$i", $ins002);
            $this->excel->getActiveSheet()->setCellValue("J$i", $ins003);
            $this->excel->getActiveSheet()->setCellValue("K$i", $ins004);
            $this->excel->getActiveSheet()->setCellValue("L$i", $PRO001);
            $this->excel->getActiveSheet()->setCellValue("M$i", $PRO002);
            $this->excel->getActiveSheet()->setCellValue("N$i", $inc_nam);
            $this->excel->getActiveSheet()->setCellValue("O$i", $employee_cnt);

            $this->excel->getActiveSheet()->getStyle("B$i")->getNumberFormat()->setFormatCode('#,##0');
            $this->excel->getActiveSheet()->getStyle("C$i")->getNumberFormat()->setFormatCode('#,##0');
            $this->excel->getActiveSheet()->getStyle("D$i")->getNumberFormat()->setFormatCode('#,##0');
            $this->excel->getActiveSheet()->getStyle("E$i")->getNumberFormat()->setFormatCode('#,##0');
            $this->excel->getActiveSheet()->getStyle("F$i")->getNumberFormat()->setFormatCode('#,##0');
            $this->excel->getActiveSheet()->getStyle("G$i")->getNumberFormat()->setFormatCode('#,##0');
            $this->excel->getActiveSheet()->getStyle("H$i")->getNumberFormat()->setFormatCode('#,##0');
            $this->excel->getActiveSheet()->getStyle("I$i")->getNumberFormat()->setFormatCode('#,##0');
            $this->excel->getActiveSheet()->getStyle("J$i")->getNumberFormat()->setFormatCode('#,##0');
            $this->excel->getActiveSheet()->getStyle("K$i")->getNumberFormat()->setFormatCode('#,##0');
            $this->excel->getActiveSheet()->getStyle("L$i")->getNumberFormat()->setFormatCode('#,##0');
            $this->excel->getActiveSheet()->getStyle("M$i")->getNumberFormat()->setFormatCode('#,##0');
            $this->excel->getActiveSheet()->getStyle("N$i")->getNumberFormat()->setFormatCode('#,##0');
            $this->excel->getActiveSheet()->getStyle("O$i")->getNumberFormat()->setFormatCode('#,##0');



        }else if ($_GET['excel'] == "company"){
            $filename = '부산광역시+업체+정보';
            ini_set('memory_limit', '1024M');
            $company_list = $this->Movein_m->company_list();
            //var_dump($company_list);
            //var_dump(count($company_list));
            $this->excel->getActiveSheet()->setTitle("업체 정보"); //시트
            $this->excel->getActiveSheet()->getColumnDimension("A")->setWidth(20); // 간격
            $this->excel->getActiveSheet()->getColumnDimension("B")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("C")->setWidth(35);
            $this->excel->getActiveSheet()->getColumnDimension("D")->setWidth(40);
            $this->excel->getActiveSheet()->getColumnDimension("E")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("F")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("G")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("H")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("I")->setWidth(40);
            $this->excel->getActiveSheet()->getColumnDimension("J")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("K")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("L")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("M")->setWidth(60);
            $this->excel->getActiveSheet()->getColumnDimension("N")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("O")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("P")->setWidth(60);
            $this->excel->getActiveSheet()->getColumnDimension("Q")->setWidth(40);
            $this->excel->getActiveSheet()->getColumnDimension("R")->setWidth(40);
            $this->excel->getActiveSheet()->getColumnDimension("S")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("T")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("U")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("V")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("W")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("X")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("Y")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("Z")->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension("AA")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("AB")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("AC")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("AD")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("AE")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("AF")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("AG")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("AH")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("AI")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("AJ")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("AK")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("AL")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("AM")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("AN")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("AO")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("AP")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("AQ")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("AR")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("AS")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("AT")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("AU")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("AV")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("AW")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("AX")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("AY")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("AZ")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("BA")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("BB")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("BC")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("BD")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("BE")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("BF")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("BG")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("BH")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("BI")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("BJ")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("BK")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("BL")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("BM")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("BN")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("BO")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("BP")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("BQ")->setWidth(25);
            $this->excel->getActiveSheet()->setCellValue('A1', '고유번호');
            $this->excel->getActiveSheet()->setCellValue('B1', '지자체');
            $this->excel->getActiveSheet()->setCellValue('C1', '산업단지명');
            $this->excel->getActiveSheet()->setCellValue('D1', '토지코드');
            $this->excel->getActiveSheet()->setCellValue('E1', '가동여부');
            $this->excel->getActiveSheet()->setCellValue('F1', '현재상태');
            $this->excel->getActiveSheet()->setCellValue('G1', '업체명');
            $this->excel->getActiveSheet()->setCellValue('H1', '대표자명');
            $this->excel->getActiveSheet()->setCellValue('I1', '법정동');
            $this->excel->getActiveSheet()->setCellValue('J1', '지번');
            $this->excel->getActiveSheet()->setCellValue('K1', '대표전화');
            $this->excel->getActiveSheet()->setCellValue('L1', '팩스번호');
            $this->excel->getActiveSheet()->setCellValue('M1', '도로명주소');
            $this->excel->getActiveSheet()->setCellValue('N1', '사업자등록번호');
            $this->excel->getActiveSheet()->setCellValue('O1', '주민/법인번호');
            $this->excel->getActiveSheet()->setCellValue('P1', '대표업종');
            $this->excel->getActiveSheet()->setCellValue('Q1', '업종코드');
            $this->excel->getActiveSheet()->setCellValue('R1', '생산품목');
            $this->excel->getActiveSheet()->setCellValue('S1', '생산액(백만원)');
            $this->excel->getActiveSheet()->setCellValue('T1', '수출액(천달러)');
            $this->excel->getActiveSheet()->setCellValue('U1', '계약신청일');
            $this->excel->getActiveSheet()->setCellValue('V1', '입주계약일/변경');
            $this->excel->getActiveSheet()->setCellValue('W1', '용지면적(계약)');
            $this->excel->getActiveSheet()->setCellValue('X1', '건축명적(계약)');
            $this->excel->getActiveSheet()->setCellValue('Y1', '등록신청일');
            $this->excel->getActiveSheet()->setCellValue('z1', '공장등록일/변경');
            $this->excel->getActiveSheet()->setCellValue('AA1', '용지면적(완료)');
            $this->excel->getActiveSheet()->setCellValue('AB1', '건축면적(완료)');
            $this->excel->getActiveSheet()->setCellValue('AC1', '부대시설종료');
            $this->excel->getActiveSheet()->setCellValue('AD1', '소유구분');
            $this->excel->getActiveSheet()->setCellValue('AE1', '임대구분');
            $this->excel->getActiveSheet()->setCellValue('AF1', '보증금');
            $this->excel->getActiveSheet()->setCellValue('AG1', '임대료');
            $this->excel->getActiveSheet()->setCellValue('AH1', '임대기간');
            $this->excel->getActiveSheet()->setCellValue('AI1', '입대업체');
            $this->excel->getActiveSheet()->setCellValue('AJ1', '신설구분');
            $this->excel->getActiveSheet()->setCellValue('AK1', '산단업주전소재지');
            $this->excel->getActiveSheet()->setCellValue('AL1', '동일이전');
            $this->excel->getActiveSheet()->setCellValue('AM1', '확장이전');
            $this->excel->getActiveSheet()->setCellValue('AN1', '종설사항');
            $this->excel->getActiveSheet()->setCellValue('AO1', '건의사항');
            $this->excel->getActiveSheet()->setCellValue('AP1', '총인원');
            $this->excel->getActiveSheet()->setCellValue('AQ1', '산단입주후증가인원');
            $this->excel->getActiveSheet()->setCellValue('AR1', '직무별_사무실');
            $this->excel->getActiveSheet()->setCellValue('AS1', '직무별_생산직');
            $this->excel->getActiveSheet()->setCellValue('AT1', '국적성별_남종업원');
            $this->excel->getActiveSheet()->setCellValue('AU1', '국적성별_여종업원');
            $this->excel->getActiveSheet()->setCellValue('AV1', '국적성별_외국인(남)');
            $this->excel->getActiveSheet()->setCellValue('AW1', '국적성별_외국인(여)');
            $this->excel->getActiveSheet()->setCellValue('AX1', '연령별 10~20대');
            $this->excel->getActiveSheet()->setCellValue('AY1', '연령별 30~50대');
            $this->excel->getActiveSheet()->setCellValue('AZ1', '연령별 60대 이상');
            $this->excel->getActiveSheet()->setCellValue('BA1', '거주지별_부산');
            $this->excel->getActiveSheet()->setCellValue('BB1', '거주지별_김해');
            $this->excel->getActiveSheet()->setCellValue('BC1', '거주지별_울산');
            $this->excel->getActiveSheet()->setCellValue('BD1', '거주지별_양산');
            $this->excel->getActiveSheet()->setCellValue('BE1', '거주지별_창원');
            $this->excel->getActiveSheet()->setCellValue('BF1', '통근버스보유대수');
            $this->excel->getActiveSheet()->setCellValue('BG1', '출퇴근_통근버스');
            $this->excel->getActiveSheet()->setCellValue('BH1', '출퇴근_기관운행버스');
            $this->excel->getActiveSheet()->setCellValue('BI1', '출퇴근_자가용');
            $this->excel->getActiveSheet()->setCellValue('BJ1', '출퇴근_대중교통');
            $this->excel->getActiveSheet()->setCellValue('Bk1', '출퇴근_도보');
            $this->excel->getActiveSheet()->setCellValue('BL1', '담당자명');
            $this->excel->getActiveSheet()->setCellValue('BM1', '휴대폰번호');
            $this->excel->getActiveSheet()->setCellValue('BN1', '사진_외부1');
            $this->excel->getActiveSheet()->setCellValue('BO1', '사진_외부2');
            $this->excel->getActiveSheet()->setCellValue('BP1', '사진_내부1');
            $this->excel->getActiveSheet()->setCellValue('BQ1', '사진_내부2');
            $this->excel->getActiveSheet()->getStyle('A1:BQ1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB("FF3366FF");
            $this->excel->getActiveSheet()->getStyle('A1:BQ1')->getFont()->getColor()->setARGB("FFFFFFFF");

            $k = 2;
            for ($j = 0; $j < count($company_list);$j++){
                $this->excel->getActiveSheet()->setCellValue("A$k", $company_list[$j]['CPX_NUM']);
                $this->excel->getActiveSheet()->setCellValue("B$k", $company_list[$j]['SIGNGU_SE']);
                $this->excel->getActiveSheet()->setCellValue("C$k", $company_list[$j]['INS_NAME']);
                //$this->excel->getActiveSheet()->setCellValue("D$k", $company_list[$j]['PNU']);
                $this->excel->getActiveSheet()->setCellValueExplicit("D$k",$company_list[$j]['PNU'],PHPExcel_Cell_DataType::TYPE_STRING2);
                //$this->excel->getActiveSheet()->getStyle("D$k")->getNumberFormat()->setFormatCode("#,##0");
                $this->excel->getActiveSheet()->setCellValue("E$k", $company_list[$j]['OPR_CHK']);
                $this->excel->getActiveSheet()->setCellValue("F$k", $company_list[$j]['CUR_CON']);
                $this->excel->getActiveSheet()->setCellValue("G$k", $company_list[$j]['INC_NAM']);
                $this->excel->getActiveSheet()->setCellValue("H$k", $company_list[$j]['CEO_NAM']);
                $this->excel->getActiveSheet()->setCellValue("I$k", $company_list[$j]['BJD_NAM']);
                $this->excel->getActiveSheet()->setCellValue("J$k", $company_list[$j]['JIBUN']);
                $this->excel->getActiveSheet()->setCellValue("K$k", $company_list[$j]['TEL_NUM']);
                $this->excel->getActiveSheet()->setCellValue("L$k", $company_list[$j]['FAX_NUM']);
                $this->excel->getActiveSheet()->setCellValue("M$k", $company_list[$j]['NEW_ADD']);
                $this->excel->getActiveSheet()->setCellValue("N$k", $company_list[$j]['BSN_LIC']);
                $this->excel->getActiveSheet()->setCellValue("O$k", $company_list[$j]['INC_LIC']);
                $this->excel->getActiveSheet()->setCellValue("P$k", $company_list[$j]['REP_SPC']);
                $this->excel->getActiveSheet()->setCellValue("Q$k", $company_list[$j]['REP_COD']);
                $this->excel->getActiveSheet()->setCellValue("R$k", $company_list[$j]['GOD_ITM']);
                $this->excel->getActiveSheet()->setCellValue("S$k", $company_list[$j]['GOD_MNY']);
                $this->excel->getActiveSheet()->setCellValue("T$k", $company_list[$j]['EXP_MNY']);
                $this->excel->getActiveSheet()->setCellValue("U$k", $company_list[$j]['CON_DAT']);
                $this->excel->getActiveSheet()->setCellValue("V$k", $company_list[$j]['COC_DAT']);
                $this->excel->getActiveSheet()->setCellValue("W$k", $company_list[$j]['STC_ARA']);
                $this->excel->getActiveSheet()->setCellValue("X$k", $company_list[$j]['BDC_ARA']);
                $this->excel->getActiveSheet()->setCellValue("Y$k", $company_list[$j]['REG_DAT']);
                $this->excel->getActiveSheet()->setCellValue("Z$k", $company_list[$j]['REC_DAT']);
                $this->excel->getActiveSheet()->setCellValue("AA$k", $company_list[$j]['SIT_ARA']);
                $this->excel->getActiveSheet()->setCellValue("AB$k", $company_list[$j]['BLD_ARA']);
                $this->excel->getActiveSheet()->setCellValue("AC$k", $company_list[$j]['ETC_FAC']);
                $this->excel->getActiveSheet()->setCellValue("AD$k", $company_list[$j]['OWN_CHK']);
                $this->excel->getActiveSheet()->setCellValue("AE$k", $company_list[$j]['LES_CHK']);
                $this->excel->getActiveSheet()->setCellValue("AF$k", $company_list[$j]['DEP_MNY']);
                $this->excel->getActiveSheet()->setCellValue("AG$k", $company_list[$j]['LES_MNY']);
                $this->excel->getActiveSheet()->setCellValue("AH$k", $company_list[$j]['LES_POD']);
                $this->excel->getActiveSheet()->setCellValue("AI$k", $company_list[$j]['LES_INC']);
                $this->excel->getActiveSheet()->setCellValue("AJ$k", $company_list[$j]['NEW_CHK']);
                $this->excel->getActiveSheet()->setCellValue("AK$k", $company_list[$j]['PRE_LOC']);
                $this->excel->getActiveSheet()->setCellValue("AL$k", $company_list[$j]['SAM_MOV']);
                $this->excel->getActiveSheet()->setCellValue("AM$k", $company_list[$j]['EXP_MOV']);
                $this->excel->getActiveSheet()->setCellValue("AN$k", $company_list[$j]['ADD_MOV']);
                $this->excel->getActiveSheet()->setCellValue("AO$k", $company_list[$j]['PRO_POS']);
                $this->excel->getActiveSheet()->setCellValue("AP$k", $company_list[$j]['TOT_MAN']);
                $this->excel->getActiveSheet()->setCellValue("AQ$k", $company_list[$j]['ADD_MAN']);
                $this->excel->getActiveSheet()->setCellValue("AR$k", $company_list[$j]['WHT_MAN']);
                $this->excel->getActiveSheet()->setCellValue("AS$k", $company_list[$j]['BLU_MAN']);
                $this->excel->getActiveSheet()->setCellValue("AT$k", $company_list[$j]['MAL_WOK']);
                $this->excel->getActiveSheet()->setCellValue("AU$k", $company_list[$j]['FML_WOK']);
                $this->excel->getActiveSheet()->setCellValue("AV$k", $company_list[$j]['MAL_FOR']);
                $this->excel->getActiveSheet()->setCellValue("AW$k", $company_list[$j]['FML_FOR']);
                $this->excel->getActiveSheet()->setCellValue("AX$k", $company_list[$j]['TEN_AGE']);
                $this->excel->getActiveSheet()->setCellValue("AY$k", $company_list[$j]['FOR_AGE']);
                $this->excel->getActiveSheet()->setCellValue("AZ$k", $company_list[$j]['SIX_AGE']);
                $this->excel->getActiveSheet()->setCellValue("BA$k", $company_list[$j]['BSN_MAN']);
                $this->excel->getActiveSheet()->setCellValue("BB$k", $company_list[$j]['KIM_MAN']);
                $this->excel->getActiveSheet()->setCellValue("BC$k", $company_list[$j]['ULS_MAN']);
                $this->excel->getActiveSheet()->setCellValue("BD$k", $company_list[$j]['YAS_MAN']);
                $this->excel->getActiveSheet()->setCellValue("BE$k", $company_list[$j]['CHA_MAN']);
                $this->excel->getActiveSheet()->setCellValue("BF$k", $company_list[$j]['BUS_NUM']);
                $this->excel->getActiveSheet()->setCellValue("BG$k", $company_list[$j]['INC_BUS']);
                $this->excel->getActiveSheet()->setCellValue("BH$k", $company_list[$j]['CMP_BUS']);
                $this->excel->getActiveSheet()->setCellValue("BI$k", $company_list[$j]['SEF_CAR']);
                $this->excel->getActiveSheet()->setCellValue("BJ$k", $company_list[$j]['PUB_TRS']);
                $this->excel->getActiveSheet()->setCellValue("BK$k", $company_list[$j]['COM_WAK']);
                $this->excel->getActiveSheet()->setCellValue("BL$k", $company_list[$j]['CAL_MAN']);
                $this->excel->getActiveSheet()->setCellValue("BM$k", $company_list[$j]['CAL_CEL']);
                $this->excel->getActiveSheet()->setCellValue("BN$k", $company_list[$j]['EXP1_IMG']);
                $this->excel->getActiveSheet()->setCellValue("BO$k", $company_list[$j]['EXP2_IMG']);
                $this->excel->getActiveSheet()->setCellValue("BP$k", $company_list[$j]['IN1_IMG']);
                $this->excel->getActiveSheet()->setCellValue("BQ$k", $company_list[$j]['IN2_IMG']);
                $k++;
            }
        }
        else if ($_GET['excel'] === 'stati')
        {
            if (($_GET['u_se']) === 'all') 
            {
                $industry_list = $this->Movein_m->industry_all_list();
                $filename = '부산광역시_산업단지별_통계'; 

                $this->excel->getActiveSheet()->setTitle($filename); 
                $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(12); 
                $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30); 
                $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
                $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
                $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(14);
                $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(14);
                $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(14);
                $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
                $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(12);
                $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(12);

                $this->excel->getActiveSheet()->getStyle('A1:J1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('#222B35');
                $this->excel->getActiveSheet()->getStyle('A1:J1')->getFont()->getColor()->setRGB('FFFFFF');

                $this->excel->getActiveSheet()->setCellValue('A1', '구군명');
                $this->excel->getActiveSheet()->setCellValue('B1', '단지명');
                $this->excel->getActiveSheet()->setCellValue('C1', '산단종류');
                $this->excel->getActiveSheet()->setCellValue('D1', '현황구분');
                $this->excel->getActiveSheet()->setCellValue('E1', '면적(㎡)');
                $this->excel->getActiveSheet()->setCellValue('F1', '단지지정일자');
                $this->excel->getActiveSheet()->setCellValue('G1', '사업유형');
                $this->excel->getActiveSheet()->setCellValue('H1', '사업시행자');
                $this->excel->getActiveSheet()->setCellValue('I1', '업체수');
                $this->excel->getActiveSheet()->setCellValue('J1', '종업원수');

                $this->excel->getActiveSheet()->getStyle('A1:J1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                $ka = 2;
                $all_m = 0;
                $all_c = 0;
                $all_u = 0;

                for ($i = 0; $i < count($industry_list); $i++)
                {
                    $this->excel->getActiveSheet()->getStyle("A$ka")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $this->excel->getActiveSheet()->getStyle("C$ka")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $this->excel->getActiveSheet()->getStyle("D$ka")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $this->excel->getActiveSheet()->getStyle("F$ka")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $this->excel->getActiveSheet()->getStyle("G$ka")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                    $this->excel->getActiveSheet()->setCellValue("A$ka", $industry_list[$i]['g_name']);
                    $this->excel->getActiveSheet()->setCellValue("B$ka", $industry_list[$i]['name']);
                    $this->excel->getActiveSheet()->setCellValue("C$ka", $industry_list[$i]['ins_type']);
                    $this->excel->getActiveSheet()->setCellValue("D$ka", $industry_list[$i]['ins_ing']);
                    $this->excel->getActiveSheet()->setCellValue("E$ka", $industry_list[$i]['ins_area']);
                    $this->excel->getActiveSheet()->setCellValue("F$ka", $industry_list[$i]['ji_date']);
                    $this->excel->getActiveSheet()->setCellValue("G$ka", $industry_list[$i]['pro_type']);
                    $this->excel->getActiveSheet()->setCellValue("H$ka", $industry_list[$i]['enforcer_name']);
                    $this->excel->getActiveSheet()->setCellValue("I$ka", $industry_list[$i]['inc_nam']);
                    $this->excel->getActiveSheet()->setCellValue("J$ka", $industry_list[$i]['tot_man']);

                    $this->excel->getActiveSheet()->getStyle("E$ka")->getNumberFormat()->setFormatCode('#,##0');
                    $this->excel->getActiveSheet()->getStyle("I$ka")->getNumberFormat()->setFormatCode('#,##0');
                    $this->excel->getActiveSheet()->getStyle("J$ka")->getNumberFormat()->setFormatCode('#,##0');

                    $all_m += $industry_list[$i]['ins_area'];
                    $all_c += $industry_list[$i]['inc_nam'];
                    $all_u += $industry_list[$i]['tot_man'];

                    $ka++;
                }

                $this->excel->getActiveSheet()->setCellValue("A$ka", '합계');
                $this->excel->getActiveSheet()->setCellValue("E$ka", $all_m);
                $this->excel->getActiveSheet()->setCellValue("I$ka", $all_c);
                $this->excel->getActiveSheet()->setCellValue("J$ka", $all_u);

                $this->excel->getActiveSheet()->getStyle("A$ka")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                $this->excel->getActiveSheet()->getStyle("E$ka")->getNumberFormat()->setFormatCode('#,##0');
                $this->excel->getActiveSheet()->getStyle("I$ka")->getNumberFormat()->setFormatCode('#,##0');
                $this->excel->getActiveSheet()->getStyle("J$ka")->getNumberFormat()->setFormatCode('#,##0');
            }
            else 
            {
                $in_name = $this->Movein_m->industry_name($_GET['u_se']);
                $industry_list = $this->Movein_m->industry_list($_GET['u_se']);
                $filename = $in_name[0]['chan_code'].'_산업단지별_통계';    
            
                $this->excel->getActiveSheet()->setTitle($filename); 
                $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(30); 
                $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
                $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
                $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(14);
                $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(14);
                $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(14);
                $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
                $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(12);
                $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(12);

                $this->excel->getActiveSheet()->getStyle('A1:I1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('#222B35');
                $this->excel->getActiveSheet()->getStyle('A1:I1')->getFont()->getColor()->setRGB('FFFFFF');

                $this->excel->getActiveSheet()->setCellValue('A1', '단지명');
                $this->excel->getActiveSheet()->setCellValue('B1', '산단종류');
                $this->excel->getActiveSheet()->setCellValue('C1', '현황구분');
                $this->excel->getActiveSheet()->setCellValue('D1', '면적(㎡)');
                $this->excel->getActiveSheet()->setCellValue('E1', '단지지정일자');
                $this->excel->getActiveSheet()->setCellValue('F1', '사업유형');
                $this->excel->getActiveSheet()->setCellValue('G1', '사업시행자');
                $this->excel->getActiveSheet()->setCellValue('H1', '업체수');
                $this->excel->getActiveSheet()->setCellValue('I1', '종업원수');

                $this->excel->getActiveSheet()->getStyle('A1:I1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                $ka = 2;
                $all_m = 0;
                $all_c = 0;
                $all_u = 0;

                for ($i = 0; $i < count($industry_list); $i++)
                {
                    $this->excel->getActiveSheet()->getStyle("B$ka")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $this->excel->getActiveSheet()->getStyle("C$ka")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $this->excel->getActiveSheet()->getStyle("E$ka")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $this->excel->getActiveSheet()->getStyle("F$ka")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                    $this->excel->getActiveSheet()->setCellValue("A$ka", $industry_list[$i]['name']);
                    $this->excel->getActiveSheet()->setCellValue("B$ka", $industry_list[$i]['ins_type']);
                    $this->excel->getActiveSheet()->setCellValue("C$ka", $industry_list[$i]['ins_ing']);
                    $this->excel->getActiveSheet()->setCellValue("D$ka", $industry_list[$i]['ins_area']);
                    $this->excel->getActiveSheet()->setCellValue("E$ka", $industry_list[$i]['ji_date']);
                    $this->excel->getActiveSheet()->setCellValue("F$ka", $industry_list[$i]['pro_type']);
                    $this->excel->getActiveSheet()->setCellValue("G$ka", $industry_list[$i]['enforcer_name']);
                    $this->excel->getActiveSheet()->setCellValue("H$ka", $industry_list[$i]['inc_nam']);
                    $this->excel->getActiveSheet()->setCellValue("I$ka", $industry_list[$i]['tot_man']);

                    $this->excel->getActiveSheet()->getStyle("D$ka")->getNumberFormat()->setFormatCode('#,##0');
                    $this->excel->getActiveSheet()->getStyle("H$ka")->getNumberFormat()->setFormatCode('#,##0');
                    $this->excel->getActiveSheet()->getStyle("I$ka")->getNumberFormat()->setFormatCode('#,##0');

                    $all_m += $industry_list[$i]['ins_area'];
                    $all_c += $industry_list[$i]['inc_nam'];
                    $all_u += $industry_list[$i]['tot_man'];

                    $ka++;
                }

                $this->excel->getActiveSheet()->setCellValue("A$ka", '합계');
                $this->excel->getActiveSheet()->setCellValue("D$ka", $all_m);
                $this->excel->getActiveSheet()->setCellValue("H$ka", $all_c);
                $this->excel->getActiveSheet()->setCellValue("I$ka", $all_u);

                $this->excel->getActiveSheet()->getStyle("D$ka")->getNumberFormat()->setFormatCode('#,##0');
                $this->excel->getActiveSheet()->getStyle("H$ka")->getNumberFormat()->setFormatCode('#,##0');
                $this->excel->getActiveSheet()->getStyle("I$ka")->getNumberFormat()->setFormatCode('#,##0');
            }
        } else if($_GET['excel'] == "compa"){
            $in_name = $this->Movein_m->industry_name($_GET['u_se']);
            $company_all = $this->Movein_m->company_all($_GET['u_se']);
            $filename = $in_name[0]['chan_code']."+업체+정보";

            $this->excel->getActiveSheet()->setTitle($filename); //시트
            $this->excel->getActiveSheet()->getColumnDimension("A")->setWidth(20); // 간격
            $this->excel->getActiveSheet()->getColumnDimension("B")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("C")->setWidth(35);
            $this->excel->getActiveSheet()->getColumnDimension("D")->setWidth(40);
            $this->excel->getActiveSheet()->getColumnDimension("E")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("F")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("G")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("H")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("I")->setWidth(40);
            $this->excel->getActiveSheet()->getColumnDimension("J")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("K")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("L")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("M")->setWidth(60);
            $this->excel->getActiveSheet()->getColumnDimension("N")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("O")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("P")->setWidth(60);
            $this->excel->getActiveSheet()->getColumnDimension("Q")->setWidth(40);
            $this->excel->getActiveSheet()->getColumnDimension("R")->setWidth(40);
            $this->excel->getActiveSheet()->getColumnDimension("S")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("T")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("U")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("V")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("W")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("X")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("Y")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("Z")->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension("AA")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("AB")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("AC")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("AD")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("AE")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("AF")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("AG")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("AH")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("AI")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("AJ")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("AK")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("AL")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("AM")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("AN")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("AO")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("AP")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("AQ")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("AR")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("AS")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("AT")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("AU")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("AV")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("AW")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("AX")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("AY")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("AZ")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("BA")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("BB")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("BC")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("BD")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("BE")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("BF")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("BG")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("BH")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("BI")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("BJ")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("BK")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("BL")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("BM")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("BN")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("BO")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("BP")->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension("BQ")->setWidth(25);
            $this->excel->getActiveSheet()->setCellValue('A1', '고유번호');
            $this->excel->getActiveSheet()->setCellValue('B1', '지자체');
            $this->excel->getActiveSheet()->setCellValue('C1', '산업단지명');
            $this->excel->getActiveSheet()->setCellValue('D1', '토지코드');
            $this->excel->getActiveSheet()->setCellValue('E1', '가동여부');
            $this->excel->getActiveSheet()->setCellValue('F1', '현재상태');
            $this->excel->getActiveSheet()->setCellValue('G1', '업체명');
            $this->excel->getActiveSheet()->setCellValue('H1', '대표자명');
            $this->excel->getActiveSheet()->setCellValue('I1', '법정동');
            $this->excel->getActiveSheet()->setCellValue('J1', '지번');
            $this->excel->getActiveSheet()->setCellValue('K1', '대표전화');
            $this->excel->getActiveSheet()->setCellValue('L1', '팩스번호');
            $this->excel->getActiveSheet()->setCellValue('M1', '도로명주소');
            $this->excel->getActiveSheet()->setCellValue('N1', '사업자등록번호');
            $this->excel->getActiveSheet()->setCellValue('O1', '주민/법인번호');
            $this->excel->getActiveSheet()->setCellValue('P1', '대표업종');
            $this->excel->getActiveSheet()->setCellValue('Q1', '업종코드');
            $this->excel->getActiveSheet()->setCellValue('R1', '생산품목');
            $this->excel->getActiveSheet()->setCellValue('S1', '생산액(백만원)');
            $this->excel->getActiveSheet()->setCellValue('T1', '수출액(천달러)');
            $this->excel->getActiveSheet()->setCellValue('U1', '계약신청일');
            $this->excel->getActiveSheet()->setCellValue('V1', '입주계약일/변경');
            $this->excel->getActiveSheet()->setCellValue('W1', '용지면적(계약)');
            $this->excel->getActiveSheet()->setCellValue('X1', '건축명적(계약)');
            $this->excel->getActiveSheet()->setCellValue('Y1', '등록신청일');
            $this->excel->getActiveSheet()->setCellValue('z1', '공장등록일/변경');
            $this->excel->getActiveSheet()->setCellValue('AA1', '용지면적(완료)');
            $this->excel->getActiveSheet()->setCellValue('AB1', '건축면적(완료)');
            $this->excel->getActiveSheet()->setCellValue('AC1', '부대시설종료');
            $this->excel->getActiveSheet()->setCellValue('AD1', '소유구분');
            $this->excel->getActiveSheet()->setCellValue('AE1', '임대구분');
            $this->excel->getActiveSheet()->setCellValue('AF1', '보증금');
            $this->excel->getActiveSheet()->setCellValue('AG1', '임대료');
            $this->excel->getActiveSheet()->setCellValue('AH1', '임대기간');
            $this->excel->getActiveSheet()->setCellValue('AI1', '입대업체');
            $this->excel->getActiveSheet()->setCellValue('AJ1', '신설구분');
            $this->excel->getActiveSheet()->setCellValue('AK1', '산단업주전소재지');
            $this->excel->getActiveSheet()->setCellValue('AL1', '동일이전');
            $this->excel->getActiveSheet()->setCellValue('AM1', '확장이전');
            $this->excel->getActiveSheet()->setCellValue('AN1', '종설사항');
            $this->excel->getActiveSheet()->setCellValue('AO1', '건의사항');
            $this->excel->getActiveSheet()->setCellValue('AP1', '총인원');
            $this->excel->getActiveSheet()->setCellValue('AQ1', '산단입주후증가인원');
            $this->excel->getActiveSheet()->setCellValue('AR1', '직무별_사무실');
            $this->excel->getActiveSheet()->setCellValue('AS1', '직무별_생산직');
            $this->excel->getActiveSheet()->setCellValue('AT1', '국적성별_남종업원');
            $this->excel->getActiveSheet()->setCellValue('AU1', '국적성별_여종업원');
            $this->excel->getActiveSheet()->setCellValue('AV1', '국적성별_외국인(남)');
            $this->excel->getActiveSheet()->setCellValue('AW1', '국적성별_외국인(여)');
            $this->excel->getActiveSheet()->setCellValue('AX1', '연령별 10~20대');
            $this->excel->getActiveSheet()->setCellValue('AY1', '연령별 30~50대');
            $this->excel->getActiveSheet()->setCellValue('AZ1', '연령별 60대 이상');
            $this->excel->getActiveSheet()->setCellValue('BA1', '거주지별_부산');
            $this->excel->getActiveSheet()->setCellValue('BB1', '거주지별_김해');
            $this->excel->getActiveSheet()->setCellValue('BC1', '거주지별_울산');
            $this->excel->getActiveSheet()->setCellValue('BD1', '거주지별_양산');
            $this->excel->getActiveSheet()->setCellValue('BE1', '거주지별_창원');
            $this->excel->getActiveSheet()->setCellValue('BF1', '통근버스보유대수');
            $this->excel->getActiveSheet()->setCellValue('BG1', '출퇴근_통근버스');
            $this->excel->getActiveSheet()->setCellValue('BH1', '출퇴근_기관운행버스');
            $this->excel->getActiveSheet()->setCellValue('BI1', '출퇴근_자가용');
            $this->excel->getActiveSheet()->setCellValue('BJ1', '출퇴근_대중교통');
            $this->excel->getActiveSheet()->setCellValue('Bk1', '출퇴근_도보');
            $this->excel->getActiveSheet()->setCellValue('BL1', '담당자명');
            $this->excel->getActiveSheet()->setCellValue('BM1', '휴대폰번호');
            $this->excel->getActiveSheet()->setCellValue('BN1', '사진_외부1');
            $this->excel->getActiveSheet()->setCellValue('BO1', '사진_외부2');
            $this->excel->getActiveSheet()->setCellValue('BP1', '사진_내부1');
            $this->excel->getActiveSheet()->setCellValue('BQ1', '사진_내부2');
            $this->excel->getActiveSheet()->getStyle('A1:BQ1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB("FF3366FF");
            $this->excel->getActiveSheet()->getStyle('A1:BQ1')->getFont()->getColor()->setARGB("FFFFFFFF");

            $kb = 2;
            for ($j = 0; $j < count($company_all);$j++){
                $this->excel->getActiveSheet()->setCellValue("A$kb", $company_all[$j]['CPX_NUM']);
                $this->excel->getActiveSheet()->setCellValue("B$kb", $company_all[$j]['SIGNGU_SE']);
                $this->excel->getActiveSheet()->setCellValue("C$kb", $company_all[$j]['INS_NAME']);
                //$this->excel->getActiveSheet()->setCellValue("D$kb", $company_all[$j]['PNU']);
                $this->excel->getActiveSheet()->setCellValueExplicit("D$kb",$company_all[$j]['PNU'],PHPExcel_Cell_DataType::TYPE_STRING2);
                //$this->excel->getActiveSheet()->getStyle("D$kb")->getNumberFormat()->setFormatCode("#,##0");
                $this->excel->getActiveSheet()->setCellValue("E$kb", $company_all[$j]['OPR_CHK']);
                $this->excel->getActiveSheet()->setCellValue("F$kb", $company_all[$j]['CUR_CON']);
                $this->excel->getActiveSheet()->setCellValue("G$kb", $company_all[$j]['INC_NAM']);
                $this->excel->getActiveSheet()->setCellValue("H$kb", $company_all[$j]['CEO_NAM']);
                $this->excel->getActiveSheet()->setCellValue("I$kb", $company_all[$j]['BJD_NAM']);
                $this->excel->getActiveSheet()->setCellValue("J$kb", $company_all[$j]['JIBUN']);
                $this->excel->getActiveSheet()->setCellValue("K$kb", $company_all[$j]['TEL_NUM']);
                $this->excel->getActiveSheet()->setCellValue("L$kb", $company_all[$j]['FAX_NUM']);
                $this->excel->getActiveSheet()->setCellValue("M$kb", $company_all[$j]['NEW_ADD']);
                $this->excel->getActiveSheet()->setCellValue("N$kb", $company_all[$j]['BSN_LIC']);
                $this->excel->getActiveSheet()->setCellValue("O$kb", $company_all[$j]['INC_LIC']);
                $this->excel->getActiveSheet()->setCellValue("P$kb", $company_all[$j]['REP_SPC']);
                $this->excel->getActiveSheet()->setCellValue("Q$kb", $company_all[$j]['REP_COD']);
                $this->excel->getActiveSheet()->setCellValue("R$kb", $company_all[$j]['GOD_ITM']);
                $this->excel->getActiveSheet()->setCellValue("S$kb", $company_all[$j]['GOD_MNY']);
                $this->excel->getActiveSheet()->setCellValue("T$kb", $company_all[$j]['EXP_MNY']);
                $this->excel->getActiveSheet()->setCellValue("U$kb", $company_all[$j]['CON_DAT']);
                $this->excel->getActiveSheet()->setCellValue("V$kb", $company_all[$j]['COC_DAT']);
                $this->excel->getActiveSheet()->setCellValue("W$kb", $company_all[$j]['STC_ARA']);
                $this->excel->getActiveSheet()->setCellValue("X$kb", $company_all[$j]['BDC_ARA']);
                $this->excel->getActiveSheet()->setCellValue("Y$kb", $company_all[$j]['REG_DAT']);
                $this->excel->getActiveSheet()->setCellValue("Z$kb", $company_all[$j]['REC_DAT']);
                $this->excel->getActiveSheet()->setCellValue("AA$kb", $company_all[$j]['SIT_ARA']);
                $this->excel->getActiveSheet()->setCellValue("AB$kb", $company_all[$j]['BLD_ARA']);
                $this->excel->getActiveSheet()->setCellValue("AC$kb", $company_all[$j]['ETC_FAC']);
                $this->excel->getActiveSheet()->setCellValue("AD$kb", $company_all[$j]['OWN_CHK']);
                $this->excel->getActiveSheet()->setCellValue("AE$kb", $company_all[$j]['LES_CHK']);
                $this->excel->getActiveSheet()->setCellValue("AF$kb", $company_all[$j]['DEP_MNY']);
                $this->excel->getActiveSheet()->setCellValue("AG$kb", $company_all[$j]['LES_MNY']);
                $this->excel->getActiveSheet()->setCellValue("AH$kb", $company_all[$j]['LES_POD']);
                $this->excel->getActiveSheet()->setCellValue("AI$kb", $company_all[$j]['LES_INC']);
                $this->excel->getActiveSheet()->setCellValue("AJ$kb", $company_all[$j]['NEW_CHK']);
                $this->excel->getActiveSheet()->setCellValue("AK$kb", $company_all[$j]['PRE_LOC']);
                $this->excel->getActiveSheet()->setCellValue("AL$kb", $company_all[$j]['SAM_MOV']);
                $this->excel->getActiveSheet()->setCellValue("AM$kb", $company_all[$j]['EXP_MOV']);
                $this->excel->getActiveSheet()->setCellValue("AN$kb", $company_all[$j]['ADD_MOV']);
                $this->excel->getActiveSheet()->setCellValue("AO$kb", $company_all[$j]['PRO_POS']);
                $this->excel->getActiveSheet()->setCellValue("AP$kb", $company_all[$j]['TOT_MAN']);
                $this->excel->getActiveSheet()->setCellValue("AQ$kb", $company_all[$j]['ADD_MAN']);
                $this->excel->getActiveSheet()->setCellValue("AR$kb", $company_all[$j]['WHT_MAN']);
                $this->excel->getActiveSheet()->setCellValue("AS$kb", $company_all[$j]['BLU_MAN']);
                $this->excel->getActiveSheet()->setCellValue("AT$kb", $company_all[$j]['MAL_WOK']);
                $this->excel->getActiveSheet()->setCellValue("AU$kb", $company_all[$j]['FML_WOK']);
                $this->excel->getActiveSheet()->setCellValue("AV$kb", $company_all[$j]['MAL_FOR']);
                $this->excel->getActiveSheet()->setCellValue("AW$kb", $company_all[$j]['FML_FOR']);
                $this->excel->getActiveSheet()->setCellValue("AX$kb", $company_all[$j]['TEN_AGE']);
                $this->excel->getActiveSheet()->setCellValue("AY$kb", $company_all[$j]['FOR_AGE']);
                $this->excel->getActiveSheet()->setCellValue("AZ$kb", $company_all[$j]['SIX_AGE']);
                $this->excel->getActiveSheet()->setCellValue("BA$kb", $company_all[$j]['BSN_MAN']);
                $this->excel->getActiveSheet()->setCellValue("BB$kb", $company_all[$j]['KIM_MAN']);
                $this->excel->getActiveSheet()->setCellValue("BC$kb", $company_all[$j]['ULS_MAN']);
                $this->excel->getActiveSheet()->setCellValue("BD$kb", $company_all[$j]['YAS_MAN']);
                $this->excel->getActiveSheet()->setCellValue("BE$kb", $company_all[$j]['CHA_MAN']);
                $this->excel->getActiveSheet()->setCellValue("BF$kb", $company_all[$j]['BUS_NUM']);
                $this->excel->getActiveSheet()->setCellValue("BG$kb", $company_all[$j]['INC_BUS']);
                $this->excel->getActiveSheet()->setCellValue("BH$kb", $company_all[$j]['CMP_BUS']);
                $this->excel->getActiveSheet()->setCellValue("BI$kb", $company_all[$j]['SEF_CAR']);
                $this->excel->getActiveSheet()->setCellValue("BJ$kb", $company_all[$j]['PUB_TRS']);
                $this->excel->getActiveSheet()->setCellValue("BK$kb", $company_all[$j]['COM_WAK']);
                $this->excel->getActiveSheet()->setCellValue("BL$kb", $company_all[$j]['CAL_MAN']);
                $this->excel->getActiveSheet()->setCellValue("BM$kb", $company_all[$j]['CAL_CEL']);
                $this->excel->getActiveSheet()->setCellValue("BN$kb", $company_all[$j]['EXP1_IMG']);
                $this->excel->getActiveSheet()->setCellValue("BO$kb", $company_all[$j]['EXP2_IMG']);
                $this->excel->getActiveSheet()->setCellValue("BP$kb", $company_all[$j]['IN1_IMG']);
                $this->excel->getActiveSheet()->setCellValue("BQ$kb", $company_all[$j]['IN2_IMG']);
                $kb++;
            }

        }else if($_GET['excel'] == "pany"){
            $num      = $_GET['u_se'];
            $infocom  = $this->Movein_m->companyInfo($num);
            $filename = $infocom[0]['INC_NAM'] . '_업체정보';

            $this->excel->getActiveSheet()->setTitle($filename); 
            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20); 
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(50);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(100);
   
            $this->excel->getActiveSheet()->getStyle('A1:F1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('#222B35');
            $this->excel->getActiveSheet()->getStyle('A1:F1')->getFont()->getColor()->setRGB('FFFFFF');

            $this->excel->getActiveSheet()->setCellValue('A1', '구분');
            $this->excel->getActiveSheet()->setCellValue('A2', $infocom[0]['CPX_NUM']);
            $this->excel->getActiveSheet()->setCellValue('B1', '단지명');
            $this->excel->getActiveSheet()->setCellValue('B2', $infocom[0]['INS_NAME']);
            $this->excel->getActiveSheet()->setCellValue('C1', '관리기관');
            $this->excel->getActiveSheet()->setCellValue('C2', $infocom[0]['SITE_CODE']);
            $this->excel->getActiveSheet()->setCellValue('D1', '업체명');
            $this->excel->getActiveSheet()->setCellValue('D2', $infocom[0]['INC_NAM']);
            $this->excel->getActiveSheet()->setCellValue('E1', '대표자명');
            $this->excel->getActiveSheet()->setCellValue('E2', $infocom[0]['CEO_NAM']);
            $this->excel->getActiveSheet()->setCellValue('F1', '지번주소');
            $this->excel->getActiveSheet()->setCellValue('F2', $infocom[0]['JIBUN']);
            
            $this->excel->getActiveSheet()->getStyle('A1:F1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('A2:F2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $this->excel->getActiveSheet()->getStyle('A3:F3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('#222B35');
            $this->excel->getActiveSheet()->getStyle('A3:F3')->getFont()->getColor()->setRGB('FFFFFF');

            $this->excel->getActiveSheet()->setCellValue('A3', '전화번호');
            $this->excel->getActiveSheet()->setCellValue('A4', $infocom[0]['TEL_NUM']);
            $this->excel->getActiveSheet()->setCellValue('B3', '팩스번호');
            $this->excel->getActiveSheet()->setCellValue('B4', $infocom[0]['FAX_NUM']);
            $this->excel->getActiveSheet()->setCellValue('C3', '대표업종번호');
            $this->excel->getActiveSheet()->setCellValue('C4', $infocom[0]['CEO_NAM']);
            $this->excel->getActiveSheet()->setCellValue('D3', '업종명');
            $this->excel->getActiveSheet()->setCellValue('D4', $infocom[0]['BJD_NAM']);
            $this->excel->getActiveSheet()->setCellValue('E3', '생산품');
            $this->excel->getActiveSheet()->setCellValue('E4', $infocom[0]['GOD_ITM']);
            $this->excel->getActiveSheet()->setCellValue('F3', '도로명주소');
            $this->excel->getActiveSheet()->setCellValue('F4', $infocom[0]['NEW_ADD']);
            
            $this->excel->getActiveSheet()->getStyle('A3:F3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('A4:F4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $this->excel->getActiveSheet()->getStyle('A6:F6')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('#222B35');
            $this->excel->getActiveSheet()->getStyle('A6:F6')->getFont()->getColor()->setRGB('FFFFFF');

            $this->excel->getActiveSheet()->setCellValue('A6', '사업자등록번호');
            /*$this->excel->getActiveSheet()->setCellValue('A7', $infocom[0]['BSN_LIC']);*/
            $this->excel->getActiveSheet()->setCellValue('A7', '-');
            $this->excel->getActiveSheet()->setCellValue('B6', '용지면적');
            $this->excel->getActiveSheet()->setCellValue('B7', $infocom[0]['SIT_ARA']);
            $this->excel->getActiveSheet()->setCellValue('C6', '입주형태');
            $this->excel->getActiveSheet()->setCellValue('C7', $infocom[0]['LES_CHK']);
            $this->excel->getActiveSheet()->setCellValue('D6', '소유구분');
            $this->excel->getActiveSheet()->setCellValue('D7', $infocom[0]['OWN_CHK']);
            $this->excel->getActiveSheet()->setCellValue('E6', '입주계약');
            $this->excel->getActiveSheet()->setCellValue('E7', $infocom[0]['CON_DAT']);
            $this->excel->getActiveSheet()->setCellValue('F6', '공장등록(최초)');
            $this->excel->getActiveSheet()->setCellValue('F7', $infocom[0]['REG_DAT']);
            
            $this->excel->getActiveSheet()->getStyle('A6:F6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('A7:F7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $this->excel->getActiveSheet()->getStyle('A8:F9')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('#222B35');
            $this->excel->getActiveSheet()->getStyle('A8:F9')->getFont()->getColor()->setRGB('FFFFFF');

            $this->excel->getActiveSheet()->mergeCells('A8:A9');
            $this->excel->getActiveSheet()->mergeCells('B8:F8');

            $this->excel->getActiveSheet()->setCellValue('A8', '변경등록');
            /*$this->excel->getActiveSheet()->setCellValue('A10', $infocom[0]['REC_DAT']);*/
            $this->excel->getActiveSheet()->setCellValue('A10', '-');
            // $this->excel->getActiveSheet()->setCellValue('A7', $infocom[0]['BSN_LIC']);
            $this->excel->getActiveSheet()->setCellValue('B8', '종업원수');
            $this->excel->getActiveSheet()->setCellValue('B9', '총인원');
            $this->excel->getActiveSheet()->setCellValue('B10', $infocom[0]['TOT_MAN']);
            $this->excel->getActiveSheet()->setCellValue('C9', '남종업원');
            $this->excel->getActiveSheet()->setCellValue('C10', $infocom[0]['MAL_WOK']);
            $this->excel->getActiveSheet()->setCellValue('D9', '여종업원');
            $this->excel->getActiveSheet()->setCellValue('D10', $infocom[0]['FML_WOK']);
            $this->excel->getActiveSheet()->setCellValue('E9', '외국인(남)');
            $this->excel->getActiveSheet()->setCellValue('E10', $infocom[0]['MAL_FOR']);
            $this->excel->getActiveSheet()->setCellValue('F9', '외국인(여)');
            $this->excel->getActiveSheet()->setCellValue('F10', $infocom[0]['FML_FOR']);

            $this->excel->getActiveSheet()->getStyle('A8:A9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('A8:F8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('A9:F9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('A10:F10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            


            // $this->excel->getActiveSheet()->getStyle('A2:H2')->getFont()->setBold(true);
            // $this->excel->getActiveSheet()->getStyle('A2:H2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            // $this->excel->getActiveSheet()->getColumnDimension("A")->setWidth(20);
            // $this->excel->getActiveSheet()->getColumnDimension("B")->setWidth(20);
            // $this->excel->getActiveSheet()->getColumnDimension("C")->setWidth(20);
            // $this->excel->getActiveSheet()->getColumnDimension("D")->setWidth(20);
            // $this->excel->getActiveSheet()->getColumnDimension("E")->setWidth(20);
            // $this->excel->getActiveSheet()->getColumnDimension("F")->setWidth(25);
            // $this->excel->getActiveSheet()->getColumnDimension("G")->setWidth(30);
            // $this->excel->getActiveSheet()->getColumnDimension("H")->setWidth(20);
            // $this->excel->getActiveSheet()->mergeCells('D2:E2');
            // $this->excel->getActiveSheet()->mergeCells('D3:E3');
            // $this->excel->getActiveSheet()->getStyle('A3:H3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            // $this->excel->getActiveSheet()->setCellValue('A2', '구분');
            // $this->excel->getActiveSheet()->setCellValue('A3', $infocom[0]['CPX_NUM']);
            // $this->excel->getActiveSheet()->setCellValue('B2', '가동여부');
            // $this->excel->getActiveSheet()->setCellValue('B3', $infocom[0]['OPR_CHK']);
            // $this->excel->getActiveSheet()->setCellValue('C2', '현상태');
            // $this->excel->getActiveSheet()->setCellValue('C3', $infocom[0]['CUR_CON']);
            // $this->excel->getActiveSheet()->setCellValue('D2', '업체명');
            // $this->excel->getActiveSheet()->setCellValue('D3', $infocom[0]['INC_NAM']);
            // $this->excel->getActiveSheet()->setCellValue('F2', '대표자명');
            // $this->excel->getActiveSheet()->setCellValue('F3', $infocom[0]['CEO_NAM']);
            // $this->excel->getActiveSheet()->setCellValue('G2', '법정동');
            // $this->excel->getActiveSheet()->setCellValue('G3', $infocom[0]['BJD_NAM']);
            // $this->excel->getActiveSheet()->setCellValue('H2', '지번');
            // $this->excel->getActiveSheet()->setCellValue('H3', $infocom[0]['JIBUN']);

            // //$this->excel->getActiveSheet()->mergeCells('C4:D4');
            // $this->excel->getActiveSheet()->getStyle('A4:H4')->getFont()->setBold(true);
            // $this->excel->getActiveSheet()->getStyle('A4:H4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            // $this->excel->getActiveSheet()->getStyle('A5:H5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            // $this->excel->getActiveSheet()->mergeCells('E4:H4');
            // $this->excel->getActiveSheet()->mergeCells('E5:H5');
            // $this->excel->getActiveSheet()->setCellValue('A4', '부대시설종류');
            // $this->excel->getActiveSheet()->setCellValue('A5', $infocom[0]['ETC_FAC']);
            // $this->excel->getActiveSheet()->setCellValue('B4', '시설구분');
            // $this->excel->getActiveSheet()->setCellValue('B5', $infocom[0]['NEW_CHK']);
            // $this->excel->getActiveSheet()->setCellValue('C4', '대표번호');
            // $this->excel->getActiveSheet()->setCellValue('C5', $infocom[0]['TEL_NUM']);
            // $this->excel->getActiveSheet()->setCellValue('D4', '팩스번호');
            // $this->excel->getActiveSheet()->setCellValue('D5', $infocom[0]['FAX_NUM']);
            // $this->excel->getActiveSheet()->setCellValue('E4', '대표명주소');
            // $this->excel->getActiveSheet()->setCellValue('E5', $infocom[0]['NEW_ADD']);

            // $this->excel->getActiveSheet()->mergeCells('C6:D6');
            // $this->excel->getActiveSheet()->mergeCells('E6:F6');
            // $this->excel->getActiveSheet()->mergeCells('C7:D7');
            // $this->excel->getActiveSheet()->mergeCells('E7:F7');
            // $this->excel->getActiveSheet()->getStyle('A6:H6')->getFont()->setBold(true);
            // $this->excel->getActiveSheet()->getStyle('A6:H6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            // $this->excel->getActiveSheet()->getStyle('A7:H7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            // $this->excel->getActiveSheet()->setCellValue('A6', '사업자등록번호');
            // $this->excel->getActiveSheet()->setCellValue('A7', $infocom[0]['BSN_LIC']);
            // $this->excel->getActiveSheet()->setCellValue('B6', '주민/법인번호');
            // $this->excel->getActiveSheet()->setCellValue('B7', $infocom[0]['INC_LIC']);
            // $this->excel->getActiveSheet()->setCellValue('C6', '대표업종');
            // $this->excel->getActiveSheet()->setCellValue('C7', $infocom[0]['REP_SPC']);
            // $this->excel->getActiveSheet()->setCellValue('E6', '생산품목');
            // $this->excel->getActiveSheet()->setCellValue('E7', $infocom[0]['GOD_ITM']);
            // $this->excel->getActiveSheet()->setCellValue('G6', '생산액(백만원)');
            // $this->excel->getActiveSheet()->setCellValue('G7', $infocom[0]['GOD_MNY']);
            // $this->excel->getActiveSheet()->setCellValue('H6', '수출액(천달러)');
            // $this->excel->getActiveSheet()->setCellValue('H7', $infocom[0]['EXP_MNY']);


            // $this->excel->getActiveSheet()->getStyle('A8:H8')->getFont()->setBold(true);
            // $this->excel->getActiveSheet()->getStyle('A8:H8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            // $this->excel->getActiveSheet()->mergeCells('A8:B8');
            // $this->excel->getActiveSheet()->setCellValue('A8','부동산_계약서');
            // $this->excel->getActiveSheet()->mergeCells('C8:D8');
            // $this->excel->getActiveSheet()->setCellValue('C8','부동산_완료시');
            // $this->excel->getActiveSheet()->mergeCells('E8:F8');
            // $this->excel->getActiveSheet()->setCellValue('E8','입주_계약시');
            // $this->excel->getActiveSheet()->mergeCells('G8:H8');
            // $this->excel->getActiveSheet()->setCellValue('G8','입주_완료시');

            // $this->excel->getActiveSheet()->getStyle('A9:H9')->getFont()->setBold(true);
            // $this->excel->getActiveSheet()->getStyle('A9:H9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            // $this->excel->getActiveSheet()->getStyle('A10:H10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            // $this->excel->getActiveSheet()->setCellValue('A9','용지면적');
            // $this->excel->getActiveSheet()->setCellValue('A10', $infocom[0]['STC_ARA']);
            // $this->excel->getActiveSheet()->setCellValue('B9','건축면적');
            // $this->excel->getActiveSheet()->setCellValue('B10', $infocom[0]['BDC_ARA']);
            // $this->excel->getActiveSheet()->setCellValue('C9','용지면적');
            // $this->excel->getActiveSheet()->setCellValue('C10', $infocom[0]['SIT_ARA']);
            // $this->excel->getActiveSheet()->setCellValue('D9','건축면적');
            // $this->excel->getActiveSheet()->setCellValue('D10', $infocom[0]['BLD_ARA']);
            // $this->excel->getActiveSheet()->setCellValue('E9','계약신청일');
            // $this->excel->getActiveSheet()->setCellValue('E10', $infocom[0]['CON_DAT']);
            // $this->excel->getActiveSheet()->setCellValue('F9','입주계약변경일');
            // $this->excel->getActiveSheet()->setCellValue('F10', $infocom[0]['COC_DAT']);
            // $this->excel->getActiveSheet()->setCellValue('G9','등록신청일');
            // $this->excel->getActiveSheet()->setCellValue('G10', $infocom[0]['REG_DAT']);
            // $this->excel->getActiveSheet()->setCellValue('H9','공장등록변경일');
            // $this->excel->getActiveSheet()->setCellValue('H10', $infocom[0]['REC_DAT']);

            // $this->excel->getActiveSheet()->getStyle('A11:H11')->getFont()->setBold(true);
            // $this->excel->getActiveSheet()->getStyle('A11:H11')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            // $this->excel->getActiveSheet()->mergeCells('A11:H11');
            // $this->excel->getActiveSheet()->setCellValue('A11','부동산_임대');

            // $this->excel->getActiveSheet()->getStyle('A12:H12')->getFont()->setBold(true);
            // $this->excel->getActiveSheet()->getStyle('A12:H12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            // $this->excel->getActiveSheet()->getStyle('A13:H13')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            // $this->excel->getActiveSheet()->setCellValue('A12','소유구분');
            // $this->excel->getActiveSheet()->setCellValue('A13', $infocom[0]['OWN_CHK']);
            // $this->excel->getActiveSheet()->setCellValue('B12','임대구분');
            // $this->excel->getActiveSheet()->setCellValue('B13', $infocom[0]['LES_CHK']);
            // $this->excel->getActiveSheet()->setCellValue('C12','보증금');
            // $this->excel->getActiveSheet()->setCellValue('C13', $infocom[0]['DEP_MNY']);
            // $this->excel->getActiveSheet()->setCellValue('D12','임대료');
            // $this->excel->getActiveSheet()->setCellValue('D13', $infocom[0]['LES_MNY']);
            // $this->excel->getActiveSheet()->mergeCells('E12:F12');
            // $this->excel->getActiveSheet()->mergeCells('E13:F13');
            // $this->excel->getActiveSheet()->setCellValue('E12','임대기간');
            // $this->excel->getActiveSheet()->setCellValue('E13', $infocom[0]['LES_POD']);
            // $this->excel->getActiveSheet()->mergeCells('G12:H12');
            // $this->excel->getActiveSheet()->mergeCells('G13:H13');
            // $this->excel->getActiveSheet()->setCellValue('G12','임대업체');
            // $this->excel->getActiveSheet()->setCellValue('G13', $infocom[0]['LES_INC']);

            // $this->excel->getActiveSheet()->getStyle('A14:H14')->getFont()->setBold(true);
            // $this->excel->getActiveSheet()->getStyle('A14:H14')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            // $this->excel->getActiveSheet()->mergeCells('A14:C14');
            // $this->excel->getActiveSheet()->setCellValue('A14','종사자유형');
            // $this->excel->getActiveSheet()->mergeCells('D14:H14');
            // $this->excel->getActiveSheet()->setCellValue('D14','종사자지역');

            // $this->excel->getActiveSheet()->getStyle('A15:H15')->getFont()->setBold(true);
            // $this->excel->getActiveSheet()->getStyle('A15:H15')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            // $this->excel->getActiveSheet()->getStyle('A16:H16')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            // $this->excel->getActiveSheet()->setCellValue('A15','총인원');
            // $this->excel->getActiveSheet()->setCellValue('A16', $infocom[0]['TOT_MAN']);
            // $this->excel->getActiveSheet()->setCellValue('B15','사무직');
            // $this->excel->getActiveSheet()->setCellValue('B16', $infocom[0]['WHT_MAN']);
            // $this->excel->getActiveSheet()->setCellValue('C15','생산직');
            // $this->excel->getActiveSheet()->setCellValue('C16', $infocom[0]['BLU_MAN']);
            // $this->excel->getActiveSheet()->setCellValue('D15','부산');
            // $this->excel->getActiveSheet()->setCellValue('D16', $infocom[0]['BSN_MAN']);
            // $this->excel->getActiveSheet()->setCellValue('E15','김해');
            // $this->excel->getActiveSheet()->setCellValue('E16', $infocom[0]['KIM_MAN']);
            // $this->excel->getActiveSheet()->setCellValue('F15','울산');
            // $this->excel->getActiveSheet()->setCellValue('F16', $infocom[0]['ULS_MAN']);
            // $this->excel->getActiveSheet()->setCellValue('G15','양산');
            // $this->excel->getActiveSheet()->setCellValue('G16', $infocom[0]['YAS_MAN']);
            // $this->excel->getActiveSheet()->setCellValue('H15','창원');
            // $this->excel->getActiveSheet()->setCellValue('H16', $infocom[0]['CHA_MAN']);

            // $this->excel->getActiveSheet()->getStyle('A17:H17')->getFont()->setBold(true);
            // $this->excel->getActiveSheet()->getStyle('A17:H17')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            // $this->excel->getActiveSheet()->mergeCells('A17:H17');
            // $this->excel->getActiveSheet()->setCellValue('A17','종업원_남녀');

            // $this->excel->getActiveSheet()->getStyle('A18:H18')->getFont()->setBold(true);
            // $this->excel->getActiveSheet()->getStyle('A18:H18')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            // $this->excel->getActiveSheet()->getStyle('A19:H19')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            // $this->excel->getActiveSheet()->mergeCells('A18:B18');
            // $this->excel->getActiveSheet()->mergeCells('A19:B19');
            // $this->excel->getActiveSheet()->setCellValue('A18','남종업원');
            // $this->excel->getActiveSheet()->setCellValue('A19', $infocom[0]['MAL_WOK']);
            // $this->excel->getActiveSheet()->mergeCells('C18:D18');
            // $this->excel->getActiveSheet()->mergeCells('C19:D19');
            // $this->excel->getActiveSheet()->setCellValue('C18','여종업원');
            // $this->excel->getActiveSheet()->setCellValue('C19', $infocom[0]['FML_WOK']);
            // $this->excel->getActiveSheet()->mergeCells('E18:F18');
            // $this->excel->getActiveSheet()->mergeCells('E19:F19');
            // $this->excel->getActiveSheet()->setCellValue('E18','외국인(남)');
            // $this->excel->getActiveSheet()->setCellValue('E19', $infocom[0]['MAL_FOR']);
            // $this->excel->getActiveSheet()->mergeCells('G18:H18');
            // $this->excel->getActiveSheet()->mergeCells('G19:H19');
            // $this->excel->getActiveSheet()->setCellValue('G18','외국인(여)');
            // $this->excel->getActiveSheet()->setCellValue('G19', $infocom[0]['FML_FOR']);

            // $this->excel->getActiveSheet()->getStyle('A20:H20')->getFont()->setBold(true);
            // $this->excel->getActiveSheet()->getStyle('A20:H20')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            // $this->excel->getActiveSheet()->setCellValue('A20','통근버스보유');
            // $this->excel->getActiveSheet()->mergeCells('B20:F20');
            // $this->excel->getActiveSheet()->setCellValue('B20','출퇴근');
            // $this->excel->getActiveSheet()->mergeCells('G20:H20');
            // $this->excel->getActiveSheet()->setCellValue('G20','담당자');

            // $this->excel->getActiveSheet()->getStyle('A21:H21')->getFont()->setBold(true);
            // $this->excel->getActiveSheet()->getStyle('A21:H21')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            // $this->excel->getActiveSheet()->getStyle('A22:H22')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            // $this->excel->getActiveSheet()->setCellValue('A21','대수');
            // $this->excel->getActiveSheet()->setCellValue('A22', $infocom[0]['BUS_NUM']);
            // $this->excel->getActiveSheet()->setCellValue('B21','통근버스');
            // $this->excel->getActiveSheet()->setCellValue('B22', $infocom[0]['INC_BUS']);
            // $this->excel->getActiveSheet()->setCellValue('C21','기관운행버스');
            // $this->excel->getActiveSheet()->setCellValue('C22', $infocom[0]['CMP_BUS']);
            // $this->excel->getActiveSheet()->setCellValue('D21','자가용');
            // $this->excel->getActiveSheet()->setCellValue('D22', $infocom[0]['SEF_CAR']);
            // $this->excel->getActiveSheet()->setCellValue('E21','대중교통');
            // $this->excel->getActiveSheet()->setCellValue('E22', $infocom[0]['PUB_TRS']);
            // $this->excel->getActiveSheet()->setCellValue('F21','도보');
            // $this->excel->getActiveSheet()->setCellValue('F22', $infocom[0]['COM_WAK']);
            // $this->excel->getActiveSheet()->setCellValue('G21','담당자명');
            // $this->excel->getActiveSheet()->setCellValue('G22', $infocom[0]['CAL_MAN']);
            // $this->excel->getActiveSheet()->setCellValue('H21','휴대폰번호');
            // $this->excel->getActiveSheet()->setCellValue('H22', $infocom[0]['CAL_CEL']);

        }else if($_GET['excel'] == "land"){
            //$pnu = $_GET['u_se'];
            $pnu = '2644011400113810001';
            $pnuinfo = $this->Movein_m->complexsear($pnu);

            $filename = '토지대장';

            $this->excel->getActiveSheet()->getStyle('A2:A12')->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle('A2:A12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getColumnDimension("A")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("B")->setWidth(40);
            $this->excel->getActiveSheet()->getColumnDimension("C")->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension("D")->setWidth(20);
            $this->excel->getActiveSheet()->getStyle ('A6:A7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER );
            $this->excel->getActiveSheet()->mergeCells('A6:A7');
            $this->excel->getActiveSheet()->setCellValue('A2', '산업단지명');
            $this->excel->getActiveSheet()->setCellValue('A3', '주소');
            $this->excel->getActiveSheet()->setCellValue('A4', '면적(㎡)');
            $this->excel->getActiveSheet()->setCellValue('A5', '토지이동사유');
            $this->excel->getActiveSheet()->setCellValue('A6', '소유명');
            $this->excel->getActiveSheet()->setCellValue('A8', '소유자주소');
            $this->excel->getActiveSheet()->setCellValue('A9', '소유자변동원인');
            $this->excel->getActiveSheet()->setCellValue('A10', '공유인수');
            $this->excel->getActiveSheet()->setCellValue('A11', '2014년 공시지가');
            $this->excel->getActiveSheet()->setCellValue('A12', '2012년 공시지가');

            $this->excel->getActiveSheet()->setCellValue('B2', $pnuinfo[0]['INS_NAME'] );
            $this->excel->getActiveSheet()->setCellValue('B3', $pnuinfo[0]['BJD_NAM'].' '.$pnuinfo[0]['JIBUN']);
            $this->excel->getActiveSheet()->setCellValue('B4', $pnuinfo[0]['AREA']);
            $this->excel->getActiveSheet()->setCellValue('B5', $pnuinfo[0]['MVMN_RESN']);
            $this->excel->getActiveSheet()->setCellValue('B6', $pnuinfo[0]['OWNER']);
            $this->excel->getActiveSheet()->setCellValue('B7', '');
            $this->excel->getActiveSheet()->setCellValue('B8', $pnuinfo[0]['OWNER_ADD']);
            $this->excel->getActiveSheet()->setCellValue('B9', $pnuinfo[0]['OWNER_MVMN']);
            $this->excel->getActiveSheet()->setCellValue('B10', $pnuinfo[0]['OWNER_MEM']);
            $this->excel->getActiveSheet()->setCellValue('B11', $pnuinfo[0]['JIKA_2014']);
            $this->excel->getActiveSheet()->setCellValue('B12', $pnuinfo[0]['JIKA_2012']);

            $this->excel->getActiveSheet()->getStyle('C2:C12')->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle('C2:C12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->setCellValue('C2', '지목');
            $this->excel->getActiveSheet()->setCellValue('C4', '용도');
            $this->excel->getActiveSheet()->setCellValue('C5', '토지이동일자');
            $this->excel->getActiveSheet()->setCellValue('C8', '소유구분');
            $this->excel->getActiveSheet()->setCellValue('C9', '소유권변경일자');
            $this->excel->getActiveSheet()->setCellValue('C10', '공시지가');
            $this->excel->getActiveSheet()->setCellValue('C11', '2013년 공지지가');
            $this->excel->getActiveSheet()->setCellValue('C12', '2011년 공지지가');
        }

        header("Content-Type: application/vnd.ms-excel; charset=utf-8");
        header('Content-Disposition: attachment;filename="' . $filename . '_' . $ymd . '.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        ob_end_clean();

        $objWriter->save('php://output');
    }
}