<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PrivilegeSeed::class);
        $this->call(UserSeed::class);
        $this->call(SettingSeed::class);
    }
}
