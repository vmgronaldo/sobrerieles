<?php

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
        // $this->call(UserSeeder::class);
        $passworda = 'vmgronaldo123';
        $agente = new \App\User();
        $agente->name= 'Gabriel Viza';
        $agente->email= 'vmgronaldo@gmail.com';
        $agente->password=bcrypt($passworda);
        $agente->save();
    }
}
