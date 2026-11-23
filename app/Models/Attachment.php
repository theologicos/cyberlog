<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Override;

#[Fillable([
    'file_path',
    'file_name',
    'file_size',
    'mime_type',
    'uploaded_by_id',
])]
class Attachment extends Model
{
    use HasFactory;

    #[Override]
    protected static function booted(): void
    {
        static::creating(function (Attachment $attachment) {
            $attachment->uploaded_by_id ??= auth()->id();
        });

        static::created(function (Attachment $attachment) {
            $disk = Storage::disk('local');

            $attachment->update([
                'mime_type' => $disk->mimeType($attachment->file_path),
                'file_size' => $disk->size($attachment->file_path),
            ]);
        });
    }

    public function incident(): BelongsTo
    {
        return $this->belongsTo(Incident::class);
    }
}
