<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseUserResource\Pages;
use App\Filament\Resources\CourseUserResource\RelationManagers;
use App\Models\CourseUser;
use App\Models\User;
use App\Models\Course;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseUserResource extends Resource
{
    protected static ?string $model = CourseUser::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('student_id')
                    ->label('Student')
                    ->options(User::all()->where('role', 'student')->pluck('name', 'id'))
                    ->searchable(),
                Forms\Components\Select::make('course_id')
                    ->label('Course')
                    ->options(Course::all()->pluck('name', 'id'))
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student.name'),
                Tables\Columns\TextColumn::make('course.name'),
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
            'index' => Pages\ListCourseUsers::route('/'),
            'create' => Pages\CreateCourseUser::route('/create'),
            'edit' => Pages\EditCourseUser::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        if (auth()->user()->role === 'teacher') {
            return parent::getEloquentQuery()->where('teacher_id', auth()->id());
        }

        return parent::getEloquentQuery();
    }
}
