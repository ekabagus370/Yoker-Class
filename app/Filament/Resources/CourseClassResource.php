<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseClassResource\Pages;
use App\Filament\Resources\CourseClassResource\RelationManagers;
use App\Models\Course;
use App\Models\CourseClass;
use App\Models\User;
use Filament\Forms;
use Illuminate\Support\Str;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class CourseClassResource extends Resource
{
    protected static ?string $model = CourseClass::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationGroup = 'Course Management';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Detail Course Description')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required(),
                                Forms\Components\Select::make('course_id')
                                    ->label('Course')
                                    ->relationship(
                                        name: 'course',
                                        titleAttribute: 'name',
                                    )
                                    ->searchable()
                                    ->preload()
                                    ->native(false)
                                    ->required(),
                                Forms\Components\TextInput::make('room'),
                                Forms\Components\TextInput::make('code')
                                    ->readOnly()
                                    ->default(Str::upper(Str::random(6))),
                                Forms\Components\Select::make('teacher')
                                    ->options(User::all()->pluck('name', 'id'))
                                    ->searchable()
                                    ->required(),
                                Forms\Components\RichEditor::make('description')
                                    ->columnSpan('full'),
                            ])
                            ->columns(2),

                        Forms\Components\Section::make('Image')
                            ->schema([
                                Forms\Components\FileUpload::make('image_url')
                                    ->hiddenLabel()
                                    ->image()
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        '16:9',
                                        '4:3',
                                        '1:1',
                                    ])
                                    ->directory('uploads')
                                    ->visibility('public')
                                    ->openable()
                                    ->downloadable(),
                            ])->columns(1),
                    ])
                    ->columnSpan(['lg' => fn (?CourseClass $record) => $record === null ? 3 : 2]),

                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Created at')
                            ->content(fn (CourseClass $record): ?string => $record->created_at?->diffForHumans()),

                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Last modified at')
                            ->content(fn (CourseClass $record): ?string => $record->updated_at?->diffForHumans()),
                    ])
                    ->columnSpan(['lg' => 1])
                    ->hidden(fn (?CourseClass $record) => $record === null),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('No')
                    ->rowIndex(),
                Tables\Columns\ImageColumn::make('image_url')
                    ->square()
                    ->label('Photo'),
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->html()
                    ->wrap()
                    ->lineClamp(2),
                Tables\Columns\TextColumn::make('room')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('code')
                    ->copyable()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('course.name')
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
            RelationManagers\CourseClassTeacherRelationManager::class,
            RelationManagers\EnrollmentsRelationManager::class,
            RelationManagers\AnnouncementsRelationManager::class,
            RelationManagers\TopicsRelationManager::class,
            RelationManagers\MaterialsRelationManager::class,
            RelationManagers\AssignmentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCourseClasses::route('/'),
            'create' => Pages\CreateCourseClass::route('/create'),
            'edit' => Pages\EditCourseClass::route('/{record}/edit'),
        ];
    }

    // public static function getEloquentQuery(): Builder
    // {
    //     $user = Auth::user()->roles->pluck('name');
    //     if ($user[0] != 'super_admin') {
    //         return parent::getEloquentQuery()->where('user_id', auth()->id());
    //     }

    //     return parent::getEloquentQuery();
    // }
}
