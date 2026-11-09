<?php

namespace App;

use Filament\Support\Contracts\HasColor;

enum IncidentStatus: string implements HasColor
{
    case Open = 'open';
    case Assigned = 'assigned';
    case Investigating = 'investigating';
    case Resolved = 'resolved';
    case Closed = 'closed';

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Open => 'info',
            self::Assigned => 'warning',
            self::Investigating => 'primary',
            self::Resolved => 'success',
            self::Closed => 'gray',
        };
    }
}
