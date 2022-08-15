<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;

class PrintController extends Controller
{
    public function test()
    {
        $connector = new NetworkPrintConnector("192,168,43,249", 9100);
        $printer = new Printer($connector);
        try {
            $printer -> text("Hello World i am printing this page already!\n");
            $printer -> cut();
            $printer -> text("Hello World i am printing this page already!\n");
            $printer -> cut();
        } finally {
        $printer -> close();
}
    }
}