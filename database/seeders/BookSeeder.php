<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;
use Faker\Factory as Faker;


class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) { // Adjust the loop count based on your needs
            Book::create([
                'title' => $faker->word,
                'desc' => $faker->sentence,
                'img' => $this->saveFakeImage(),
            ]);
        }  
    }
    private function saveFakeImage()
    {
        $faker = Faker::create();
        $image = $faker->image(public_path('uploads/books'), 400, 300, 'books', false);
        return $image;
    }
}
