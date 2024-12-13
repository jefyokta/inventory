<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peminjaman extends Model
{
    protected $fillable  = ['user_id', 'barang_id', 'jumlah', 'returned_at', 'borrowed_at'];
    public $timestamps = true;
    protected $table = 'peminjamans';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function barang(): BelongsTo
    {

        return $this->belongsTo(Barang::class)->withTrashed();
    }
}
