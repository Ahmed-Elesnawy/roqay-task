<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\Models\Admin::create([

            'name'     => 'Ahmed Elesnawy',
            'email'    => 'admin@admin.com',
            'password' => '5060180',  
        ]);

        $admin->assignRole('super-admin');

    }
}
