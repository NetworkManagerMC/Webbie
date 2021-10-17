<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
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
    protected $table = 'accountgroups';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'administrator',
        'view_analytics',
        'view_network',
        'view_players',
        'view_chat',
        'edit_chat',
        'view_filter',
        'edit_filter',
        'view_punishments',
        'edit_punishments',
        'view_accounts',
        'edit_accounts',
        'view_addons',
        'view_tickets',
        'view_ticket',
        'respond_ticket',
        'close_ticket',
        'assign_ticket',
        'view_chatlogs',
        'edit_chatlog',
        'view_permissions',
        'edit_permissions',
        'view_commandblocker',
        'edit_commandblocker',
        'view_announcements',
        'edit_announcements',
        'view_reports',
        'edit_reports',
        'view_helpop',
        'edit_helpop',
        'view_tags',
        'edit_tags',
        'view_servers',
        'edit_servers',
        'view_languages',
        'edit_languages',
        'view_pre_punishments',
        'edit_pre_punishments',
        'show_ip',
    ];

    /**
     * The users for the model.
     *
     * @return HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'usergroup', 'name');
    }
}
