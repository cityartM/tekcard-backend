<?php

namespace Modules\Card\Database\factories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CardFactory extends Factory
{

    protected $model = \Modules\Card\Models\Card::class;

    public function definition(): array
    {
        return [
            'reference' => $this->faker->uuid,
            'name' => $this->faker->name,
            'full_name' => $this->faker->name,
            'company_name' => $this->faker->company,
            'company_id' => null,
            'job_title' => $this->faker->jobTitle,
            'background_id' => null,
            'color' => $this->faker->hexColor,
            'is_single_link' => $this->faker->boolean,
            'single_link_contact_id' => null,
            'is_main' => $this->faker->boolean,
            'user_id' => User::firstOrFail()->id,
        ];
    }
}
