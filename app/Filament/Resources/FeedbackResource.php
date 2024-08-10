<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeedbackResource\Pages;
use App\Filament\Resources\FeedbackResource\RelationManagers;
use App\Models\Feedback;
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
    Textarea,
    Card,
    Placeholder,
};
use Filament\Tables\Columns\{
    TextColumn,
};
class FeedbackResource extends Resource
{
    protected static ?string $model = Feedback::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope-open';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()
            ->schema([
                Placeholder::make('name')
                    ->label('Name')
                    ->content(function($record){
                        if($record && isset($record['name']))
                        {
                            return $record['name'];
                        }
                    })
                    ->columnSpan('full'),
                    Placeholder::make('email')
                    ->label('Email')
                    ->content(function($record){
                        if($record && isset($record['email']))
                        {
                            return $record['email'];
                        }
                    })
                    ->columnSpan('full'),
                    // Placeholder::make('title')
                    // ->label('Title')
                    // ->content(function($record){
                    //     if($record && isset($record['title']))
                    //     {
                    //         return $record['title'];
                    //     }
                    // })
                    // ->columnSpan('full'),
                    Placeholder::make('created_at')
                        ->label('Created Date')
                        ->content(function($record){
                            if($record && isset($record['created_at']))
                            {
                                return $record['created_at'];
                            }
                        })
                        ->columnSpan('full'),
                    Textarea::make('text')
                        ->rows(10)
                        ->required()
                        ->label('Message')
                        ->columnSpan('full')
                        ->maxLength(2000),
            ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label('Name'),
                TextColumn::make('email')
                    ->searchable()
                    ->sortable()
                    ->label('Email'),
                // TextColumn::make('title')
                //     ->searchable()
                //     ->sortable()
                //     ->label('Title'),
                TextColumn::make('text')
                    ->searchable()
                    ->sortable()
                    ->label('Message'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                    ->modalHeading('Delete')
                ]),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListFeedback::route('/'),
            'view' => Pages\ViewFeedback::route('/{record}'),
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
