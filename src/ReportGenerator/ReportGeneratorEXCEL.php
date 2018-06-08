<?php
/**
 * Created by PhpStorm.
 * User: sovkutsan
 * Date: 6/8/18
 * Time: 3:39 PM
 */

namespace App\ReportGenerator;


use PHPExcel_IOFactory;

class ReportGeneratorEXCEL extends ReportGeneratorBase implements ReportGeneratorInterface
{
    protected $extension = 'xls';

    private $excel;

    public function __construct()
    {
        $this->excel =  new \PHPExcel();
    }

    public function generate($report)
    {
        try {

            $this->excel->getProperties()->setCreator("asmproger")
                ->setLastModifiedBy("asmproger")
                ->setTitle("PHPExcel Test Document")
                ->setSubject("PHPExcel Test Document")
                ->setDescription("Test document for PHPExcel, generated using PHP classes.")
                ->setKeywords("office PHPExcel php")
                ->setCategory("Test result file");


            $this->excel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Hello')
                ->setCellValue('B2', 'world!')
                ->setCellValue('C1', 'Hello')
                ->setCellValue('D2', 'world!');

            $this->excel->setActiveSheetIndex(0)
                ->setCellValue('A4', 'Miscellaneous glyphs')
                ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');


            $this->excel->getActiveSheet()->setCellValue('A8',"Hello\nWorld");
            $this->excel->getActiveSheet()->getRowDimension(8)->setRowHeight(-1);
            $this->excel->getActiveSheet()->getStyle('A8')->getAlignment()->setWrapText(true);


            $this->excel->getActiveSheet()->setTitle('Simple');


            $this->excel->setActiveSheetIndex(0);
            

            $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
            $objWriter->save($this->getPath());
        } catch (\PHPExcel_Reader_Exception $e) {
            die('wtf 1');
        } catch (\PHPExcel_Writer_Exception $e) {
            die('wtf 2');
        } catch (\PHPExcel_Exception $e) {
            die('wtf 3');
        }
    }
}