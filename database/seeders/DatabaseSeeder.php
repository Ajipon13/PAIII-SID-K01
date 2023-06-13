<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = [[
            'username'=>'adminisrator',
            'email'=>'admin@example.com',
            'image'=>'',
            'level'  =>'1',
            'password'=>bcrypt('admin')
        ]
        // [
        //     'username'=>'wemiles',
        //     'email'=>'wemi@example.com',
        //     'image'=>'',
        //     'level'  =>'2',
        //     'password'=>bcrypt('desa123')
        // ]
        ];
        foreach($user as $key => $value){
            User::create($value);
        }
    }

   
}
