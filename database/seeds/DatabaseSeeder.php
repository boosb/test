<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);使用用户自定义类Model
      Model::unguard();
      $this->call('PostTableSeeder');
    }
}

/**
*  
*/
class PostTableSeeder extends Seeder
{
     public function run(){
      App\Post::truncate();
      factory(App\Post::class,20)->create();//自动创建20条数据，执行：php artisan db:seed
     }
}
