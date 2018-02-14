<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
    	App\customer_category::truncate();
        factory(App\customer_category::class, 5)->create();

    	App\agent_category::truncate();
        factory(App\agent_category::class, 5)->create();


        factory(App\agent::class, 15)->create();

        factory(App\customer::class, 35)->create();

        factory(App\ticket::class, 30)->create()->each(function ($ticket) {
            $ticket->messages()->saveMany(factory(App\message::class,5)->make());
        });

    }
}
