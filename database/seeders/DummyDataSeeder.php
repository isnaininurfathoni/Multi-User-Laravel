<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataUser=[
            [
                'name'=>'Administator',
                'email'=>'admin@gmail.com',
                'role'=>'administrator',
                'password'=>bcrypt('12345'),
            ],
            [
                'name'=>'Teknisi',
                'email'=>'teknisi@gmail.com',
                'role'=>'teknisi',
                'password'=>bcrypt('12345'),
            ],
            [
                'name'=>'Superuser',
                'email'=>'superuser@gmail.com',
                'role'=>'superuser',
                'password'=>bcrypt('12345'),
            ],
        ];

        foreach($dataUser as $key => $val){
            User::create($val);
        }

    }
}
