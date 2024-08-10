<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerImageResource\Pages;
use App\Filament\Resources\BannerImageResource\RelationManagers;
use App\Models\BannerImage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\{
    Card,
    FileUpload
};
use Filament\Tables\Columns\{
    ImageColumn,
};
class BannerImageResource extends Resource
{
    protected static ?string $model = BannerImage::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()
                ->schema([
                    FileUpload::make('img_path')
                    // ->directory()
                    ->label('Image')
                    ->acceptedFileTypes(['image/svg', 'image/png', 'image/jpeg', 'image/jpg', 'image/gif'])
                ])
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->reorderable('order_by')
            ->columns([
                ImageColumn::make('img_path')
                    ->label('Image')
                    ->width(200)
                    ->height(200)
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
            ])
            ->defaultSort('order_by', 'asc');
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
            'index' => Pages\ListBannerImages::route('/'),
            'create' => Pages\CreateBannerImage::route('/create'),
            'edit' => Pages\EditBannerImage::route('/{record}/edit'),
        ];
    }
}
