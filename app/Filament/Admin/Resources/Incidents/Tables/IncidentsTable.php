<?php

namespace App\Filament\Admin\Resources\Incidents\Tables;

use App\Filament\Admin\Resources\Incidents\IncidentResource;
use App\Filament\Admin\Resources\Users\UserResource;
use App\Models\Incident;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class IncidentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->recordUrl(
                fn (Incident $record) => IncidentResource::getUrl(
                    'view',
                    ['record' => $record]
                )
            )
            ->columns([
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('category.title')
                    ->searchable(),
                TextColumn::make('severity')
                    ->badge(),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('reporter.name')
                    ->label('Reported By')
                    ->sortable()->url(
                        fn (Incident $record) => UserResource::getUrl(
                            'view',
                            ['record' => $record->reported_by_id]
                        )
                    )
                    ->color('primary'),

                TextColumn::make('assigned_by_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('assigned_to_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
