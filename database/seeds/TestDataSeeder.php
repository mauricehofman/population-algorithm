<?php

use App\Building;

class TestDataSeeder extends AbstractDatabaseSeeder
{
    public function run()
    {
        $this->fetchUser();

        if($this->user_exists) {
            $this->user->buildings()->sync(Building::get()->keyBy('id')->map(function (Building $building) {
                return ['level' => 1];
            })->toArray());
        }
    }
}
