<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;

use App\Models\Project;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;


    protected static ?string $modelLabel = '案例分享';
    protected static ?int $navigationSort = 6;

    protected static ?string $navigationIcon = 'heroicon-o-photograph';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required()->label('標題'),
                Forms\Components\TextInput::make('link')->label('連結'),

                Forms\Components\FileUpload::make('imgurl')->image()
                    ->imagePreviewHeight('250')->columnSpan('full')
                    //  ->loadingIndicatorPosition('left')
                    //   ->panelAspectRatio('3:2')
                    //  ->panelLayout('integrated')
                    //->removeUploadedFileButtonPosition('right')
                    // ->uploadButtonPosition('left')
                    // ->uploadProgressIndicatorPosition('left')
                    ->label('圖片（2000x1125 限2M）'),
                Forms\Components\Textarea::make('note')
                    ->label('描述')->columnSpan('full'),
                Forms\Components\TextInput::make('sort_order')->required()->label('排序（數字越大越前面）'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('imgurl')
                    ->size(80)
                    // ->width(200)->height(100)
                    ->label('圖片'),
                Tables\Columns\TextColumn::make('title')->label('標題')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('sort_order')->label('排序')->sortable(),
                Tables\Columns\TextColumn::make('updated_at')->label('最後修改時間')->sortable(),
            ])
            ->defaultSort('sort_order','desc'  )

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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
