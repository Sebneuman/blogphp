<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 3)->create();

        DB::table('users')->insert(
        	[
        		[
        			'name' => 'Sébastien',
        			'email' => 'seb@seb.fr',
        			'password' => Hash::make('Sébastien'),
        			'role' => 'administrator'
        		],
        		[
        			'name' => 'Neni',
        			'email' => 'neni@neni.fr',
        			'password' => Hash::make('Neni'),
        			'role' => 'visitor'
        		]
        	]
        );
    }
}
