<?php

declare(strict_types=1);

namespace App\Models;

use App\Builders\ProfileBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    /**
     * @param [type] $query
     * @return ProfileBuilder
     */
    public function newEloquentBuilder($query): ProfileBuilder
    {
        return new ProfileBuilder($query);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
