<?php

class Light
{
    private string $status = "Off";

    public function turn(): void
    {
        $this->status = $this->status === 'Off' ? 'On' : 'Off';
    }

    public function getStatus(): string
    {
        return $this->status;
    }
}