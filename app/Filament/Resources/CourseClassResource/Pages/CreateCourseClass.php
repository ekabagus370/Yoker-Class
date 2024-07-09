<?php

namespace App\Filament\Resources\CourseClassResource\Pages;

use App\Filament\Resources\CourseClassResource;
use App\Models\CourseClassTeacher;
use Filament\Actions;
use Illuminate\Support\Str;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateCourseClass extends CreateRecord
{
    protected static string $resource = CourseClassResource::class;

    // protected function mutateFormDataBeforeCreate(array $data): array
    // {
    //     $data['code'] = Str::upper(Str::random(6));

    //     return $data;
    // }

    // protected function handleRecordCreation(array $data): Model
    // {
    //     dd($data['id']);
    // }

    protected function afterCreate(): void
    {
        $courseClass = $this->record;

        CourseClassTeacher::create([
            'course_class_id' => $courseClass->id,
            'teacher_id' => auth()->user()->id,
        ]);
    }
}
