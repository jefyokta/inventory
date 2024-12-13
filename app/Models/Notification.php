<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model
{
    //

    protected $fillable = ['permintaan_id', 'message','created_at'];


    public function permintaan(): BelongsTo
    {
        return $this->belongsTo(Permintaan::class);
    }
}
