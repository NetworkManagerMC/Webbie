<div class="d-grid gap-3">
    <x-booty-set wire:model.defer="username" name="username" :label="__('auth.username')" />
    <x-booty-set wire:model.defer="password" name="password" :label="__('auth.password')" type="password" />
</div>
