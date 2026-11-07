<?php

namespace Database\Seeders;

use App\Models\Attachment;
use App\Models\Incident;
use Database\Factories\IncidentFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Incident::factory()
            ->count(10)
            ->has(Attachment::factory()->count(2), 'attachments')
            ->create();
    }
}
