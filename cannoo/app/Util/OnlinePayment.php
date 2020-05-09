<?php 

namespace App\Util;

use App\Interfaces\Payment;
use App\User;

class OnlinePayment implements Payment {
    public function pay($request, $total, $disponible){
        if($request["payment"] == "Cannoos") {
            if($total > $disponible){
                return false;
            }
           $user = auth()->user();
           $user->spendCredits($total);
           $user->save();

        }
        return true;
    }
}
