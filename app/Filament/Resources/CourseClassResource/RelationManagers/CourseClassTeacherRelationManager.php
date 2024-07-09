<?php

namespace App\Filament\Resources\CourseClassResource\RelationManagers;

use App\Models\CourseClassTeacher;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseClassTeacherRelationManager extends RelationManager
{
    protected static string $relationship = 'courseClassTeacher';

    public function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make('')
                        ->schema([
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

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('courseClass.name')
            ->columns([
                Tables\Columns\TextColumn::make('No')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('teacher.name')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
