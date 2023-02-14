<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WebpageResource\Pages;
use App\Filament\Resources\WebpageResource\RelationManagers;
use App\Models\Webpage;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class WebpageResource extends Resource
{
    protected static ?string $model = Webpage::class;
    protected static ?string $modelLabel = '靜態頁';
    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    public static function canCreate(): bool
    {
        return false;
    }
    public static function canDeleteAny(): bool
    {
        return false;
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required()->label('標題'),
                Forms\Components\TextInput::make('sort_order')->required()->label('排序'),
               // TinyEditor::make('html')->height(500)->showMenuBar()->label('詳細')->columnSpan('full'),
                Forms\Components\MarkdownEditor::make('html')->label('詳細')->columnSpan('full'),


                //SpatieMediaLibraryFileUpload::make('imgurl'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('標題')->sortable(),
                Tables\Columns\TextColumn::make('sort_order')->label('排序（數字越大越前面）')->sortable(),
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
            'index' => Pages\ListWebpages::route('/'),
            'create' => Pages\CreateWebpage::route('/create'),
            'edit' => Pages\EditWebpage::route('/{record}/edit'),
        ];
    }
}
