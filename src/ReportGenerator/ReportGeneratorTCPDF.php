<?php
/**
 * Created by PhpStorm.
 * User: sovkutsan
 * Date: 6/8/18
 * Time: 3:39 PM
 */

namespace App\ReportGenerator;


class ReportGeneratorTCPDF extends ReportGeneratorBase implements ReportGeneratorInterface
{
    protected $extension = 'pdf';

    private $tcpdf;

    public function __construct()
    {
        $this->tcpdf = new \TCPDF('P', 'mm', 'A4');
    }

    public function generate($report)
    {
        $this->tcpdf->AddPage();
        $this->tcpdf->Cell(40,10,'Hello World!');

        $this->tcpdf->Output($this->getPath(), 'F');
    }
}