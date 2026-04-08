<?php

namespace Jalejandro\Tdd;

use Jalejandro\Tdd\Contracts\FileWriterInterface;

class FileWriter implements FileWriterInterface
{
    public function write(string $path, string $content): int|false
    {
        return file_put_contents($path, $content);
    }
}