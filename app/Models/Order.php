<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'customerName',
        'productName',
        'phone',
        'deliveryDate',
        'getItNow',
        'amount',
        'email',
        'zalo',
        'quoteWith',
        'width',
        'height',
        'material',
        'payment',
        'note',
    ];
}
