

class Test3 extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->library("Excel");
    }

    function index(){
        $ymd = date("Ymd");
        $filename = 'test2';
        $this->excel->getActiveSheet()->setTitle('부대운임');
        $this->excel->getActiveSheet()->setCellValue('A1', 'partner');
        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(12);
        $this->excel->getActiveSheet()->setCellValue('A2', '1234');
        header("Content-Type: application/vnd.ms-excel; charset=utf-8");
        header('Content-Disposition: attachment;filename="' . $filename . '_'.$ymd.'.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        ob_end_clean();

        $objWriter->save('php://output');
    }

}