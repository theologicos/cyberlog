<?php

namespace App\Models;

use App\IncidentSeverity;
use App\IncidentStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Override;

#[Fillable([
    'title',
    'description',
    'category_id',
    'severity',
    'status',
    'reported_by_id',
    'assigned_by_id',
    'assigned_to_id',
])]
class Incident extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'severity' => IncidentSeverity::class,
            'status' => IncidentStatus::class,
        ];
    }

    #[Override]
    protected static function booted()
    {
        static::creating(function (Incident $incident) {
            $incident->reported_by_id = auth()->id();
            $incident->status = IncidentStatus::Open;
            $incident->assigned_by_id = null;
            $incident->assigned_to_id = null;
        });
    }

    public function reporter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reported_by_id');
    }

    public function assigner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_by_id');
    }

    public function investigator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function attachments(): HasMany
    {
        return $this->hasMany(Attachment::class);
    }
}
