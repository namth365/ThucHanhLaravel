<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = new Product;
        $item->id = 1;
        $item->code = "CGV";
        $item->name = "Cà Phê Vy";
        $item->price = 200000;
        $item->image = "default.jpg";
        $item->category_id = 1;
        $item->created_at = date('Y-m-d H:i:s');
        $item->updated_at  = date('Y-m-d H:i:s');
        $item->save();

        $item = new Product;
        $item->id = 2;
        $item->code = "CGM";
        $item->name = "Cà Phê Mộc";
        $item->price = 350000;
        $item->image = "default.jpg";
        $item->category_id = 1;
        $item->created_at = date('Y-m-d H:i:s');
        $item->updated_at  = date('Y-m-d H:i:s');
        $item->save();

        $item = new Product;
        $item->id = 3;
        $item->code = "CGC";
        $item->name = "Cà Phê Củi";
        $item->price = 400000;
        $item->image = "default.jpg";
        $item->category_id = 1;
        $item->created_at = date('Y-m-d H:i:s');
        $item->updated_at  = date('Y-m-d H:i:s');
        $item->save();

        $item = new Product;
        $item->id = 4;
        $item->code = "KCGS";
        $item->name = "Kem Cà Phê Sữa";
        $item->price = 20000;
        $item->image = "default.jpg";
        $item->category_id = 1;
        $item->created_at = date('Y-m-d H:i:s');
        $item->updated_at  = date('Y-m-d H:i:s');
        $item->save();

        $item = new Product;
        $item->id = 5;
        $item->code = "KCP";
        $item->name = "Kem Cà Phê";
        $item->price = 40000;
        $item->image = "default.jpg";
        $item->category_id = 1;
        $item->created_at = date('Y-m-d H:i:s');
        $item->updated_at  = date('Y-m-d H:i:s');
        $item->save();

        $item = new Product;
        $item->id = 6;
        $item->code = "ST";
        $item->name = "Sinh Tố";
        $item->price = 25000;
        $item->image = "default.jpg";
        $item->category_id = 1;
        $item->created_at = date('Y-m-d H:i:s');
        $item->updated_at  = date('Y-m-d H:i:s');
        $item->save();
    }
}
