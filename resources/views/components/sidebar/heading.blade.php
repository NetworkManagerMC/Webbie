@props(['value' => ''])

<div {{ $attributes->merge(['class' => 'sidebar-heading']) }}>
    {{ empty($value) ? $slot : $value }}
</div>
