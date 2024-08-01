<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserReservation extends Model
{
    use HasFactory;
    protected $fillable = [
                            'user_id', 
                            'shop_id',
                            'datetime',
                            'number',
                            'history_flg'
                        ]; 
    public function shop() : BelongsTo {
        return $this->belongsTo(Shop::class);
    }
}
