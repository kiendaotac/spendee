<?php

namespace App\Filament\Resources\GreetingResource\Pages;

use App\Filament\Resources\GreetingResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateGreeting extends CreateRecord
{
    protected static string $resource = GreetingResource::class;
    public function getBreadcrumb(): string
    {
        return __('Tạo lời chào');
    }

    public function getTitle(): string|Htmlable
    {
        return __('Tạo lời chào');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return __('Tạo lời chào thành công');
    }
}
