<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = new Category;
        $item->id = 1;
        $item->code = "CF01";
        $item->name = "Cà Phê";
        $item->description = "Cà phê rang xay nguyên chất";
        $item->created_at = date('Y-m-d H:i:s');
        $item->updated_at  = date('Y-m-d H:i:s');
        $item->save();

        $item = new Category;
        $item->id = 2;
        $item->code = "TS01";
        $item->name = "Trà Sữa";
        $item->description = "Trà sữa matcha";
        $item->created_at = date('Y-m-d H:i:s');
        $item->updated_at  = date('Y-m-d H:i:s');
        $item->save();
    }
}
