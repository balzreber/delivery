<?php namespace Balzreber\Delivery\Facades;

use Illuminate\Support\Facades\Facade;

class Package extends Facade {

protected static function getFacadeAccessor() {
      return "package";
     }       
}

?>
