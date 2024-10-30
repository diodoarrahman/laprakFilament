<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KosanResource\Pages;
use App\Filament\Resources\KosanResource\RelationManagers;
use App\Models\Kosan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KosanResource extends Resource
{
    protected static ?string $model = Kosan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_kosan'),
                Forms\Components\TextInput::make('alamat_kosan'),
                Forms\Components\Select::make('jenis_kosan')->options(['Putra', 'Putri', 'Campur']),
                Forms\Components\TextInput::make('harga_sewa'),
                Forms\Components\TextInput::make('kamar_kosong'),
                Forms\Components\Radio::make('tersedia')->boolean(),
                Forms\Components\FileUpload::make('foto_kosan'),
                Forms\Components\Select::make('penulis_id')
    ->relationship('pemiliks', 'nama')
    ->searchable()
    ->preload()
    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_kosan'),
                Tables\Columns\TextColumn::make('alamat_kosan'),
                Tables\Columns\TextColumn::make('jenis_kosan'),
                Tables\Columns\TextColumn::make('harga_sewa'),
                Tables\Columns\TextColumn::make('kamar_kosong'),
                Tables\Columns\TextColumn::make('tersedia'),
                Tables\Columns\TextColumn::make('fotos_kosan'),
                Tables\Columns\TextColumn::make('pemilik_id'),
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
            'index' => Pages\ListKosans::route('/'),
            'create' => Pages\CreateKosan::route('/create'),
            'edit' => Pages\EditKosan::route('/{record}/edit'),
        ];
    }
}
