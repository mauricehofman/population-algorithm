<?php

class BuildingsTableSeeder extends AbstractDatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Building::class, 5)->create();
    }
}
