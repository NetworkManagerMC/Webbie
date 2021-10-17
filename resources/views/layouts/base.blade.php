<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack('meta')

    <title>
        {{ config('app.name') }}
        @if ($attributes->has('title'))
            | {{ $attributes->get('title') }}
        @endif
    </title>

    @includeWhen($attributes->has('assets'), 'assets.'.$attributes->get('assets'))

    @stack('favicon')
    @stack('fonts')

    @livewireStyles
    @stack('styles')

    @livewireScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.4.2/cdn.min.js" integrity="sha512-Ggh9DYKMB04uOmJlra3yKB/Fk/mxjbehmixi/Jy+omCWFGNZEBwGkPz0+R+zgzZfGsHBGB8e4UsYedB32MJ/QQ==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    <script src="{{ asset('js/modals.min.js') }}" defer></script>
    @stack('scripts')
</head>
<body {{ $attributes->except(['title', 'assets']) }}>
    {{ $slot }}

    @livewire('modals')
</body>
</html>
