<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingProduct extends Model
{
    use HasFactory;
    protected $table = 'billing_products';
    protected $fillable = ['name', 'price', 'quantity', 'billing_id'];

    public function billing()
    {
        return $this->belongsTo(Billing::class);
    }
}
