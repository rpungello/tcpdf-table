<?php

namespace Rpungello\TcpdfTable;

use Countable;

class Row implements Countable
{
    public function __construct(protected array $cells = [])
    {
    }

    public function addCell(Cell $cell)
    {
        $this->cells[] = $cell;
    }

    public function getCells(): array
    {
        return $this->cells;
    }

    public function count(): int
    {
        return count($this->cells);
    }
}
