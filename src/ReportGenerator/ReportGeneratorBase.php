<?php
/**
 * Created by PhpStorm.
 * User: sovkutsan
 * Date: 6/8/18
 * Time: 3:39 PM
 */

namespace App\ReportGenerator;


class ReportGeneratorBase
{
    protected $extension = '';

    protected function getPath() {
        return $this->getDest() . $this->getName();
    }

    protected function getName()
    {
        return 'report_' . mt_rand(0, 9999) . '.' . $this->extension;
    }

    protected function getDest()
    {
        return '/var/www/reports/var/files/';
    }
}