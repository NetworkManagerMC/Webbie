<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
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
    protected $table = 'accounts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'password',
        'usergroup',
        'notifications',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'notifications' => 'array',
    ];

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'username';
    }

    /**
     * The group for the model.
     *
     * @return HasOne
     */
    public function group(): HasOne
    {
        return $this->hasOne(Group::class, 'name', 'usergroup');
    }

    /**
     * Determine if the user has the given permissions.
     *
     * This is an AND check.
     *
     * @param array|string $permissions
     * @return bool
     */
    public function hasPermissions(array|string $permissions): bool
    {
        return $this->group->hasPermissions($permissions);
    }

    /**
     * Determine if the user has any of the given permissions.
     *
     * This is an OR check.
     *
     * @param array|string $permissions
     * @return bool
     */
    public function hasAnyPermissions(array|string $permissions): bool
    {
        return $this->group->hasAnyPermissions($permissions);
    }
}
