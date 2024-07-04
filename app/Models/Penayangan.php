<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penayangan extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'penayangan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'waktu_tayang', 
        'film_id',
        'bioskop_id',
        'teater_id',
        'harga_tiket',
        'status'
    ];

    public function film()
    {
        return $this->hasOne(Film::class);
    }

    public function bioskop()
    {
        return $this->hasOne(Bioskop::class);
    }

    public function teater()
    {
        return $this->hasOne(Teater::class);
    }
}
