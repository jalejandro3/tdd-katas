<?php

namespace Jalejandro\tests;

use Jalejandro\Tdd\DailyReportGenerator;
use PHPUnit\Framework\TestCase;

class TestableDailyReportGenerator extends DailyReportGenerator {
    protected function getCurrentDate(): string {
        return '2024-01-01';
    }

    protected function writeFile(string $path, string $content): int|false
    {
        return true;
    }
}

class DailyReportGeneratorTest extends TestCase
{
    public function test_generate_report()
    {
        $generator = new TestableDailyReportGenerator;

        /**
         * Otra forma de generar la subclase de la clase a testear:
         *
         * $generator = $this->getMockBuilder(DailyReportGenerator::class)
         * ->onlyMethods(['getCurrentDate', 'writeFile'])
         * ->getMock();
         *
         * $generator->method('getCurrentDate')->willReturn('2024-01-01');
         * $generator->method('writeFile')->willReturn(true);
         */

        $this->assertSame('/tmp/daily_report_2024-01-01.txt', $generator->generateReport());
    }
}
