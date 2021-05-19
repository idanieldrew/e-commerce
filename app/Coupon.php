<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public function findByCode($code)
    {
        return self::where('code',$code);
    }

    public function isDiscount($total)
    {
        if ($this->type == 'val') {
            return $this->value;
        }
        elseif ($this->type == 'percent') {
            return ($this->value / 100) * $total;
        }
        else {
            return 0;
        }
    }
}
