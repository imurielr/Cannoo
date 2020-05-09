<?php 

namespace App\Interfaces;
use Illuminate\Http\Request;

interface Payment {
    public function pay(Request $request, $total, $disponible);
}
