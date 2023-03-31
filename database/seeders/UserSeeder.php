<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(3)->state(new Sequence(
            ['email' => 'admin@example.com'],
            ['email' => 'spv@example.com'],
            ['email' => 'kasir@example.com']
        ))->create();
    }
}
