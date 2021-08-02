<?php

namespace Database\Factories;

use App\Models\Cell;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CellFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cell::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sn_cell' => 'NSA10011091' . $this->faker->randomNumber(6),
            'capacity_new' => '100',
            'capacity_real' => $this->faker->randomElement([10, 100]),
            'soh' => $this->faker->randomElement([10, 100]) . '%',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
            ];
        });
    }
}
