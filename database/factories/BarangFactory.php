<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->word(),
            'code'=>$this->faker->unique()->lexify(),
            'category'=>['bricks','nano block'][rand(0,1)],
            'rafted'=>false,
            'stock'=>rand(1,10)
        ];
    }
}
