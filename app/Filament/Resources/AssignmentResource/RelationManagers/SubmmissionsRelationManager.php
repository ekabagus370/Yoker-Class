<?php

namespace App\Filament\Resources\AssignmentResource\RelationManagers;

use App\Models\Submission;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubmmissionsRelationManager extends RelationManager
{
    protected static string $relationship = 'submmissions';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Detail Material')
                            ->schema([
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

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('file')
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
