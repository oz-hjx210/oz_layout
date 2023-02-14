<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ModuleResource\Pages;
use App\Filament\Resources\ModuleResource\RelationManagers;
use App\Models\Module;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;
use FilamentEditorJs\Forms\Components\EditorJs;
use FilamentTiptapEditor\TiptapEditor;



class ModuleResource extends Resource
{
    protected static ?string $model = Module::class;

    protected static ?int $navigationSort = 2;
    protected static ?string $modelLabel = '模塊管理';
    protected static ?string $navigationIcon = 'heroicon-s-pencil-alt';
    protected static ?string $navigationGroup = '模塊管理';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required()->label('標題'),
                Forms\Components\Select::make('moduletp_id')->required()->label('分類')
                    ->relationship('moduletp', 'title'),
               // Forms\Components\RichEditor::make('html')->required()->label('詳細')->columnSpan('full'),

              // EditorJs::make('html')->label('詳細')->columnSpan('full'),
                Forms\Components\MarkdownEditor::make('html')->label('詳細')->columnSpan('full'),
               // TiptapEditor::make('html')->label('詳細')->columnSpan('full'),
                TinyEditor::make('imgs')->height(500)->profile('simple')->label('上傳引用圖片')->columnSpan('full'),
                Forms\Components\TextInput::make('sort_order')->label('排序（數字越大越前面）'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('moduletp.title')->label('分類名稱')->sortable()->searchable(),

                Tables\Columns\TextColumn::make('title')->label('標題')->sortable(),

                Tables\Columns\TextColumn::make('sort_order')->label('排序')->sortable(),
                Tables\Columns\TextColumn::make('updated_at')->label('最後修改時間')->sortable(),

            ])->defaultSort('sort_order','desc'  )

            ->filters([
                Tables\Filters\SelectFilter::make('moduletp')->relationship('moduletp', 'title')->label('分類過濾')

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
            'index' => Pages\ListModules::route('/'),
            'create' => Pages\CreateModule::route('/create'),
            'edit' => Pages\EditModule::route('/{record}/edit'),
        ];
    }
}
