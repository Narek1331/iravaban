<?php

namespace App\Filament\Widgets;

use App\Models\Feedback;
use Filament\Widgets\LineChartWidget;

class FeedbackChart extends LineChartWidget
{
    protected static ?string $heading = 'Feedbacks Over Time';

    protected function getData(): array
    {
        $feedbacks = Feedback::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Feedbacks',
                    'data' => $feedbacks->pluck('count')->toArray(),
                ],
            ],
            'labels' => $feedbacks->pluck('date')->toArray(),
        ];
    }
}
