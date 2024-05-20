<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApartmentRequest extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'apartment_requests';

    public function complex(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Complex::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
