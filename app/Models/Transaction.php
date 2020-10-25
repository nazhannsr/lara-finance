<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Balping\HashSlug\HasHashSlug;

class Transaction extends Model
{
    use HasFactory, HasHashSlug;

    protected $fillable = [
        'invoice_number', 'transaction_name', 'outstanding_balance', 'total_price',
        'total_payment', 'payment_due', 'payment_date', 'customer_id', 'company_user_id',
        'company_id'
    ];
    
    public function company(){
        return $this->belongsTo('App\Models\Company', 'company_id');
    }

    public function customer(){
        return $this->hasMany('App\Models\Customer', 'customer_id');
    }
}
