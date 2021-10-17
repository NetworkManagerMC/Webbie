@props(['value' => '', 'icon' => false])

<a {{ $attributes->merge(['class' => 'nav-link']) }}>
    @if ($icon)
        <x-sidebar.icon :icon="$icon" />
    @endif
    {{ empty($value) ? $slot : $value }}
</a>
