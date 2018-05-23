<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Resource
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property int $gold
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Resource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Resource whereGold($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Resource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Resource whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Resource whereUserId($value)
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Resource whereName($value)
 */
class Resource extends Model
{
    //
}
