<?php

namespace Database\Seeders;

use App\Models\FAQsContent;
use App\Models\FAQsPost;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            FAQsContentSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Test User3',
            'email' => 'test3@example.com',
        ]);
    }
}
