<?php

namespace Database\Factories;

use App\Models\Incident;
use App\Models\Attachment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Attachment>
 */
class AttachmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'incident_id' => Incident::inRandomOrder()->value('id'),
            'uploaded_by_id' => User::inRandomOrder()->value('id'),
            'file_name' => fake()->word() . '.pdf',
            'file_path' => 'attachments/' . fake()->uuid() . '.pdf',
            'mime_type' => 'application/pdf',
            'file_size' => fake()->numberBetween(1000, 5000000),
        ];
    }
}
