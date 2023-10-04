<?php

namespace App\Enums;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum GreetingType: string implements EnumInterface, HasLabel, HasColor
{
    use EnumToArrayTrait;
    case MORNING = 'morning';
    case AFTERNOON = 'afternoon';
    case EVENING = 'evening';

    public function value(): string
    {
        return match($this)
        {
            self::MORNING => 'Buổi sáng',
            self::AFTERNOON => 'Buổi Chiều',
            self::EVENING => 'Buổi tối',
        };
    }

    public function getLabel(): string
    {
        return $this->value();
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::MORNING => 'success',
            self::AFTERNOON => 'warning',
            self::EVENING => 'danger',
        };
    }
}
