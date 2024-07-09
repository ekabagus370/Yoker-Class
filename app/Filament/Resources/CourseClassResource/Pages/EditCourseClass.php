<?php

namespace App\Filament\Resources\CourseClassResource\Pages;

use App\Filament\Resources\CourseClassResource;
use App\Models\CourseClassTeacher;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCourseClass extends EditRecord
{
    protected static string $resource = CourseClassResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        $courseClass = $this->record;

        CourseClassTeacher::create([
            'course_class_id' => $courseClass->id,
            'teacher_id' => auth()->user()->id,
        ]);
    }
}
