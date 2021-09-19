<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class Authseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user=[
        [
        'username'=>'admin',
        'name'=>'Ashik',
        'email'=>'admin@xyz.com',
        'level'=>'admin',
        'password'=>Hash::make('123'),
        'status'=>1
      ],
      [
        'username'=>'user',
        'name'=>'Ahmed',
        'email'=>'user@xyz.com',
        'level'=>'User',
        'password'=>Hash::make('123'),
        'status'=>1

      ]
  ];
  foreach ($user as $key =>$value){
    User::create($value);
  }

    }
}
