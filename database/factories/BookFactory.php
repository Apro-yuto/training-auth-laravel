<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userId = User::all()->random(1)[0]->id;

        return [
            //
            'user_id' => $userId,
            'book_name' => $this->faker->realText(20),
            'book_image' => $this->faker->realText(20),
            'book_description' => $this->faker->realText(150),
            'book_author' => $this->faker->name(),
        ];
    }
}
