<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'serial_number' => 'H100.' . $this->faker->month() . $this->faker->year() . '.' . $this->faker->randomNumber(4),
            'sn_module1' => 'H100.' . $this->faker->month() . $this->faker->year() . '.' . 'ZM' . $this->faker->randomNumber(4),
            'sn_module2' => 'H100.' . $this->faker->month() . $this->faker->year() . '.' . 'ZM' . $this->faker->randomNumber(4),
            'sn_module3' => 'H100.' . $this->faker->month() . $this->faker->year() . '.' . 'ZM' . $this->faker->randomNumber(4),
            'sn_module4' => 'H100.' . $this->faker->month() . $this->faker->year() . '.' . 'ZM' . $this->faker->randomNumber(4),
            'sn_module5' => 'H100.' . $this->faker->month() . $this->faker->year() . '.' . 'ZM' . $this->faker->randomNumber(4),
            'sn_module6' => 'H100.' . $this->faker->month() . $this->faker->year() . '.' . 'ZM' . $this->faker->randomNumber(4),
            'sn_module7' => 'H100.' . $this->faker->month() . $this->faker->year() . '.' . 'ZM' . $this->faker->randomNumber(4),
            'sn_module8' => 'H100.' . $this->faker->month() . $this->faker->year() . '.' . 'ZM' . $this->faker->randomNumber(4),
            'hw_release' => '1.' . $this->faker->randomNumber(1) . '.' . $this->faker->randomNumber(2),
            'sw_release' => '1.' . $this->faker->randomNumber(1) . '.' . $this->faker->randomNumber(2),
            'customer_id' => $this->faker->randomNumber(1),
            'location_id' => $this->faker->randomNumber(1),
            'configuration_id' => $this->faker->randomNumber(1),
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
