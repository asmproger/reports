<?php
/**
 * Created by PhpStorm.
 * User: sovkutsan
 * Date: 6/8/18
 * Time: 3:39 PM
 */

namespace App\ReportGenerator;


class ReportGeneratorFPDF extends ReportGeneratorBase implements ReportGeneratorInterface
{
    protected $extension = 'pdf';

    private $fpdf;

    public function __construct()
    {
        $this->fpdf = new \FPDF('P', 'mm', 'A4');
    }

    public function generate($report)
    {
        $this->fpdf->AddPage();
        $this->fpdf->SetFont('Arial', 'B', 16);
        $this->fpdf->Cell(40, 10, 'Hello World!');

        $this->fpdf->Output('F', $this->getPath());
    }
}