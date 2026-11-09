<?php

namespace App;

use Filament\Support\Contracts\HasColor;

enum IncidentSeverity: string implements HasColor
{
    case Low = 'low';
    case Medium = 'medium';
    case High = 'high';
    case Critical = 'critical';

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Low => 'success',
            self::Medium => 'info',
            self::High => 'warning',
            self::Critical => 'danger',
        };
    }
}
