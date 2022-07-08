<?php

namespace Rpungello\TcpdfTable;

use Countable;

abstract class Section implements Countable
{
    protected array $rows;

    public function __construct()
    {
        $this->rows = [];
    }

    public function addRow(Row $row)
    {
        $this->rows[] = $row;
    }

    public function getRows(): array
    {
        return $this->rows;
    }

    public function isEmpty(): bool
    {
        return $this->count() === 0;
    }

    public function count(): int
    {
        return count($this->rows);
    }

    public function getNumberOfColumns(): int
    {
        $numberOfColumns = 0;
        foreach ($this->rows as $row)
            $numberOfColumns = max($numberOfColumns, count($row));
        return $numberOfColumns;
    }
}
