<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client_list extends Model
{
    use HasFactory;

     public function billingList()
    {
        return $this->hasMany(Billing_list::class, 'clientid', 'id');
    }
}
