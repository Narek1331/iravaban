<?php

namespace App\Filament\Resources\Admin;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\{
    User,
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
    Select,
    FileUpload
};
use Filament\Tables\Columns\{
    TextColumn,
};
use Filament\Tables\Filters\{
    SelectFilter,
    Filter
};

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'Admin Users';

    protected static ?string $pluralLabel = 'Admin Users';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->columnSpan('full'),
                TextInput::make('email')
                    ->unique(User::class, 'email', fn ($record) => $record)
                    ->label('Email')
                    ->required()
                    ->columnSpan('full'),
                TextInput::make('password')
                    ->label('Password')
                    ->required()
                    ->password()
                    ->revealable()
                    ->hidden(function($record){
                        if($record && $record->id == auth()->user()->id)
                        {
                            return false;
                        }
                        else if($record){
                            return true;
                        }
                        return false;
                    })
                    ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label('Name')
                    ->formatStateUsing(function ($record) {
                        $name = $record->name;

                        if($record->id == auth()->user()->id)
                        {
                            $name .= ' (Its me)';
                        }

                        return $name;
                    }),
                TextColumn::make('email')
                    ->searchable()
                    ->sortable()
                    ->label('Email'),
                TextColumn::make('created_at')
                    ->sortable()
                    ->label('Registered'),
            ])
            ->filters([
                Filter::make('only_me')
                ->label('Show only me')
                ->toggle()
                ->query(function (Builder $query, array $data): Builder {
                    if(isset($data['isActive']) && $data['isActive'] == true){
                        $query = $query->where('id',auth()->user()->id);
                    }
                    return $query;
                })
            ])
            ->actions([
                Tables\Actions\EditAction::make()
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
            'index' => \App\Filament\Resources\Admin\UserResource\Pages\ListUsers::route('/'),
            'create' => \App\Filament\Resources\Admin\UserResource\Pages\CreateUser::route('/create'),
            'edit' => \App\Filament\Resources\Admin\UserResource\Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
