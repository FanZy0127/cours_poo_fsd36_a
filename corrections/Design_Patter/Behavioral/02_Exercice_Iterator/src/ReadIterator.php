<?php

namespace App;

class ReadIterator implements \Iterator
{

    public function __construct(
        private string $file,
        private  $pointer = '',
        private int $rowCounter = 0,
        private string $separator = ','
    ) {
        $this->pointer = fopen($file, 'r');
    }

    public function rewind(): void
    {
        $this->rowCounter = 0;
        rewind($this->pointer); // remet le pointer au début
    }

    public function current(): array
    {
        $current = fgets($this->pointer, 4096); // lit la ligne et se place à la ligne suivante
        $this->rowCounter++;

        return explode($this->separator, $current);
    }

    public function key(): int
    {
        return $this->rowCounter;
    }

    public function next(): bool
    {
        return !feof($this->pointer);
    }

    public function valid(): bool
    {
        if (!is_resource($this->pointer)) return false;

        if ($this->next()) return true;

        fclose($this->pointer);

        return false;
    }
}
