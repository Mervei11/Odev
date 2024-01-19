<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shifts extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "shifts";

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sicil',
        'gün',
        'saat',
        'bölge',
    ];

    /**
     * Çalışanı temsil eden ilişki.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employees::class, 'sicil', 'sicil_no');
    }

    /**
     * İlgili vardiyanın bağlı olduğu vardiyayı temsil eden ilişki.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shifts()
    {
        return $this->belongsTo(Shifts::class, 'sicil', 'sicil_no');
    }
}
