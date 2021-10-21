<div class="d-grid gap-3">
    <x-booty-set wire:model.defer="connectionHost"     name="connectionHost"     :label="__('install.connection.host')" />
    <x-booty-set wire:model.defer="connectionPort"     name="connectionPort"     :label="__('install.connection.port')" />
    <x-booty-set wire:model.defer="connectionDatabase" name="connectionDatabase" :label="__('install.connection.database')" />
    <x-booty-set wire:model.defer="connectionUsername" name="connectionUsername" :label="__('install.connection.username')" />
    <x-booty-set wire:model.defer="connectionPassword" name="connectionPassword" :label="__('install.connection.password')" type="password" />
</div>
