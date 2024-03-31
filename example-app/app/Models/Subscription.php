<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subscription extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'website_id',
    ];

    /**
     * The users that belong to the user.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(Website::class, 'subscriptions', 'website_id', 'user_id');
    }
    
}
