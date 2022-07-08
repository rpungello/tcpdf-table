<?php

namespace Rpungello\TcpdfTable;

use TCPDF;

class Writer
{
    public function __construct(protected TCPDF $document)
    {
    }

    public function write(Table $table, float $width = null, float $height = null): void
    {
        $width = $width ?: $this->document->getPageWidth();
        $totalWeight = $table->getTotalWeight();

        if ($table->hasHead())
            $this->writeSection($table, $table->getHead(), $totalWeight);

        if ($table->hasBody())
            $this->writeSection($table, $table->getBody(), $totalWeight);
    }

    protected function writeSection(Table $table, Section $section, int $totalWeight): void
    {
        $this->document->SetX(0);
        $rowNumber = $columnNumber = 0;
        foreach ($section->getRows() as $row) {
            foreach ($row->getCells() as $cell) {
                $width = $this->convertWeightToWidth($table, $table->getWeightForColumnIndex($columnNumber), $totalWeight);
                $this->document->Cell($width, 10, $cell->getValue(), 1);
                $columnNumber++;
            }
            $this->document->SetX(0);
            $this->document->Ln(10);
            $columnNumber = 0;
            $rowNumber++;
        }
    }

    protected function convertWeightToWidth(Table $table, int $weight, int $totalWeight): float
    {
        return ($weight / $totalWeight) * $this->document->getPageWidth();
    }
}
