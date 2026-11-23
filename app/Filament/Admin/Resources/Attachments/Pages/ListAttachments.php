<?php

namespace App\Filament\Admin\Resources\Attachments\Pages;

use App\Filament\Admin\Resources\Attachments\AttachmentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAttachments extends ListRecords
{
    protected static string $resource = AttachmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
