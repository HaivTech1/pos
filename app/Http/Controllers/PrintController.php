<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;

class PrintController extends Controller
{
    public function test()
    {
        try {
            $connector = new FilePrintConnector("php://stdout");
            $printer = new Printer($connector);
            $printer -> text("Hello World!\n");
            $printer -> cut();
            $printer -> close();
        } catch (\Exception $e) {
            echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
        }
    }
}