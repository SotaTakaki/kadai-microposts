<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 100; $i++)
        {
            // passwordを乱数で生成する場合
            // $password = str_pad(random_int(0,99999999), 8, 0, STR_PAD_LEFT);
            
            DB::table("users")->insert([
                'id' => $i,
                'name' => 'test_user' . $i,
                'email' => 'test_user' . $i . '@test.com',
                'password' => 'test_user' . $i,
            ]);
        }
    }
}
