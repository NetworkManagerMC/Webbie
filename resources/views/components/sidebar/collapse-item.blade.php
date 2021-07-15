@props(['value' => ''])

<a {{ $attributes->merge(['class' => 'collapse-item']) }}>
    {{ empty($value) ? $slot : $value }}
</a>
