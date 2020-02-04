<?php

use App\Referrer;
use Illuminate\Database\Seeder;

class ReferrerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Referrer::class, 2)->create();
    }
}
