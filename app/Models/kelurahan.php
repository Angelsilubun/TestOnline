<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelurahan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'kecamatans';

    protected $guarded = [];

    public function kecamatan()
    {
        return $this->BelongsTo(kecamatan::class, 'id_kec', 'id');
    }
}
