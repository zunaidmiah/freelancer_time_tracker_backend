<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
use App\Models\TimeLog;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TimeLog>
 */
class TimeLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = TimeLog::class;

    public function definition(): array
    {
        $start = $this->faker->dateTimeBetween('-1 week', 'now');
        $end = (clone $start)->modify('+'.rand(1, 4).' hours');
        $startCarbon = Carbon::instance($start);
        $endCarbon = Carbon::instance($end);

        return [
            'project_id' => rand(1, 5),
            'start_time' => $startCarbon,
            'end_time' => $endCarbon,
            'description' => $this->faker->sentence,
            'hours' => $startCarbon->floatDiffInHours($endCarbon),
        ];
    }
}
