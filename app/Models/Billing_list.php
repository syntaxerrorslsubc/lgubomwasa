<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client_list;
use App\Models\Category_list;
use App\Models\Billing_list;

class Billing_list extends Model
{
    use HasFactory;

    public function client()
    {
        return $this->belongsTo(Client_list::class, 'clientid', 'id');
    }

    public function rate()
    {
        return $this->belongsTo(Category_list::class, 'rate', 'id');
    }

    
}
