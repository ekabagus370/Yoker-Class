<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EnrollmentResource\Pages;
use App\Filament\Resources\EnrollmentResource\RelationManagers;
use App\Models\Enrollment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EnrollmentResource extends Resource
{
    protected static ?string $model = Enrollment::class;

protected static ?string $navigationIcon = 'heroicon-o-square-3-stack-3d';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('course_class_id')
                    ->label('Course Class')
                    ->relationship(
                        name: 'courseClass',
                        titleAttribute: 'code',
                    )
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->course->name} ( {$record->name} )")
                    ->searchable()
                    ->native(false)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\Layout\Stack::make([
                    Tables\Columns\ImageColumn::make('courseClass.course.image_url')
                        ->height('100%')
                        ->width('100%'),
                    Tables\Columns\Layout\Stack::make([
                        Tables\Columns\TextColumn::make('courseClass.course.name')
                            ->weight(FontWeight::Bold),
                        Tables\Columns\TextColumn::make('courseClass.course.description')
                            ->html()
                            // ->formatStateUsing(fn (string $state): string => str($state)->after('://')->ltrim('www.')->trim('/'))
                            ->color('gray')
                            ->limit(30),
                    ]),
                ])->space(3),
                // Tables\Columns\Layout\Panel::make([
                //     Tables\Columns\Layout\Split::make([
                //         Tables\Columns\ColorColumn::make('color')
                //             ->grow(false),
                //         Tables\Columns\TextColumn::make('description')
                //             ->color('gray'),
                //     ]),
                // ])->collapsible(),
            ])
            ->filters([
                //
            ])
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
            ])
            ->paginated([
                18,
                36,
                72,
                'all',
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
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEnrollments::route('/'),
            'create' => Pages\CreateEnrollment::route('/create'),
            'edit' => Pages\EditEnrollment::route('/{record}/edit'),
        ];
    }
}
