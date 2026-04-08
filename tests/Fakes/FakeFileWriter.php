<?php

namespace Jalejandro\tests\Fakes;

use Jalejandro\Tdd\Contracts\FileWriterInterface;

readonly class FakeFileWriter implements FileWriterInterface
{
    public function __construct(private bool $filePutContent) {}

    public function write(string $path, string $content): int|false
    {
        return $this->filePutContent;
    }
}