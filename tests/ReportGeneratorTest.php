<?php

namespace Jalejandro\tests;

use Jalejandro\Tdd\ReportGenerator;
use Jalejandro\tests\Fakes\FakeFileWriter;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(ReportGenerator::class)]
class ReportGeneratorTest extends TestCase
{
    public static function ratioProvider(): array
    {
        return [
            'normal ratio'     => [300, 100, '33.33%'],
            'zero income'      => [0,   100, '0%'],
            'equal amounts'    => [200, 200, '100.00%'],
        ];
    }

    public function test_generate_monthly_report()
    {
        $pdoMock = $this->createStub(\PDO::class);
        $stmtMock = $this->createStub(\PDOStatement::class);

        $pdoMock->method('prepare')->willReturn($stmtMock);
        $stmtMock->method('execute')->willReturn(true);
        $stmtMock->method('fetchAll')->willReturn([
            ['type' => 'income', 'total' => 100],
            ['type' => 'expense', 'total' => 50],
        ]);

        $fakeWriter = new FakeFileWriter(true);
        $generator  = new ReportGenerator($pdoMock, $fakeWriter);

        $filename = $generator->generateMonthlyReport(1, 2026);

        $this->assertEquals('/tmp/report_1_2026.txt', $filename);
    }

    #[DataProvider('ratioProvider')]
    public function test_calculate_expense_ratio(int $income, int $expenses, string $expected)
    {
        $generator = new ReportGenerator($this->createStub(\PDO::class), new FakeFileWriter(true));

        $this->assertSame($expected, $generator->calculateExpenseRatio($income, $expenses));
    }
}
