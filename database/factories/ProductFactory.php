<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'name'=>  $this->faker->title,
            'about'=>  $this->faker->paragraph,
            'price'=> $this->faker->numberBetween(1, 10000),
            'quantity'=> $this->faker->numberBetween(0, 50),
            'rate'=> $this->faker->numberBetween(0, 5),
            'color'=> $this->faker->hexcolor,
            'user_id'=>function(){
                return User::all()->random();
            },
        ];
    }
}
