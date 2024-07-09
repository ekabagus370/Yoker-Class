<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MaterialResource\Pages;
use App\Filament\Resources\MaterialResource\RelationManagers;
use App\Models\Material;
use App\Models\Course;
use App\Models\CourseClass;
use App\Models\Topic;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;

class MaterialResource extends Resource
{
    protected static ?string $model = Material::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationGroup = 'Course Management';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Detail Material')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required(),
                                Forms\Components\Select::make('class')
                                    ->options(Course::query()->pluck('name', 'id'))
                                    ->live(),
                                Forms\Components\Select::make('course_class_id')
                                    ->label('Course Class')
                                    ->options(fn (Get $get): Collection => CourseClass::query()
                                        ->where('course_id', $get('class'))
                                        ->pluck('name', 'id'))
                                    ->searchable()
                                    ->native(false)
                                    ->live()
                                    ->required(),
                                Forms\Components\Select::make('topic_id')
                                    ->label('Topic')
                                    ->options(fn (Get $get): Collection => Topic::query()
                                        ->where('course_class_id', $get('course_class_id'))
                                        ->pluck('title', 'id'))
                                    ->searchable()
                                    ->native(false)
                                    ->required(),
                                Forms\Components\RichEditor::make('description')
                                    ->columnSpan('full'),
                            ])->columns(2),
                        Forms\Components\Section::make('File')
                            ->schema([
                                Forms\Components\FileUpload::make('file')
                                    ->hiddenLabel()
                                    ->directory('files')
                                    ->visibility('public')
                                    ->openable()
                                    ->downloadable()
                                    ->maxSize(30720)
                                    ->required(),
                            ])->columns(1),
                    ])
                    ->columnSpan(['lg' => fn (?Material $record) => $record === null ? 3 : 2]),

                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Created at')
                            ->content(fn (Material $record): ?string => $record->created_at?->diffForHumans()),

                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Last modified at')
                            ->content(fn (Material $record): ?string => $record->updated_at?->diffForHumans()),
                    ])
                    ->columnSpan(['lg' => 1])
                    ->hidden(fn (?Material $record) => $record === null),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('No')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('title')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->html()
                    ->wrap()
                    ->lineClamp(2),
                Tables\Columns\TextColumn::make('topic.title')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('courseClass.course.name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('courseClass.name')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListMaterials::route('/'),
            'create' => Pages\CreateMaterial::route('/create'),
            'edit' => Pages\EditMaterial::route('/{record}/edit'),
        ];
    }
}
