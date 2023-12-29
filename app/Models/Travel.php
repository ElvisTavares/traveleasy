<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Travel extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'departure_date',
        'return_date',
        'means_of_transport',
        'accommodation',
        'budget',
    ];

    /**
     * @return BelongsToMany
     */
    public function destinies(): BelongsToMany
    {
        return $this->belongsToMany(Destiny::class, 'travel_destinies', 'travel_id', 'destinies_id');
    }
}
