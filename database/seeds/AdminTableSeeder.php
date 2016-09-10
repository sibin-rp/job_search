<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class AdminTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //

    $admin = User::where('admin',1);
    if($admin->count() <=0){
      User::create([
        'first_name'  => 'Accessor',
        'username'    => 'accessor',
        'email'       => 'admin@accessor.com',
        'password'    => 'password',
        'admin'       => 1,
        'super_admin' => 1,
        'active'      => 1,
        'type'        => 0
      ]);
    }
  }
}
