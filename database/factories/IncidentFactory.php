<?php

namespace Database\Factories;

use App\IncidentSeverity;
use App\IncidentStatus;
use App\Models\Category;
use App\Models\User;
use App\Models\Incident;
use App\UserRole;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Incident>
 */
class IncidentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'category_id' => Category::inRandomOrder()->value('id'),
            'severity' => fake()->randomElement(array_column(IncidentSeverity::cases(), 'value')),
            'status' => 'open',
            'reported_by_id' => User::where('role', UserRole::Reporter->value)->inRandomOrder()->value('id'),
            'assigned_by_id' => null,
            'assigned_to_id' => null,
        ];
    }
}
