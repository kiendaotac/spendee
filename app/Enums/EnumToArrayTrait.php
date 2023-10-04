<?php

namespace App\Enums;

trait EnumToArrayTrait
{
    public static function toArrayValue(): array
    {
        return array_map(fn($item) => $item->value, self::cases());
    }
    public static function toArrayName(): array
    {
        return array_map(fn($item) => $item->name, self::cases());
    }
    public function toArray(): array
    {
        return self::toArrayValue();
    }

    public static function toKeyValueArray(): array
    {
        $array = [];
        foreach (self::cases() as $enum) {
            $array[$enum->value] = $enum->value();
        }

        return $array;
    }
}