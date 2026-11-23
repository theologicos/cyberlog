<?php

namespace App\Filament\Admin\Resources\Attachments;

use App\Filament\Admin\Resources\Attachments\Pages\CreateAttachment;
use App\Filament\Admin\Resources\Attachments\Pages\EditAttachment;
use App\Filament\Admin\Resources\Attachments\Pages\ListAttachments;
use App\Filament\Admin\Resources\Attachments\Pages\ViewAttachment;
use App\Filament\Admin\Resources\Attachments\Schemas\AttachmentForm;
use App\Filament\Admin\Resources\Attachments\Schemas\AttachmentInfolist;
use App\Filament\Admin\Resources\Attachments\Tables\AttachmentsTable;
use App\Models\Attachment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AttachmentResource extends Resource
{
    protected static ?string $model = Attachment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = null;

    // public static function getRecordTitle(Attachment $record): string
    // {
    //     return $record?->title ?? $record?->file_name ?? 'Untitled';
    // }

    public static function form(Schema $schema): Schema
    {
        return AttachmentForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AttachmentInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AttachmentsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAttachments::route('/'),
            'create' => CreateAttachment::route('/create'),
            'view' => ViewAttachment::route('/{record}'),
            'edit' => EditAttachment::route('/{record}/edit'),
        ];
    }
}
