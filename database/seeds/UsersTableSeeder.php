<?php

use App\Building;
use App\User;

class UsersTableSeeder extends \Illuminate\Database\Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var User $user */
        $user = factory(\App\User::class)->create([
            'email' => 'info@mypopulus.com'
        ]);

        foreach (['gold', 'wood', 'food', 'metal', 'stone'] as $resource) {
            $resource = $this->createResource($resource);
            $this->createBuilding($this->createBuildingType($resource));

            $user->resources()->attach($resource->id);
        }

        $user->buildings()->sync(
            $this->fetchBuildings()->keyBy('id')->keys()
        );
    }

    /**
     * @param string $resource
     * @return \App\Resource
     */
    private function createResource(string $resource): \App\Resource
    {
        return factory(\App\Resource::class)->create([
            'name' => $resource
        ]);
    }

    /**
     * @param \App\Resource $resource
     * @return \App\BuildingType
     */
    private function createBuildingType(\App\Resource $resource): \App\BuildingType
    {
        return factory(\App\BuildingType::class)->create([
            'resource_id' => $resource->id
        ]);
    }

    /**
     * @param \App\BuildingType $buildingType
     */
    private function createBuilding(\App\BuildingType $buildingType)
    {
        factory(\App\Building::class)->create([
            'building_type_id' => $buildingType->id
        ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    private function fetchBuildings(): \Illuminate\Support\Collection
    {
        return Building::on()->get();
    }
}
