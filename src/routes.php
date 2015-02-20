<?php

Route::resource('supplier', 'Balzreber\Delivery\Controllers\SupplierController');
Route::resource('batch', 'Balzreber\Delivery\Controllers\BatchController');
Route::resource('package', 'Balzreber\Delivery\Controllers\PackageController');

Route::get('/debugOut', 'Balzreber\Delivery\Controllers\DeliveryController@debugOut');

?>