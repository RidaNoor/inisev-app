<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Post;
use App\Models\User;

class Website extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'url',
    ];

    /**
     * The posts that belong to the website.
     */
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }

    /**
     * The subscribers that belong to the website.
     */
    public function subscribers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'subscriptions', 'website_id', 'user_id');
    }
}
