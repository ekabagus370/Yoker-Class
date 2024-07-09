<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubmissionResource\Pages;
use App\Filament\Resources\SubmissionResource\RelationManagers;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\CourseClass;
use App\Models\Submission;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;

class SubmissionResource extends Resource
{
    protected static ?string $model = Submission::class;

    protected static ?string $navigationIcon = 'heroicon-o-cloud-arrow-down';

    protected static ?string $navigationGroup = 'Course Management';

    protected static ?int $navigationSort = 8;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Detail Material')
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
                                    ->live()
                                    ->required(),
                                Forms\Components\Select::make('assignment_id')
                                    ->label('Assignment')
                                    ->options(fn (Get $get): Collection => Assignment::query()
                                        ->where('course_class_id', $get('course_class_id'))
                                        ->pluck('title', 'id'))
                                    ->searchable()
                                    ->native(false)
                                    ->required(),
                                Forms\Components\Select::make('user_id')
                                    ->label('User name')
                                    ->relationship(name: 'user', titleAttribute: 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required(),
                                Forms\Components\TextInput::make('grade'),
                                Forms\Components\DateTimePicker::make('submitted_at'),
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
                    ->columnSpan(['lg' => fn (?Submission $record) => $record === null ? 3 : 2]),

                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Created at')
                            ->content(fn (Submission $record): ?string => $record->created_at?->diffForHumans()),

                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Last modified at')
                            ->content(fn (Submission $record): ?string => $record->updated_at?->diffForHumans()),
                    ])
                    ->columnSpan(['lg' => 1])
                    ->hidden(fn (?Submission $record) => $record === null),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('No')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('user.name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('submitted_at')
                    ->dateTime()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('grade')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('assignment.title')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('assignment.topic.title')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('assignment.courseClass.course.name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('assignment.courseClass.name')
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
            'index' => Pages\ListSubmissions::route('/'),
            'create' => Pages\CreateSubmission::route('/create'),
            'edit' => Pages\EditSubmission::route('/{record}/edit'),
        ];
    }
}
