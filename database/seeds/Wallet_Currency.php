<?php

use Illuminate\Database\Seeder;

class Wallet_Currency extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wallet_currencies')->insert([
            [
                'currency' => 'JOD',
                'name' => 'Jordanian Dinar',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
              ],
            [
                'currency' => 'EUR',
                'name' => 'Euro',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                ],
            [
                'currency' => '$',
                'name' => 'USA DOLLAR',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                ]
            ]
          );
    }
}
