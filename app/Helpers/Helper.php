<?php
namespace App\Helpers;

class Helper {

    public static function loginuser(){
        return auth()->user()->id;
    }
}
?>