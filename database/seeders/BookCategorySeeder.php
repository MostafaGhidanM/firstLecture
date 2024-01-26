<?php
// database/seeders/BookCategorySeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BookCategorySeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Adjust the loop count based on how many records you want
        for ($i = 0; $i < 20; $i++) {
            $bookId = \App\Models\Book::inRandomOrder()->first()->id;
            $categoryId = \App\Models\Category::inRandomOrder()->first()->id;

            DB::table('book_category')->insert([
                'book_id' => $bookId,
                'category_id' => $categoryId,
            ]);
        }
    }
}
