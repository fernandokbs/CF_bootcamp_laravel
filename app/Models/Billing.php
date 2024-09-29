<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'address', 'dni', 'phone'];

    public function billingProducts()
    {
        return $this->hasMany(BillingProduct::class);
    }
}
