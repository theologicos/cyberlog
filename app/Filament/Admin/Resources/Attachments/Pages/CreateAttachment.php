<?php

namespace App\Filament\Admin\Resources\Attachments\Pages;

use App\Filament\Admin\Resources\Attachments\AttachmentResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAttachment extends CreateRecord
{
    protected static string $resource = AttachmentResource::class;
}
