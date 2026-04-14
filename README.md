# TDD Katas — PHP
 
A collection of coding katas solved using Test-Driven Development in PHP.
 
This repository is a deliberate practice space. Each kata is implemented following the TDD cycle: write a failing test, make it pass with the simplest possible solution, then refactor. The goal is to build muscle memory around test-first thinking and clean design.
 
## Katas
 
| Kata | Description |
|------|-------------|
| `BowlingGame` | Classic TDD kata by Robert C. Martin. Calculates a bowling game score following all scoring rules. |
| `Calculator` | Basic arithmetic operations driven entirely by tests. |
| `LegacyCalculator` | Refactoring kata — improving an existing implementation under test coverage. |
| `DailyReportGenerator` / `ReportGenerator` | Report generation logic built test-first. |
| `FizzBuzz` | The canonical introductory TDD kata. |
| `RomanNumerals` | Converts integers to Roman numeral representation using TDD. |
| `Stack` | Implementation of a stack data structure driven by tests. |
| `StringCalculator` | A progressive kata by Roy Osherove, focused on incremental design through tests. |
 
## Tech stack
 
- PHP 8
- PHPUnit
- No framework dependencies — domain logic only
 
## Approach
 
Tests live in `/tests`. Each kata follows the same structure: a test class drives the implementation from zero. Fakes and test doubles are used where needed to keep tests isolated and fast.
 
> This repository is actively maintained and updated as I continue practicing.
 
