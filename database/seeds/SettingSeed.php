<?php

use Illuminate\Database\Seeder;

class SettingSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Delete table
        DB::table('settings')->delete();
        //Insert initial records
        DB::table('settings')->insert(array(
            array('id'=>1,'meta_title'=>'WEB CSR','system_name'=>'WEB CSR', 'copyright'=>'2017 Danang Istu', 'logo'=>'logo.png', 'favicon'=>'favicon.ico', 'bg_login'=>'bg.jpg'),
        ));
    }
}
