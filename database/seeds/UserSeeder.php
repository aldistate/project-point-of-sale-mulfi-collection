<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    User::create([
      'role' => 'admin',
      'name' => 'Admin',
      'alamat' => 'Banjar Agung Indah Blok F17 No12',
      'username' => 'superadmin',
      'nik' => '11217052',
      'email' => 'admin@admin.com',
      'email_verified_at' => now(),
      'password' => bcrypt('password'),
      'remember_token' => Str::random(10),
    ]);
  }
}
