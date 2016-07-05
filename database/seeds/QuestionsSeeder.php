<?php

use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            [
                'id' => 1,
                'chapter' => 1,
            ],
            [
                'id' => 2,
                'chapter' => 2,
            ],
            [
                'id' => 3,
                'chapter' => 2,
            ],
            [
                'id' => 4,
                'chapter' => 2,
            ],
            [
                'id' => 5,
                'chapter' => 2,
            ],
            [
                'id' => 6,
                'chapter' => 2,
            ],
            [
                'id' => 7,
                'chapter' => 2,
            ],
            [
                'id' => 8,
                'chapter' => 2,
            ],
            [
                'id' => 9,
                'chapter' => 3,
            ],
            [
                'id' => 10,
                'chapter' => 3,
            ],
            [
                'id' => 11,
                'chapter' => 4,
            ],
            [
                'id' => 12,
                'chapter' => 4,
            ],
            [
                'id' => 13,
                'chapter' => 4,
            ],
            [
                'id' => 14,
                'chapter' => 4,
            ],
            [
                'id' => 15,
                'chapter' => 4,
            ],
            [
                'id' => 16,
                'chapter' => 4,
            ],
            [
                'id' => 17,
                'chapter' => 4,
            ],
            [
                'id' => 18,
                'chapter' => 5,
            ],
        ]);
    }
}
