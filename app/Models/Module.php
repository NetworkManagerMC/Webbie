<?php

namespace App\Models;

use App\Constants\ModuleTypes;
use Illuminate\Database\Eloquent\Builder;
use InvalidArgumentException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;

class Module extends Value
{
    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope('module', function (Builder $builder): Builder {
            return $builder->where('variable', 'LIKE', '%module_%');
        });
    }

    /**
     * Get the module model from the given key.
     *
     * @param string $key
     * @return static
     * @throws InvalidArgumentException
     * @throws ModelNotFoundException
     */
    public static function for(string $key): static
    {
        return static::query()->where('variable', '=', "module_{$key}")->firstOrFail();
    }

    /**
     * Scope a query to only include enabled models.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeEnabled(Builder $query): Builder
    {
        return $query->where('value', '=', true);
    }

    /**
     * Scope a query to only include disabled models.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDisabled(Builder $query): Builder
    {
        return $query->where('value', '=', false);
    }

    /**
     * Get the name for the model.
     *
     * @return string
     */
    public function getNameAttribute(): string
    {
        return $this->variable;
    }

    /**
     * Get the unprefixed name for the model.
     *
     * @return string
     */
    public function getUnprefixedNameAttribute(): string
    {
        return Str::of($this->name)->replaceFirst('module_', '')->__toString();
    }

    /**
     * Determine if the model is enabled.
     *
     * @return bool
     */
    public function isEnabled(): bool
    {
        return boolval($this->value);
    }

    /**
     * Get the constant for key name for the model.
     *
     * @return string
     * @throws ConstantValueNotFound
     */
    public function constant(): string
    {
        return ModuleTypes::key($this->unprefixed_name);
    }
}
