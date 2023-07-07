<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client_list;

class Billing_list extends Model
{
    use HasFactory;

    public function client()
    {
        return $this->belongsTo(Client_list::class, 'clientid', 'id');
    }
}
