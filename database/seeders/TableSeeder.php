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

        $data = [];

        for($x = 1; $x < 11; $x++)
        {
            $data[] = ['name' => 'Meja ' . $x];
        }

        $tableCreate = Table::insert($data);
    }
}
