<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Shop extends Model
{
    use HasFactory;

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }
    public function shopFood() : HasOne {
        return $this->HasOne(ShopFood::class);
    }
    public function shopLimit() : HasOne {
        return $this->HasOne(ShopLimit::class);
    }
    public function shopReservation() : HasOne {
        return $this->HasOne(ShopReservation::class);
    }
}
