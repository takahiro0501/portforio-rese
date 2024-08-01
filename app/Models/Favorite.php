<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Favorite extends Model
{
    use HasFactory;
    protected $fillable = [
                            'user_id', 
                            'shop_id',
                        ]; 
    public function shop() : BelongsTo {
        return $this->belongsTo(Shop::class);
    }
}
