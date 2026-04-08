<?php

namespace Jalejandro\Tdd;

class DailyReportGenerator
{
    public function generateReport(): string
    {
        $today = $this->getCurrentDate();

        $filename = "/tmp/daily_report_{$today}.txt";

        $content  = "Daily Report\n";
        $content .= "Date: {$today}\n";
        $content .= "Generated at: " . date('H:i:s') . "\n";

        $this->writeFile($filename, $content);

        return $filename;
    }

    protected function getCurrentDate(): string
    {
        return date('Y-m-d');
    }

    protected function writeFile(string $path, string $content): int|false
    {
        return file_put_contents($path, $content);
    }
}