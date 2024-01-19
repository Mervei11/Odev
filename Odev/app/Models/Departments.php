<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    use HasFactory;

    /**
     * Mass assignment için izin verilen sütunlar.
     *
     * @var array
     */
    protected $fillable = [
        'kadro_adi_kisaltma',
        'kadro_adi',
        'görev_unvani',
        'durum',
    ];
}
