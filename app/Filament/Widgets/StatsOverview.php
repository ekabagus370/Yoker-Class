<?php

namespace App\Filament\Widgets;

use App\Models\Course;
use App\Models\User;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Carbon\Carbon;

class StatsOverview extends BaseWidget
{
    use InteractsWithPageFilters;

    protected function getStats(): array
    {
        $start = $this->filters['startDate'];
        $end = $this->filters['endDate'];

        $course = Trend::model(Course::class)
            ->between(
                start: $start ? Carbon::parse($start) : now()->subYear(),
                end: $end ? Carbon::parse($end) : now(),
            )
            ->perMonth()
            ->count();

        $user = Trend::model(User::class)
            ->between(
                start: $start ? Carbon::parse($start) : now()->subYear(),
                end: $end ? Carbon::parse($end) : now(),
            )
            ->perMonth()
            ->count();

        return [
            Stat::make(
                label: 'Course',
                value: Course::query()
                    ->when($start, fn ($query) => $query->whereDate('created_at', '>', $start))
                    ->when($end, fn ($query) => $query->whereDate('created_at', '<', $end))
                    ->count()
            )
                ->chart(
                    $course
                        ->map(fn (TrendValue $value) => $value->aggregate)
                        ->toArray()
                )
                ->description('Total Course')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make(
                label: 'Users',
                value: User::query()
                    ->when($start, fn ($query) => $query->whereDate('created_at', '>', $start))
                    ->when($end, fn ($query) => $query->whereDate('created_at', '<', $end))
                    ->count()
            )
                ->chart(
                    $user
                        ->map(fn (TrendValue $value) => $value->aggregate)
                        ->toArray()
                )
                ->description('Total users')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
        ];
    }

    public static function canView(): bool
    {
        return auth()->user()->role == 'admin';
    }
}
