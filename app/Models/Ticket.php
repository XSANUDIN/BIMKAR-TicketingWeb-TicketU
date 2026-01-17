<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'event_id',
        'tipe',
        'harga',
        'stok',
    ];

    public function event(){
        return $this->belongsTo(Event::class);
    }

    public function detailOrder(){
        return $this->hasMany(OrderDetail::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class, 'order_details')
            ->withPivot('jumlah', 'subtotal_harga');
    }
}
