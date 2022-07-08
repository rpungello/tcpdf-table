<?php

namespace Rpungello\TcpdfTable;

use TCPDF;

class Table
{
    // Table sections
    protected Head $head;
    protected Body $body;
    protected Foot $foot;

    protected array $weights;

    public function __construct()
    {
        $this->head = new Head();
        $this->body = new Body();
        $this->foot = new Foot();

        $this->weights = [];
    }

    public function addHeadRow(Row $row)
    {
        $this->head->addRow($row);
    }

    public function addBodyRow(Row $row)
    {
        $this->body->addRow($row);
    }

    public function addFootRow(Row $row)
    {
        $this->foot->addRow($row);
    }

    public function hasHead(): bool
    {
        return ! $this->head->isEmpty();
    }

    public function getHead(): Head
    {
        return $this->head;
    }

    public function hasBody(): bool
    {
        return ! $this->body->isEmpty();
    }

    public function getBody(): Body
    {
        return $this->body;
    }

    public function getTotalWeight(): int
    {
        return array_sum(
            array_pad($this->weights, $this->getNumberOfColumns(), 1)
        );
    }

    public function getNumberOfColumns(): int
    {
        return max(
            $this->head->getNumberOfColumns(),
            $this->body->getNumberOfColumns(),
            $this->foot->getNumberOfColumns(),
        );
    }

    public function getWeightForColumnIndex(int $index): float
    {
        if (count($this->weights) > $index) {
            return $this->weights[$index];
        } else {
            return 1;
        }
    }

    public function setGlobalColumnWeights(array $weights): void
    {
        $this->weights = $weights;
    }

    public function writeToPdf(TCPDF $pdf): void
    {
        $writer = new Writer($pdf);
        $writer->write($this);
    }
}
