<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity;
use Carbon\Carbon;

class ActivitySeeder extends Seeder
{
    public function run()
    {
        $activities = [
            [
                'type' => 'windsurf',
                'user_id' => 1, // Asumiendo que este es un ID de un usuario existente
                'datetime' => Carbon::now()->format('Y-m-d H:i:s'),
                'paid' => 1,
                'notes' => 'Exciting windsurf session on the beach.',
                'satisfaction' => 5,
            ],
            [
                'type' => 'yoga',
                'user_id' => 1, // Asumiendo que este es otro ID de un usuario
                'datetime' => Carbon::now()->addDays(1)->format('Y-m-d H:i:s'),
                'paid' => 1,
                'notes' => 'Yoga session to improve flexibility and relaxation.',
                'satisfaction' => 4,
            ],
            [
                'type' => 'hiking',
                'user_id' => 1, // Otro usuario
                'datetime' => Carbon::now()->addDays(2)->format('Y-m-d H:i:s'),
                'paid' => 0,
                'notes' => 'Hiking trip to the mountains.',
                'satisfaction' => 3,
            ],
        ];

        foreach ($activities as $activity) {
            Activity::create($activity);
        }
    }
}
