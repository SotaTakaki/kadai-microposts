<?php

namespace Tests\Unit;

// 追加した
use App\User;
use Illuminate\Database\Seeder\UsersTableSeeder;
use Illuminate\Database\Seeder\DatabaseSeeder;
use Illuminate\Database\Seeder\UsersFollowTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

use PHPUnit\Framework\TestCase;

class MicropostsTest extends TestCase
{
    // testをするごとにデータを消す。
    use RefreshDatabase;
    
    const MY_USER_ID = 1;
    private $_user;
    
    // testをするごとに実行される
    public function setUp(): void
    {
        parent::setUp();
        $this->seed(UsersTableSeeder::class);
        $this->seed(UsersFollowTableSeeder::class);
        $this->_user = User::find(self::MY_USER_ID);
    }
    
    /**
     * 「@test」をつけるとテストメソッドとして認識されるので日本語でテスト内容を記載できる
     * @test
     */
     public function 新規Followでtrue()
     {
         $this->assertTrue($this->_user->follow(4));
     }
     
     /**
     * 「@test」をつけるとテストメソッドとして認識されるので日本語でテスト内容を記載できる
     * @test
     */
     public function 既存FollowでFalse()
     {
         $this->assertFalse($this->_user->follow(2));
     }
     
     /**
     * 「@test」をつけるとテストメソッドとして認識されるので日本語でテスト内容を記載できる
     * @test
     */
     public function 自分自身をFollowでFalse()
     {
         $this->assertFalse($this->_user->follow(self::MY_USER_ID));
     }
     
     /**
     * 「@test」をつけるとテストメソッドとして認識されるので日本語でテスト内容を記載できる
     * @test
     */
     public function unFollow成功でtrue()
     {
         $this->assertTrue($this->_user->unfollow(4));
     }
     
     /**
     * 「@test」をつけるとテストメソッドとして認識されるので日本語でテスト内容を記載できる
     * @test
     */
     public function 自分自身をunFollowでFalse()
     {
         $this->assertFalse($this->_user->unfollow(self::MY_USER_ID));
     }
}
