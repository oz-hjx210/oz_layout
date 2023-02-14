<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\RelationManagers;
use App\Models\News;
use Filament\Forms;
use Forms\Components;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

use Filament\Forms\Components\Tabs;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;
    protected static ?string $modelLabel = '最新消息';
    protected static ?string $navigationIcon = 'heroicon-s-newspaper';
    protected static ?string $navigationGroup = '最新消息';
    protected static ?int $navigationSort = 2;
    protected static bool $shouldRegisterNavigation = false;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('title')->required()->label('標題'),
                Forms\Components\Select::make('newstp_id')->required()->label('分類')
                    ->relationship('newstp', 'title'),
                Forms\Components\TextInput::make('sort_order')->label('排序（數字越大越前面）'),
                Forms\Components\Radio::make('ishome')
                    ->options([
                        '0' => '否',
                        '1' => '是',

                    ])->label('是否推薦首頁') ,
                Forms\Components\Textarea::make('meta_keyword')->label('Meta關鍵字') ,
                Forms\Components\Textarea::make('meta_description')->label('Meta描述'),
                Forms\Components\FileUpload::make('imgurl')->image()
                    ->imagePreviewHeight('150')->label('代錶圖(900x600 限2M)')
                  //  ->loadingIndicatorPosition('left')
                  //   ->panelAspectRatio('3:2')
                  //  ->panelLayout('integrated')
                  //->removeUploadedFileButtonPosition('right')
                  // ->uploadButtonPosition('left')
                  ->uploadProgressIndicatorPosition('left'),
                TinyEditor::make('html')->height(500)->showMenuBar()->label('詳細')->columnSpan('full'),
               //SpatieMediaLibraryFileUpload::make('imgurl'),


        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('標題')->sortable(),
                Tables\Columns\TextColumn::make('ishome')->enum([
                    '0' => '否',
                    '1' => '是',
                ])->sortable()->label('是否推薦首頁'),

                Tables\Columns\TextColumn::make('sort_order')->label('排序')->sortable(),
                Tables\Columns\TextColumn::make('updated_at')->label('最後修改時間')->sortable(),
            ])->defaultSort('sort_order','desc')
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
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}
