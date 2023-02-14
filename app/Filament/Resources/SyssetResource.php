<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SyssetResource\Pages;
use App\Filament\Resources\SyssetResource\RelationManagers;
use App\Models\Sysset;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class SyssetResource extends Resource
{
    protected static ?string $model = Sysset::class;
    protected static ?string $modelLabel = '網站設定';
    protected static ?int $navigationSort = 7;
    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static bool $shouldRegisterNavigation = false;
    public static function canCreate(): bool
    {
        return false;
    }
    public static function canDeleteAny(): bool
    {
        return false;
    }
    public static function canDelete($record): bool
    {
        return false;
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('sname')->disabled()->label(''),
                Forms\Components\Hidden::make('skey')->disabled()->label('設定KEY'),
                Forms\Components\Textarea::make('sval')->label('')->columnSpan(2),
     //           Forms\Components\TextInput::make('sort_order')->label('排序'),


                //SpatieMediaLibraryFileUpload::make('imgurl'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sname')->label('名稱')->sortable(),
                Tables\Columns\TextColumn::make('sval')->label('設定')->limit(60)->sortable(),
 //               Tables\Columns\TextColumn::make('sort_order')->label('排序')->sortable(),
                Tables\Columns\TextColumn::make('updated_at')->label('最後修改時間')->sortable(),
            ])->defaultSort('id' )
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
            'index' => Pages\ListSyssets::route('/'),
            'create' => Pages\CreateSysset::route('/create'),
            'edit' => Pages\EditSysset::route('/{record}/edit'),
        ];
    }
}
