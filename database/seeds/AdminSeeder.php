<?php

use App\Admin;
use App\Terms;
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
        Admin::create([
            'name'=> 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12332100')
        ]);
        Terms::create([
            'text' => '<ul><li>one</li><li>two</li><li>three</li><li>four</li><li>five</li><li>six</li></ul>'
        ]);
    }
}
