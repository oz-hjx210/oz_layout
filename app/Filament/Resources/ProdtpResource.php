<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdtpResource\Pages;
use App\Filament\Resources\ProdtpResource\RelationManagers;
use App\Models\Prodtp;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProdtpResource extends Resource
{
    protected static ?string $model = Prodtp::class;
    protected static ?string $modelLabel = '產品分類';
    protected static ?string $navigationIcon = 'heroicon-s-pencil-alt';
    protected static ?string $navigationGroup = '產品管理';
    protected static bool $shouldRegisterNavigation = false;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required()->label('標題'),
               // Forms\Components\Select::make('pid')->label('上級分類')->relationship('parent', 'title')->preload(),
                Forms\Components\RichEditor::make('note')->required()->label('描述')->columnSpan('full'),
                Forms\Components\TextInput::make('sort_order')->label('排序（數字越大越前面）'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('標題')->sortable(),
                //Tables\Columns\TextColumn::make('parent.title')->label('上級分類')->sortable(),
                Tables\Columns\TextColumn::make('sort_order')->label('排序')->sortable(),
                Tables\Columns\TextColumn::make('updated_at')->label('最後修改時間')->sortable(),

            ])->defaultSort('sort_order','desc'  )
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
            'index' => Pages\ListProdtps::route('/'),
            'create' => Pages\CreateProdtp::route('/create'),
            'edit' => Pages\EditProdtp::route('/{record}/edit'),
        ];
    }
}
