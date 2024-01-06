<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void

    {
        Tag::create([
            'id' => 1,
            'name' => 'announcements'
        ]);

        Tag::create([
            'id' => 2,
            'name' => 'news'
        ]);

        Tag::create([
            'id' => 3,
            'name' => 'art'
        ]);

        Tag::create([
            'id' => 4,
            'name' => 'music'
        ]);
    }

}
