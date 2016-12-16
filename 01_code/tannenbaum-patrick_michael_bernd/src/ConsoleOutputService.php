<?php

class ConsoleOutputService implements OutputServiceInterface
{
    public function output($output)
    {
        echo $output;
    }
}