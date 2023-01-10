<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;

class Lesson extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title',
        'credits',
        'hours',
        'body',
    ];

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function year(): BelongsTo
    {
        return $this->belongsTo(Year::class);
    }

    /**
     * @return BelongsToMany
     */
    public function quarters(): BelongsToMany
    {
        return $this->belongsToMany(Quarter::class);
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();
        $users = $this->users->map(function ($user) {
            return [
            'name' => $user->name,
            'username' => $user->username,
        ];
        });
        $array['users'] = $users->toArray();

        return $array;
    }
}
