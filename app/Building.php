<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Building
 *
 * @property int $id
 * @property string $name
 * @property int $gold_cost
 * @property int $food_cost
 * @property int $wood_cost
 * @property int $stone_cost
 * @property int $metal_cost
 * @property float $cost_modifier
 * @property int $production
 * @property float $production_base
 * @property float $production_modifier
 * @property int $energy
 * @property float $energy_base
 * @property int $construction
 * @property float $construction_base
 * @property float $construction_modifier
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Building[] $buildings
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereConstruction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereConstructionBase($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereConstructionModifier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereCostModifier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereEnergy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereEnergyBase($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereFoodCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereGoldCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereMetalCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereProduction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereProductionBase($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereProductionModifier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereStoneCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereWoodCost($value)
 * @mixin \Eloquent
 */
class Building extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'gold_cost',
        'food_cost',
        'wood_cost',
        'stone_cost',
        'metal_cost',
        'cost_modifier',
        'production',
        'production_base',
        'production_modifier',
        'energy',
        'energy_base',
        'construction',
        'construction_base',
        'construction_modifier',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'name'                  => 'string',
        'gold_cost'             => 'int',
        'food_cost'             => 'int',
        'wood_cost'             => 'int',
        'stone_cost'            => 'int',
        'metal_cost'            => 'int',
        'cost_modifier'         => 'float',
        'production'            => 'int',
        'production_base'       => 'float',
        'production_modifier'   => 'float',
        'energy'                => 'int',
        'energy_base'           => 'float',
        'construction'          => 'int',
        'construction_base'     => 'float',
        'construction_modifier' => 'float',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function buildings(): BelongsToMany
    {
        return $this->belongsToMany(Building::class)->withPivot('level');
    }

    /**
     * todo Last (1) in formule is TECH
     * @param string $resource
     * @return float
     */
    public function cost(string $resource): float
    {
        return
            $this->attributes[$resource . '_cost'] *
            $this->getLevel(auth()->user()) *
            (pow($this->attributes['cost_modifier'], $this->getLevel(auth()->user()))) *
            (1);
    }

    /**
     * @param User|Authenticatable $user
     * @return int
     */
    private function getLevel(User $user): int
    {
        return $user->buildings()->where('id', '=', $this->id)->first()->pivot->level;
    }
}
