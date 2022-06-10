<?php

use Illuminate\Database\Seeder;

class UsersFollowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_follow')->insert([
            [
                'user_id' => 1,
                'follow_id' => 2,
            ],
            [
                'user_id' => 1,
                'follow_id' => 3,
            ],
        ]);
    }
}
