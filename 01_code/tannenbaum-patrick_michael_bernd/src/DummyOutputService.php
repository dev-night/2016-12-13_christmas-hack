<?php

class DummyOutputService implements OutputServiceInterface
{
    public function output($output)
    {
        return $output;
    }
}
