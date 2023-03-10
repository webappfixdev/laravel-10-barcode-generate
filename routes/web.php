<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('barcode',function(){
    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
    $image = $generator->getBarcode('081231723897', $generator::TYPE_CODE_128);  
    
    return response($image)->header('Content-Type','image/png');  
});

Route::get('barcode-save',function(){
    
    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
    $image = $generator->getBarcode('081231723897', $generator::TYPE_CODE_128);

    \Storage::put('barcode/demo.png',$image);
    
    return response($image)->header('Content-Type','image/png');  
});


Route::get('barcode-html',function(){
    
    $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
    $image = $generator->getBarcode('081231723897', $generator::TYPE_CODE_128);


    return view('barcode',compact('image'));  
});