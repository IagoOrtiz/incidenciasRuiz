<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Incidencia>
 */
class IncidenciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'teacherId' => rand(1,10),
            'room' => 'Aula '.rand(1,22),
            'device' => fake()->randomElement(['PC', 'Pantalla', 'Proyector', 'Router', 'Impresora', 'Altavoces']),
            'description' => fake()->paragraph()
        ];
    }
}
