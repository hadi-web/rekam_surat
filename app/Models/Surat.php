<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Surat extends Model
{
    use SoftDeletes; // hapus data sementara
    // protected $guarded = [];
    protected $table='surats';
    protected $primaryKey = 'id';
    protected $fillable = ['id','nomor_surat',
    'tanggal_surat','pengirim','data_file'];
}
