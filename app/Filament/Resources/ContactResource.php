<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Filament\Resources\ContactResource\RelationManagers;
use App\Models\Contact;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;
    protected static ?string $modelLabel = '聯絡我們';
    protected static ?int $navigationSort = 6;
    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationIcon = 'heroicon-o-mail-open';
    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required()->label('姓名'),
                Forms\Components\TextInput::make('company')->label('公司名稱'),
                Forms\Components\TextInput::make('tel')->label('聯絡電話'),
                Forms\Components\TextInput::make('email')->label('Email'),
                Forms\Components\TextInput::make('subject')->label('主題'),

                 Forms\Components\Textarea::make('content')
                    ->label('描述')->columnSpan('full'),
             ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                 Tables\Columns\TextColumn::make('name')->label('姓名')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('company')->label('公司名稱')->sortable(),
                Tables\Columns\TextColumn::make('tel')->label('聯絡電話')->sortable(),
                Tables\Columns\TextColumn::make('email')->label('Email')->sortable(),
                Tables\Columns\TextColumn::make('created_at')->label('留言時間')->sortable(),
            ])->defaultSort('created_at','desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
