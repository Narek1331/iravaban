<?php

namespace App\Filament\Resources\Services;

use App\Filament\Resources\Services\LegalServiceResource\Pages;
use App\Filament\Resources\Services\LegalServiceResource\RelationManagers;
use App\Models\{
    Service,
    Language
};
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
class LegalServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';

    protected static ?string $navigationLabel = 'Services';

    // protected static ?string $navigationGroup = 'Services';

    // protected static ?string $pluralLabel = 'Legal Services';
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
                            ->content(function($record,$state){
                                if($record && isset($record['name']))
                                {
                                    return $record['name'];
                                }else if($state && isset($state['name']))
                                {
                                    return $state['name'];
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
                                ->maxLength(1000)
                                ->columnSpan('full'),
                        ])
                        ->default(Language::get()->toArray())
                        ->columnSpan('full')
                        ->addable(false)
                        ->deletable(false)
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->reorderable('order_by')
            ->columns([
                TextColumn::make('languages')
                    ->label('Title')
                    ->getStateUsing(function($record){
                        if(isset($record->languages))
                        {
                            return $record->languages()->pluck('title');
                        }

                        return null;
                    })
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([])
            ->defaultSort('order_by', 'asc');
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('type', 'legal');
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
            'index' => Pages\ListLegalServices::route('/'),
            'create' => Pages\CreateLegalService::route('/create'),
            'edit' => Pages\EditLegalService::route('/{record}/edit'),
        ];
    }
}
