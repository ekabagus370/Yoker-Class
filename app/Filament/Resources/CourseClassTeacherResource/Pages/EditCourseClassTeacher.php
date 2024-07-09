<?php

namespace App\Filament\Resources\CourseClassTeacherResource\Pages;

use App\Filament\Resources\CourseClassTeacherResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCourseClassTeacher extends EditRecord
{
    protected static string $resource = CourseClassTeacherResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
