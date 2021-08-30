<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{

    protected $model = Comment::class;

 
    public function definition()
    {
        return [
           'email'=>$this->faker->email,
           'name'=>$this->faker->lastName,
           'caption'=>$this->faker->text,
           'post_id'=>$this->faker->numberBetween(1,5),
           
        ];
    }
}
