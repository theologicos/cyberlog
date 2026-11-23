<?php

namespace App\Filament\Admin\Resources\Attachments\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AttachmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('incident_id')
                    ->required()
                    ->numeric(),
                TextInput::make('uploaded_by_id')
                    ->required()
                    ->numeric(),
                TextInput::make('title')
                    ->default(null),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('file_name')
                    ->required(),
                TextInput::make('file_path')
                    ->required(),
                TextInput::make('mime_type')
                    ->required(),
                TextInput::make('file_size')
                    ->required()
                    ->numeric(),
            ]);
    }
}
