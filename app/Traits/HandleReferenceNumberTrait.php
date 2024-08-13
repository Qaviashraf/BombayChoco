<?php

namespace App\Traits;

use App\Models\Order;

trait HandleReferenceNumberTrait
{
    // Generate unique reference number
    public function generateUniqueReference($module, $field, $firstNumber, $lastNumber)
    {
        $code = 0;
        if ($module == 'order') {
            do {
                // $code = random_int($firstNumber, $lastNumber);
                $code = (Order::select('id')->max('id') + 1);
                $code = sprintf('%08d', $code);
                if ($field == 'bill_no') {
                    $code = 'BOMBAY-'.$code;
                }
            } while (Order::where($field, "=", $code)->first());
        }
        return $code;
    }
}
