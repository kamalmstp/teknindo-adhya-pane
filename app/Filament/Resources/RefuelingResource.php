<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RefuelingResource\Pages;
use App\Filament\Resources\RefuelingResource\RelationManagers;
use App\Models\Karyawan;
use App\Models\Refueling;
use App\Models\Unit;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RefuelingResource extends Resource
{
    protected static ?string $model = Refueling::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('unit_id')
                    ->label('Unit')
                    ->options(Unit::query()->pluck('kode_unit', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('karyawan_id')
                    ->label('Karyawan')
                    ->options(Karyawan::query()->pluck('nama', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\DatePicker::make('tanggal')->required(),
                Forms\Components\TimePicker::make('waktu')->nullable(),
                Forms\Components\TextInput::make('HM')->nullable(),
                Forms\Components\TextInput::make('KM')->nullable(),
                Forms\Components\TextInput::make('jumlah')->integer()->required(),
                Forms\Components\TextInput::make('fuelman')->nullable(),
                Forms\Components\TextInput::make('keterangan')->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('unit.kode_unit')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('karyawan.nama')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('tanggal')->date()->sortable()->searchable(),
                Tables\Columns\TextColumn::make('waktu')->time()->sortable()->searchable(),
                Tables\Columns\TextColumn::make('HM')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('KM')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('jumlah')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('fuelman')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('keterangan')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ManageRefuelings::route('/'),
        ];
    }
}
