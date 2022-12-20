<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        for ($i = 0; $i < 10; $i++) {
            Listing::create([
                'user_id' => rand(1, 10),
                'category_id' => rand(1, 10),
                'city_id' => rand(1, 10),
                'title' => 'Lorem ipsum dolor sit amet',
                'picture'=>'https://s3-us-west-2.amazonaws.com/s.cdpn.io/953/murra.jpg',
                'price' => rand(1000, 1000000),
                'status' => '1',
                'created_timestamp_id' => rand(1, 1000),
                'updated_timestamp_id' => rand(1, 1000),
                'description' => 'Lorem ipsum dolor sit amet
                                    consectetur adipisicing elit.
                                    Ipsam minima et illo reprehenderit
                                    quas possimus voluptas repudiandae
                                    cum expedita, eveniet aliquid,
                                    quam illum quaerat consequatur!
                                    Expedita ab consectetur tenetur
                                    delensiti?'
            ]);
        }
    }
}
