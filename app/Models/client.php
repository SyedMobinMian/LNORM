<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'customer_number',
        'company_name',
        'email',
        'phone',
        'shipping_street',
        'shipping_city',
        'shipping_state',
        'shipping_zip',
        'shipping_country',
        'billing_street',
        'billing_city',
        'billing_state',
        'billing_zip',
        'billing_country',
        'tax_number',
        'tax_type',
        'bank_name',
        'account_number',
        'bank_code',
        'account_holder',
    ];
}