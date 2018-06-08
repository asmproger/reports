<?php
/**
 * Created by PhpStorm.
 * User: sovkutsan
 * Date: 6/8/18
 * Time: 3:33 PM
 */

namespace App\ReportGenerator;


class ReportGeneratorFactory
{

    public static function getGenerator($lib)
    {
        $generator = null;

        switch ($lib) {
            case 'fpdf':
                $generator = new ReportGeneratorFPDF();
                break;
            case 'tcpdf':
                $generator = new ReportGeneratorTCPDF();
                break;
            case 'excel':
                $generator = new ReportGeneratorEXCEL();
                break;
            default:
                throw new \InvalidArgumentException('Unsupported library!');
        }

        return $generator;
    }

}