<?php

namespace App\Filament\Resources;

use App\Enums\GreetingType;
use App\Filament\Resources\GreetingResource\Pages;
use App\Filament\Resources\GreetingResource\RelationManagers;
use App\Models\Greeting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GreetingResource extends Resource
{
    protected static ?string $model = Greeting::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    /**
     * @return string|null
     */
    public static function getPluralLabel(): ?string
    {
        return __('Lời chào');
    }

    public static function getModelLabel(): string
    {
        return __('Lời chào');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('type')
                    ->options(GreetingType::class)
                    ->columnSpanFull()
                    ->placeholder(__('Chọn loại lời chào'))
                    ->label(__('Loại lời chào'))
                    ->required(),
                Forms\Components\Textarea::make('greeting')
                    ->columnSpanFull()
                    ->rows(7)
                    ->label(__('Nội dung lời chào'))
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        dd(GreetingType::EVENING->getColor());
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')->label('Loại lời chào')
                    ->color(GreetingType::class),
                Tables\Columns\TextColumn::make('greeting')->label('Nội dung')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListGreetings::route('/'),
            'create' => Pages\CreateGreeting::route('/create'),
            'edit' => Pages\EditGreeting::route('/{record}/edit'),
        ];
    }    
}
