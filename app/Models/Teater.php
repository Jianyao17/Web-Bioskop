<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teater extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'teater_bioskop';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_teater', 
        'bioskop_id',
        'list_kursi',
        'kapasitas',
        'status'
    ];

    public function bioskop()
    {
        return $this->belongsTo(Bioskop::class);
    }
}
