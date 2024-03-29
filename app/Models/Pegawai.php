<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use App\Models\User;
use App\Models\Alamat;

class Pegawai extends Model
{
    use HasFactory, Sortable;

    protected $table = 'pegawai';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'alamat_id',
        'jabatan',
        'jumlah_order'
    ];

    public $sortable = ['user.nama_depan', 'user.nama_belakang', 'jabatan', 'jumlah_order'];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function alamat(): BelongsTo{
        return $this->belongsTo(Alamat::class);
    }
}
