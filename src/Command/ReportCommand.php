<?php
/**
 * Created by PhpStorm.
 * User: sovkutsan
 * Date: 6/8/18
 * Time: 3:21 PM
 */

namespace App\Command;


use App\ReportGenerator\ReportGeneratorFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ReportCommand extends Command
{
    protected $libs = ['fpdf', 'tcpdf', 'excel'];

    protected function configure()
    {
        $this
            ->setName('command:report')
            ->setDescription('Generates report')
            ->setHelp('This command generates fake report with random data. Used 3 libs: FPDF, TCPDF, PHPExcel. ')
            ->addArgument('lib', InputArgument::REQUIRED, 'Library for report output. FPDF(fpdf), TCPDF(tcpdf), PHPExcel(excel)');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $lib = mb_strtolower($input->getArgument('lib'));

        if (!in_array($lib, $this->libs)) {
            $output->writeln('Unknown lib selected. FPDF(fpdf), TCPDF(tcpdf), PHPExcel(excel)');
            die;
        }

        $output->writeln('Selected lib: ' . $lib);
        $report = $this->generateFakeReport();

        $generator = ReportGeneratorFactory::getGenerator($lib);

        $output->writeln('Selected generator: ' . get_class($generator));

        $generator->generate($report);
        $output->writeln('Report generated');
    }

    private function generateFakeReport()
    {
        $fakeData = [
            'Total' => mt_rand(999, 9999),
            'Executed' => mt_rand(999, 9999),
            'Reidrected' => mt_rand(999, 9999),
            'On air' => mt_rand(999, 9999),
        ];

        return $fakeData;
    }

}