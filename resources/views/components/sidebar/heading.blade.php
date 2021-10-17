@props(['value' => ''])

<div {{ $attributes->merge(['class' => 'sb-sidenav-menu-heading']) }}>
    {{ empty($value) ? $slot : $value }}
</div>
