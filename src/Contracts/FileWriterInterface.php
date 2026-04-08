<?php

namespace Jalejandro\Tdd\Contracts;

interface FileWriterInterface
{
    public function write(string $path, string $content): int|false;
}