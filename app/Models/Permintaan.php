<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Permintaan extends Model
{

    protected $fillable =['barang_id','jumlah','user_id','status','accepted_at','checked'];
    public function barang(): BelongsTo
    {

        return $this->belongsTo(Barang::class)->withTrashed();
    }

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
}
