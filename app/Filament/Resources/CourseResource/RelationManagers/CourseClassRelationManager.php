<?php

namespace App\Filament\Resources\CourseResource\RelationManagers;

use App\Models\CourseClass;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseClassRelationManager extends RelationManager
{
    protected static string $relationship = 'courseClass';

    public function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make('Detail Class')
                        ->schema([
                            Forms\Components\TextInput::make('name')
                                ->required(),
                            Forms\Components\TextInput::make('room'),
                            Forms\Components\TextInput::make('code')
                                ->readOnly()
                                ->default(str()->upper(str()->random(6))),
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

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
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
