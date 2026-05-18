<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HaulingResource\Pages;
use App\Filament\Resources\HaulingResource\RelationManagers;
use App\Models\Hauling;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HaulingResource extends Resource
{
    protected static ?string $model = Hauling::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('unit_id')
                    ->relationship('unit', 'kode_unit')
                    ->required(),
                Forms\Components\Select::make('karyawan_id')
                    ->relationship('karyawan', 'nama')
                    ->required(),
                Forms\Components\TextInput::make('no_tiket')
                    ->required(),
                Forms\Components\DatePicker::make('tanggal')
                    ->required(),
                Forms\Components\TimePicker::make('jam_berangkat')
                    ->required(),
                Forms\Components\TimePicker::make('jam_tiba')
                    ->required(),
                Forms\Components\TextInput::make('pit')
                    ->maxLength(255),
                Forms\Components\TextInput::make('bruto')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('tara')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('netto')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('keterangan')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no_tiket')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('unit.kode_unit')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('karyawan.nama')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('tanggal')->date()->sortable()->searchable(),
                Tables\Columns\TextColumn::make('jam_berangkat')->time()->sortable()->searchable(),
                Tables\Columns\TextColumn::make('jam_tiba')->time()->sortable()->searchable(),
                // Tables\Columns\TextColumn::make('pit')->sortable()->searchable(),
                // Tables\Columns\TextColumn::make('bruto')->sortable()->searchable(),
                // Tables\Columns\TextColumn::make('tara')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('netto')->sortable()->searchable(),
                // Tables\Columns\TextColumn::make('keterangan')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
   Tables\Actions\DeleteAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageHaulings::route('/'),
        ];
    }
}
