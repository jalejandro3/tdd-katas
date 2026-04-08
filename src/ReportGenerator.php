<?php

namespace Jalejandro\Tdd;

use Jalejandro\Tdd\Contracts\FileWriterInterface;
use PDO;

readonly class ReportGenerator
{
    //Seams method
    public function __construct(private PDO $pdo, private FileWriterInterface $fileWriter) {}

    public function generateMonthlyReport(int $month, int $year): string
    {
        //Seams method
        //Before: $pdo = new \PDO('mysql:host=localhost;dbname=accounting', 'root', '');
        //After:
        $stmt = $this->pdo->prepare('
            SELECT type, SUM(amount) as total
            FROM transactions
            WHERE month = ? AND year = ?
            GROUP BY type
        ');
        $stmt->execute([$month, $year]);
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $income = 0;
        $expenses = 0;

        foreach ($rows as $row) {
            if ($row['type'] === 'income') {
                $income = $row['total'];
            } else {
                $expenses = $row['total'];
            }
        }

        $balance = $income - $expenses;

        // Dependencia hardcodeada a sistema de archivos
        $filename = "/tmp/report_{$month}_{$year}.txt";
        $content = "Monthly Report {$month}/{$year}\n";
        $content .= "Income: {$income}\n";
        $content .= "Expenses: {$expenses}\n";
        $content .= "Balance: {$balance}\n";
        //Sprout method
        $content .= "Expense Ratio: {$this->calculateExpenseRatio($income, $expenses)}\n";

        //Seams method
        //Before: file_put_contents($filename, $content);
        //After:
        $this->fileWriter->write($filename, $content);

        return $filename;
    }

    // Sprout Method: agregar nueva funcionalidad a un metodo legacy largo y complejo, pero no puedes tocarlo sin romper algo.
    public function calculateExpenseRatio($income, $expenses): string
    {
        if ($income > 0) {
            $ratio = number_format($expenses / $income * 100, 2);
        } else {
            $ratio = 0;
        }

        return "$ratio%";
    }
}
