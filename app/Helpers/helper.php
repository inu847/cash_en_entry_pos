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
                break;        
            }
    }

    function status($status)
    {
        switch ($status) {
            case 1:
                return 'active';
                break;
            case 2:
                return 'inactive';
                break;     }
    }

    // order
    function statusOrder($value)
    {
        switch ($value) {
            case 1:
                return 'Pending';
                break;
            case 2:
                return 'Process';
                break;
            case 2:
                return 'Success';
                break;
            case 2:
                return 'Cancle';
                break;
            }
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
            case 3:
                return 'Ewallet';
                break;
            }
    }

    function typeFAQ($type)
    {
        switch ($type) {
            case 1:
                return 'General';
                break;
            case 2:
                return 'Help';
                break;     
            }
}
    function statusWhyShouldWe($status)
    {
        switch ($status) {
            case 1:
                return 'active';
                break;
            case 2:
                return 'inactive';
                break;     
            }
}
    function typeWhyShouldWe($type)
    {
        switch ($type) {
            case 1:
                return 'About Us';
                break;
            case 2:
                return 'Service';
                break;     
            }
}
    function voucherType($type)
    {
        switch ($type) {
            case 1:
                return 'Product';
                break;
            case 2:
                return 'Service';
                break;     
            }
}
    function voucherStatus($status)
    {
        switch ($status) {
            case 1:
                return 'active';
                break;
            case 2:
                return 'inactive';
                break;     
            }
}
    function IngredientStatus($status)
    {
        switch ($status) {
            case 1:
                return 'active';
                break;
            case 2:
                return 'inactive';
                break;     
            }
}
    function IngredientType($type)
    {
        switch ($type) {
            case 1:
                return 'Product';
                break;
            case 2:
                return 'Service';
                break;     
            }
}
function mHolidayStatus($status)
{
    switch ($status) {
        case 1:
            return 'active';
            break;
        case 2:
            return 'inactive';
            break;     
        }
}
function katalogType($type)
{
    switch ($type) {
        case 1:
            return 'Product';
            break;
        case 2:
            return 'Service';
            break;     
        }
}
function katalogStatus($status)
{
    switch ($status) {
        case 1:
            return 'active';
            break;
        case 2:
            return 'inactive';
            break;     
        }
}
function ProductIngType($type)
{
    switch ($type) {
        case 1:
            return 'Required';
            break;
        case 2:
            return 'Optional';
            break;     
        }
}
function katalogDeStatus($status)
{
    switch ($status) {
        case 1:
            return 'active';
            break;
        case 2:
            return 'inactive';
            break;     
        }
}
?>