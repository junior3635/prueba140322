<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        $d3 =Product::create([
            'invoice_id' => 1,
            'name' => Str::random(8),
            'quantity' => 3,
            'price' => 10,
            ])->get('name');
        echo 'Producto Ingresado Exitosamente';
    }
}
