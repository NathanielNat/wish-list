<?php

namespace Database\Factories;

use App\Models\Wish;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class WishFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Wish::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'wish' => $this->faker->paragraphs($nbSentences =3, $variableNbSentences = true),
            'user_id' =>  User::factory(),
            
        ];
    }
}
