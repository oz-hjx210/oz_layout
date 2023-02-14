<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ModuletpResource\Pages;
use App\Filament\Resources\ModuletpResource\RelationManagers;
use App\Models\Moduletp;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ModuletpResource extends Resource
{
    protected static ?string $model = Moduletp::class;

    protected static ?string $modelLabel = '模塊分類';
    protected static ?string $navigationIcon = 'heroicon-s-pencil-alt';
    protected static ?string $navigationGroup = '模塊管理';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required()->label('標題'),
              //  Forms\Components\FileUpload::make('imgurl')->image()
                  //  ->imagePreviewHeight('250')->columnSpan('full')
                    //  ->loadingIndicatorPosition('left')
                    //   ->panelAspectRatio('3:2')
                    //  ->panelLayout('integrated')
                    //->removeUploadedFileButtonPosition('right')
                    // ->uploadButtonPosition('left')
                    // ->uploadProgressIndicatorPosition('left')
                  //  ->label('預覽圖（1900x3500 限2M）'),

                // Forms\Components\RichEditor::make('note')->required()->label('描述')->columnSpan('full'),
                Forms\Components\TextInput::make('sort_order')->label('排序（數字越大越前面）'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('標題')->sortable(),
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
            'index' => Pages\ListModuletps::route('/'),
            'create' => Pages\CreateModuletp::route('/create'),
            'edit' => Pages\EditModuletp::route('/{record}/edit'),
        ];
    }
}
