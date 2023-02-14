<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdResource\Pages;
use App\Filament\Resources\ProdResource\RelationManagers;
use App\Models\Prod;
use Filament\Forms;
use Forms\Components;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\Filter;

use Filament\Forms\Components\Tabs;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;
class ProdResource extends Resource
{
    protected static ?string $model = Prod::class;
    protected static ?string $modelLabel = '產品';
    protected static ?string $navigationIcon = 'heroicon-s-view-list';
    protected static ?string $navigationGroup = '產品管理';
    protected static ?int $navigationSort = 3;
    protected static bool $shouldRegisterNavigation = false;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('title')->required()->label('產品名稱'),
                Forms\Components\Select::make('prodtp_id')->required()->label('分類')
                    ->relationship('prodtp', 'title')->searchable()->preload(),
                Forms\Components\Textarea::make('meta_keyword')->label('Meta關鍵字') ,
                Forms\Components\Textarea::make('meta_description')->label('Meta描述'),
                Forms\Components\Textarea::make('note')->label('商品簡述')->columnSpan('full'),
                Forms\Components\TextInput::make('sort_order')->label('排序（數字越大越前面）'),
                Forms\Components\Radio::make('ishome')
                    ->options([
                        '0' => '否',
                        '1' => '是',

                    ])->label('是否推薦首頁') ,
                TinyEditor::make('html')->height(500)->showMenuBar()->label('商品詳情')->columnSpan('full'),
                TinyEditor::make('html2')->height(500)->showMenuBar()->label('商品規格')->columnSpan('full'),

                Forms\Components\FileUpload::make('imgurl')->image()
                    ->multiple()
                    ->imagePreviewHeight('150')
                  //  ->loadingIndicatorPosition('left')
                  //   ->panelAspectRatio('3:2')
                  //  ->panelLayout('integrated')
                  //->removeUploadedFileButtonPosition('right')
                  // ->uploadButtonPosition('left')
                 // ->uploadProgressIndicatorPosition('left')
                  ->label('多圖上傳(900x600 限2M)'),
               // Forms\Components\RichEditor::make('html')->required()
                //     ->label('詳細')->columnSpan('full'),
               //SpatieMediaLibraryFileUpload::make('imgurl'),


        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('產品名稱')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('prodtp.title')->label('分類名稱')->sortable(),
                 Tables\Columns\TextColumn::make('ishome')->enum([
                    '0' => '否',
                    '1' => '是',
                 ])->sortable()->label('是否推薦首頁'),
                Tables\Columns\TextColumn::make('sort_order')->label('排序')->sortable(),
                Tables\Columns\TextColumn::make('updated_at')->label('最後修改時間')->sortable(),
            ])->defaultSort('sort_order','desc')
            ->defaultSort('sort_order','desc'  )
            ->filters([
                Tables\Filters\SelectFilter::make('prodtp')->relationship('prodtp', 'title')->label('分類過濾')

            ])
            ->actions([

                  //  Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),

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
            'index' => Pages\ListProd::route('/'),
            'create' => Pages\CreateProd::route('/create'),
            'edit' => Pages\EditProd::route('/{record}/edit'),
        ];
    }
}
