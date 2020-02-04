<?php

use App\Referral;
use Illuminate\Database\Seeder;

class ReferralTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Referral::class, 2)->create();

    }
}
