<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'no' => $this->faker->randomNumber(),
            'category' => $this->faker->word(),
            'branch' => '',
            'contact_type' => $this->faker->word(),
            'company_name' => $this->faker->word(),
            'name_1' => $this->faker->name(),
            'name_2' => $this->faker->name(),
            'salutation' => $this->faker->word(),
            'title' => $this->faker->word(),
            'post_code' => $this->faker->word(),
            'address' => $this->faker->randomElement($array = ["Los Angeles", "Tokyo", "Mosccow", "Berlin", "Mardrid"]),
            'location' => $this->faker->word(),
            'country' => $this->faker->country(),
            'email' => $this->faker->name().'@gmail.com',
            'email_2' => $this->faker->name().'@gmail.com',
            'phone' => $this->faker->phoneNumber(),
            'phone_2' => $this->faker->phoneNumber(),
            'mobile' => $this->faker->phoneNumber(),
            'fax' => $this->faker->phoneNumber(),
            'website' => 'https://www.' . $this->faker->name() . '.com',
            'skype' => $this->faker->randomKey(),
            'form_of_address' => $this->faker->address(),
            'birthday' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'correspondence_channel' => $this->faker->word(),
            'remarks' => $this->faker->word(),
            'relationship_info' => $this->faker->name(),
            'contact_person' => $this->faker->name(),
            'language' => $this->faker->languageCode(),
            'vat_number' => $this->faker->creditCardNumber(),
            'number_of_employees' => $this->faker->randomNumber(),
            'commercial_register_no' => $this->faker->randomNumber(),
            'vat_identification_number' => $this->faker->randomNumber(),
            'lead' => $this->faker->word(),
            'password' => '$2y$10$2SwKVGSMKYoRrSLZHI2Bc.FWjyJcA2y4HJz8c0eynFXpEh6Pnc80m' // password
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
