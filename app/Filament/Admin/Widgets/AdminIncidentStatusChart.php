<?php

namespace App\Filament\Admin\Widgets;

use App\IncidentStatus;
use App\Models\Incident;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Str;

class AdminIncidentStatusChart extends ChartWidget
{
    protected static ?int $sort = 0;

    protected ?string $heading = 'Incidents by Status';

    protected function getData(): array
    {

        $statuses = IncidentStatus::cases();

        $counts = collect($statuses)
            ->mapWithKeys(fn ($status) => [
                $status->value => Incident::where('status', $status)->count(),
            ]);

        return [
            'datasets' => [
                [
                    'data' => $counts->values()->all(),
                    'backgroundColor' => array_map(
                        fn ($status) => $status->getChartColor(), $statuses
                    ),
                ],
            ],
            'labels' => array_map(
                Str::headline(...),
                array_column(IncidentStatus::cases(), 'value')
            ),
        ];

    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
