<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('admin123');
        //Delete table
        DB::table('users')->delete();
        //Insert initial records
        DB::table('users')->insert(array(
            array('id'=>1,'privilege_id'=>1,'name'=>'Super Admin','username'=>'superadmin','email'=>'superadmin@admin.com','password'=>$password,'image'=>'user.png'),
        ));
    }
}
