<?php

class ResourcesTableSeeder extends AbstractDatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Resource::class)->create();

        $this->handleTestUser(\App\Resource::class);
    }
}
