<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Building
 *
 * @property int $id
 * @property string $name
 * @property int $building_type_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\BuildingType $buildingType
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereBuildingTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Building whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Building extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * @var array
     */
    protected $with = [
        'buildingType',
    ];

    /**
     * @return BelongsTo
     */
    public function buildingType(): BelongsTo
    {
        return $this->belongsTo(BuildingType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot('level');
    }
}
