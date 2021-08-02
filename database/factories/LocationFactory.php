<?php

namespace Database\Factories;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LocationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Location::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'serial_number' => 'H100.' . $this->faker->month() . $this->faker->year() . '.' . $this->faker->randomNumber(4),
            'contact_type' => $this->faker->name(),
            'company_name' => $this->faker->name(),
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'post_code' => $this->faker->randomNumber(4),
            'location' => $this->faker->address(),
            'country' => $this->faker->country(),
            'email' => $this->faker->name() . '@gmail.com',
            'email_2' => $this->faker->name() . '@gmail.com',
            'phone' => $this->faker->phoneNumber(),
            'phone_2' => $this->faker->phoneNumber(),
            'wgs84_lat' => $this->faker->randomFloat(1),
            'wgs84_lon' => $this->faker->randomFloat(1),
            'inverter_type' => $this->faker->word(),
            'inverter_power' => $this->faker->randomNumber(1),
            'pv_power' => $this->faker->randomFloat(1),
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
