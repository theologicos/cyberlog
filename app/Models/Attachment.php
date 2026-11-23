<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['file_path'])]
class Attachment extends Model
{
    use HasFactory;

    public function reporter(): BelongsTo
    {
        return $this->belongsTo(Incident::class);
    }
}
