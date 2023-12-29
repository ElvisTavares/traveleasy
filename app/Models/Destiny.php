<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Destiny extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'location',
    ];

    /**
     * @return BelongsToMany
     */
    public function travel(): BelongsToMany
    {
        return $this->belongsToMany(Travel::class, 'travel_destinies', 'destinies_id', 'travel_id');
    }
}
