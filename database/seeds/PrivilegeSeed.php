<?php

use Illuminate\Database\Seeder;

class PrivilegeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Delete table
        DB::table('privileges')->delete();
        //Insert initial records
        DB::table('privileges')->insert(array(
            array('id'=>1,'name'=>'Superadmin','theme'=>'theme-dark'),
            array('id'=>2,'name'=>'Admin','theme'=>'theme-blue')
        ));
    }
}
