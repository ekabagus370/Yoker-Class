<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\CourseClassResource;
use App\Filament\Resources\CourseResource;
use App\Models\Course;
use App\Models\CourseClass;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestCourseUserTable extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 2;

    public function table(Table $table): Table
    {
        return $table
            ->query(CourseClassResource::getEloquentQuery())
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')
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
            ->actions([
                Tables\Actions\Action::make('open')
                    ->url(function (CourseClass $record): string {
                        // if (auth()->user()->role = 'admin') {
                        return  CourseResource::getUrl('edit', ['record' => $record]);
                        // } else {
                        // return  CourseResource::getUrl('view', ['record' => $record]);
                        // }
                    }),
            ]);
    }
}
