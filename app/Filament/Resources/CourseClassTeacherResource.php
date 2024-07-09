<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseClassTeacherResource\Pages;
use App\Filament\Resources\CourseClassTeacherResource\RelationManagers;
use App\Models\Course;
use App\Models\CourseClass;
use App\Models\CourseClassTeacher;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;

class CourseClassTeacherResource extends Resource
{
    protected static ?string $model = CourseClassTeacher::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Course Management';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('')
                            ->schema([
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
                                    ->required(),
                                Forms\Components\Select::make('teacher_id')
                                    ->label('Teacher')
                                    ->relationship(
                                        name: 'teacher',
                                        titleAttribute: 'name',
                                    )
                                    ->searchable()
                                    ->preload()
                                    ->native(false)
                                    ->required(),
                            ])
                            ->columns(2),
                    ])
                    ->columnSpan(['lg' => fn (?CourseClassTeacher $record) => $record === null ? 3 : 2]),

                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Created at')
                            ->content(fn (CourseClassTeacher $record): ?string => $record->created_at?->diffForHumans()),

                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Last modified at')
                            ->content(fn (CourseClassTeacher $record): ?string => $record->updated_at?->diffForHumans()),
                    ])
                    ->columnSpan(['lg' => 1])
                    ->hidden(fn (?CourseClassTeacher $record) => $record === null),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('No')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('courseClass.course.name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('courseClass.name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('teacher.name')
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
            'index' => Pages\ListCourseClassTeachers::route('/'),
            'create' => Pages\CreateCourseClassTeacher::route('/create'),
            'edit' => Pages\EditCourseClassTeacher::route('/{record}/edit'),
        ];
    }
}
