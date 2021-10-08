<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Read;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reads = Read::class;

        // factoryを利用
        Book::factory(10)->create()
            ->each(function (Book $book) use ($reads) {
                $ran = rand('1', '6');

                $book->Reads()->attach(
                    Read::all()->random($ran)->pluck('id')->toArray(),
                );
            });
    }
}
