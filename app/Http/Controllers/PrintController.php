<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use Rawilk\Printing\Facades\Printing;
use Rawilk\Printing\Receipts\ReceiptPrinter;

class PrintController extends Controller
{
    public function test()
    {
        $receipt = (string) (new ReceiptPrinter)
        ->centerAlign()
        ->text('My heading')
        ->leftAlign()
        ->line()
        ->twoColumnText('Item 1', '2.00')
        ->twoColumnText('Item 2', '4.00')
        ->feed(2)
        ->centerAlign()
        ->barcode('1234')
        ->cut();

        // Now send the string to your receipt printer
        Printing::newPrintTask()
        ->printer($receiptPrinterId)
        ->content($text)
        ->send();
        }
}