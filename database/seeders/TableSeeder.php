<?php

namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => '1'],
            ['name' => '2'],
            ['name' => '3'],
            ['name' => '4'],
        ];

        $tableCreate = Table::insert($data);
    }
}
