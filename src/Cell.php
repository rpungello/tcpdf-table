<?php

namespace Rpungello\TcpdfTable;

class Cell
{
    public function __construct(protected string $value)
    {
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
