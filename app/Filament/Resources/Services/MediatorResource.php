<?php

namespace App\Filament\Resources\Services;

use App\Filament\Resources\Services\MediatorResource\Pages;
use App\Filament\Resources\Services\MediatorResource\RelationManagers;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\{
    TextInput,
    Fieldset,
    Repeater,
    Textarea,
    Card,
    Placeholder,
    FileUpload
};
use Filament\Tables\Columns\{
    TextColumn,
};
class MediatorResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationLabel = 'Mediator Services';

    protected static ?string $navigationGroup = 'Services';

    protected static ?string $pluralLabel = 'Mediator Services';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        FileUpload::make('img_path')
                        // ->directory()
                        ->label('Image')
                        ->acceptedFileTypes(['image/svg', 'image/png', 'image/jpeg', 'image/jpg', 'image/gif']),
                    Repeater::make('Languages')
                        ->relationship('languages')
                        ->schema([
                            Placeholder::make('')
                            ->content(function($record){
                                if($record && isset($record['name']))
                                {
                                    return $record['name'];
                                }
                            })
                            ->hiddenLabel(true),
                            TextInput::make('title')
                                ->label('Title')
                                ->required()
                                ->maxLength(255)
                                ->columnSpan('full'),
                            Textarea::make('description')
                                ->label('Description')
                                ->required()
                                ->maxLength(10000)
                                ->columnSpan('full'),
                        ])
                        ->columnSpan('full')
                        ->addable(false)
                        ->deletable(false)
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('type')
                    ->label('Type')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([]);
    }


    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('type', 'mediator');
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
            'index' => Pages\ListMediators::route('/'),
            // 'create' => Pages\CreateMediator::route('/create'),
            'edit' => Pages\EditMediator::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDelete($record): bool
    {
        return false;
    }

    public static function canDeleteAny(): bool
    {
        return false;
    }
}
