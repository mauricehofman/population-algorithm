<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\BuildingType
 *
 * @property int $id
 * @property int $resource_id
 * @property int $gold_cost
 * @property int $wood_cost
 * @property int $stone_cost
 * @property int $metal_cost
 * @property float $cost_base
 * @property float $cost_modifier
 * @property int $production
 * @property float $production_base
 * @property float $production_modifier
 * @property int $energy
 * @property float $energy_base
 * @property float $energy_modifier
 * @property int $construction
 * @property float $construction_base
 * @property float $construction_modifier
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Building[] $buildings
 * @property-read \App\Resource $resource
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuildingType whereConstruction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuildingType whereConstructionBase($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuildingType whereConstructionModifier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuildingType whereCostBase($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuildingType whereCostModifier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuildingType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuildingType whereEnergy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuildingType whereEnergyBase($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuildingType whereEnergyModifier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuildingType whereGoldCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuildingType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuildingType whereMetalCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuildingType whereProduction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuildingType whereProductionBase($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuildingType whereProductionModifier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuildingType whereResourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuildingType whereStoneCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuildingType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuildingType whereWoodCost($value)
 * @mixin \Eloquent
 */
class BuildingType extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'gold_cost',
        'food_cost',
        'wood_cost',
        'stone_cost',
        'metal_cost',
        'cost_base',
        'cost_modifier',
        'production',
        'production_base',
        'production_modifier',
        'energy',
        'energy_base',
        'energy_modifier',
        'construction',
        'construction_base',
        'construction_modifier',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'gold_cost'             => 'int',
        'food_cost'             => 'int',
        'wood_cost'             => 'int',
        'stone_cost'            => 'int',
        'metal_cost'            => 'int',
        'cost_base'             => 'float',
        'cost_modifier'         => 'float',
        'production'            => 'int',
        'production_base'       => 'float',
        'production_modifier'   => 'float',
        'energy'                => 'int',
        'energy_base'           => 'float',
        'energy_modifier'       => 'float',
        'construction'          => 'int',
        'construction_base'     => 'float',
        'construction_modifier' => 'float',
    ];

    /**
     * @var array
     */
    protected $with = [
        'resource',
    ];

    /**
     * @return BelongsTo
     */
    public function resource(): BelongsTo
    {
        return $this->belongsTo(Resource::class);
    }

    /**
     * @return HasMany
     */
    public function buildings(): HasMany
    {
        return $this->hasMany(Building::class);
    }

    /**
     * Returns what leveling up will cost
     * Cost * 1.5^(current_level - 1)
     * @param string $resource
     * @return float
     */
    public function cost(string $resource): float
    {
        return
            $this->attributes[$resource . '_cost'] *
            $this->getLevel() *
            (pow($this->attributes['cost_modifier'], ($this->getLevel() - 1)));
    }

    /**
     * Returns what the production currently is
     * Cost * Level * (1.1^(level)) * ( 1 + ((tech_level / 100)) = production per hour
     */
    public function production()
    {
        return
            $this->attributes['production'] *
            $this->getLevel() *
            (pow($this->attributes['production_modifier'], $this->getLevel())) *
            (1);
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return auth()->user()->buildings->where('id', '=', $this->id)->first()->pivot->level;
    }
}
