<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function reportedIncidents(): HasMany
    {
        return $this->hasMany(Incident::class, 'reported_by_id');
    }

    public function assignedIncidents(): HasMany
    {
        return $this->hasMany(Incident::class, 'assigned_by_id');
    }

    public function investigatingIncidents(): HasMany
    {
        return $this->hasMany(Incident::class, 'assigned_to_id');
    }

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class, 'created_by_id');
    }

    public function attachments(): HasMany
    {
        return $this->hasMany(Attachment::class, 'uploaded_by_id');
    }
}
