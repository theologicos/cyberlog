<?php

namespace App\Filament\Admin\Resources\Incidents\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class IncidentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                Select::make('category_id')
                    ->relationship('category', 'title')
                    ->default(null),
                Select::make('severity')
                    ->options(['low' => 'Low', 'medium' => 'Medium', 'high' => 'High', 'critical' => 'Critical'])
                    ->required(),
                Select::make('status')
                    ->options([
            'open' => 'Open',
            'assigned' => 'Assigned',
            'investigating' => 'Investigating',
            'resolved' => 'Resolved',
            'closed' => 'Closed',
        ])
                    ->required(),
                TextInput::make('reported_by_id')
                    ->required()
                    ->numeric(),
                TextInput::make('assigned_by_id')
                    ->numeric()
                    ->default(null),
                TextInput::make('assigned_to_id')
                    ->numeric()
                    ->default(null),
            ]);
    }
}
