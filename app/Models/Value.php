<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class Value extends Model
{
    /**
     * The connection name for the model.
     *
     * @var string|null
     */
    protected $connection = 'manager';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'values';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'variable',
        'value',
        'version',
    ];
}
