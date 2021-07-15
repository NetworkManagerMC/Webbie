@props(['value' => ''])

<h6 {{ $attributes->merge(['class' => 'collapse-header']) }}>
    {{ empty($value) ? $slot : $value }}
</h6>
