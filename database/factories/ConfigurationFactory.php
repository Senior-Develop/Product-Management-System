<?php

namespace Database\Factories;

use App\Models\Configuration;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ConfigurationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Configuration::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_configuration' => 'H.' . $this->faker->randomNumber(1) . 'X' . $this->faker->randomNumber(1),
            'number_cells' => $this->faker->randomNumber(),
            'capacity_twice_guarantee' => $this->faker->randomFloat(2) . 'kWh',
            'capacity_estimated' => $this->faker->randomFloat(1) . 'kWh',
            'module_vertical' => $this->faker->randomNumber(1),
            'module_horizontal' => $this->faker->randomNumber(1),
            'voltage' => $this->faker->randomNumber(1) . 'V',
            'permanent_charging_performance' => $this->faker->randomFloat(1) . 'kW',
            'permanent_discharging_performance' => $this->faker->randomFloat(1) . 'kW',
            'permanent_charging_power' => $this->faker->randomFloat(1) . 'kW',
            'permanent_discharging_power' => $this->faker->randomFloat(1) . 'kW',
            'length' => $this->faker->randomNumber(1) . 'mm',
            'broad' => $this->faker->randomNumber(1) . 'mm',
            'height' => $this->faker->randomNumber(1) . 'mm',
            'weight' => $this->faker->randomNumber(1) . 'kg',
            'capacity_new' => $this->faker->randomNumber(1) . 'kWh',
            'total_modules' => $this->faker->randomNumber(1),
            'logic_board_total' => $this->faker->randomNumber(1),
            'additional_cover' => $this->faker->randomNumber(1),
            'current_nom' => $this->faker->randomNumber(1) . 'A',
            'current_peak' => $this->faker->randomNumber(1) . 'A',
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
