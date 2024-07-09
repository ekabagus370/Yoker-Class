<?php

namespace App\Filament\Resources\TopicResource\RelationManagers;

use App\Models\Assignment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AssignmentsRelationManager extends RelationManager
{
    protected static string $relationship = 'assignments';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Detail Material')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required(),
                                Forms\Components\TextInput::make('course_class_id')
                                    ->default($this->ownerRecord->course_class_id)
                                    ->readOnly(),
                                Forms\Components\TextInput::make('point')
                                    ->integer()
                                    ->required(),
                                Forms\Components\DateTimePicker::make('due_date')
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
                    ->columnSpan(['lg' => fn (?Assignment $record) => $record === null ? 3 : 2]),

                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Created at')
                            ->content(fn (Assignment $record): ?string => $record->created_at?->diffForHumans()),

                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Last modified at')
                            ->content(fn (Assignment $record): ?string => $record->updated_at?->diffForHumans()),
                    ])
                    ->columnSpan(['lg' => 1])
                    ->hidden(fn (?Assignment $record) => $record === null),
            ])->columns(3);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
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
                Tables\Columns\TextColumn::make('point')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('due_date')
                    ->dateTime()
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
