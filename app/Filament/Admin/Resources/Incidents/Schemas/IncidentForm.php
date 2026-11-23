<?php

namespace App\Filament\Admin\Resources\Incidents\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
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
                    ->options([
                        'low' => 'Low',
                        'medium' => 'Medium',
                        'high' => 'High',
                        'critical' => 'Critical',
                    ])
                    ->required(),
                Repeater::make('attachments')->relationship()->schema([
                    FileUpload::make('file_path')
                        ->required()
                        ->disk('local')
                        ->directory('incident-attachments')
                        ->storeFileNamesIn('file_name')
                        ->openable()
                        ->downloadable(),
                ])->addActionLabel('Add attachment'),
            ]);
    }
}
