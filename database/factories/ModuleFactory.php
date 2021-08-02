<?php

namespace Database\Factories;

use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ModuleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Module::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sn_module' => 'H100.' . $this->faker->month() . $this->faker->year() . '.' . 'ZM' . $this->faker->randomNumber(4),
            'cell1' => 'NSA10011091' . $this->faker->randomNumber(4),
            'cell2' => 'NSA10011091' . $this->faker->randomNumber(4),
            'cell3' => 'NSA10011091' . $this->faker->randomNumber(4),
            'cell4' => 'NSA10011091' . $this->faker->randomNumber(4),
            'cell5' => 'NSA10011091' . $this->faker->randomNumber(4),
            'cell6' => 'NSA10011091' . $this->faker->randomNumber(4),
            'cell7' => 'NSA10011091' . $this->faker->randomNumber(4),
            'cell8' => 'NSA10011091' . $this->faker->randomNumber(4),
            'cell9' => 'NSA10011091' . $this->faker->randomNumber(4),
            'cell10' => 'NSA10011091' . $this->faker->randomNumber(4),
            'cell11' => 'NSA10011091' . $this->faker->randomNumber(4),
            'cell12' => 'NSA10011091' . $this->faker->randomNumber(4),
            'cell13' => 'NSA10011091' . $this->faker->randomNumber(4),
            'cell14' => 'NSA10011091' . $this->faker->randomNumber(4),
            'cell15' => 'NSA10011091' . $this->faker->randomNumber(4),
            'cell16' => 'NSA10011091' . $this->faker->randomNumber(4),
            'soh_module' => $this->faker->randomNumber(2) . '%',
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
