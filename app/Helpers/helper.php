<?php

use Illuminate\Support\Facades\Auth;

    function userBussiness()
    {
        return Auth::user()->bussiness->first();
    }

    function attributeBussiness()
    {
        $bussiness = Auth::user()->bussiness->first();
        
        return $bussiness->attribute;
    }
?>