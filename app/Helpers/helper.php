<?php

use App\Models\Bussiness;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Bus;

    function userBussiness()
    {
        return Auth::user()->bussiness->first();
    }

    function attributeBussiness()
    {
        $bussiness = Auth::user()->bussiness->first();
        
        return $bussiness->attribute;
    }

    function bussiness()
    {
        $data = Bussiness::orderBy('created_at', 'desc')->get();

        return $data;
    }

    function statusInvoice($status)
    {
        switch ($status) {
            case 1:
                return 'Process';
                break;
            case 2:
                return 'Cancel';
                break;
            case 3:
                return 'Complete';
                break;
            default:
                return 'Process';
                break;
        }
    }

    function paidInvoice($paid)
    {
        switch ($paid) {
            case 1:
                return 'Unpaid';
                break;
            case 2:
                return 'Paid';
                break;
            case 3:
                return 'Partial';
                break;
            default:
                return 'Unpaid';
                break;
        }
    }

    function typeInvoice($type)
    {
        switch ($type) {
            case 1:
                return 'Dine In';
                break;
            case 2:
                return 'Reservation';
                break;
            case 3:
                return 'Take Away';
                break;
            case 4:
                return 'Delivery';
                break;
            case 5:
                return 'Online';
                break;
            default:
                return 'Dine In';
                break;
        }
    }

    function typeBanner($type)
    {
        switch ($type) {
            case 1:
                return 'Banner Promosi';
                break;
            case 2:
                return 'Banner Event';
                break;
            case 3:
                return 'Banner Fixed';
                break;        }
    }

    function statusBanner($status)
    {
        switch ($status) {
            case 1:
                return 'active';
                break;
            case 2:
                return 'inactive';
                break;     }
    }

    function statusPayment($value)
    {
        switch ($value) {
            case 1:
                return 'active';
                break;
            case 2:
                return 'inactive';
                break;
            }
    }
    
    function typePayment($value) {
        switch ($value) {
            case 1:
                return 'Cash';
                break;
            case 2:
                return 'Transfer';
                break;
            }
    }
?>