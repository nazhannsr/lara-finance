<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id', 'customer_id', 'payment_number', 'payment', 'payment_type', 'payment_status'
    ];

    public function transaction(){
        return $this->belongsTo('App\Models\Transaction', 'transaction_id');
    }
}
