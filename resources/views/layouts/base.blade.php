<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>
        {{ config('app.name') }}
        @if ($attributes->has('title'))
            | {{ $attributes->get('title') }}
        @endif
    </title>

    @includeWhen($attributes->has('assets'), 'assets.'.$attributes->get('assets'))

    @stack('meta')
    @stack('favicon')
    @stack('fonts')
    @stack('styles')
    @stack('scripts')
</head>
<body {{ $attributes->except(['title', 'assets']) }}>
    {{ $slot }}

    @stack('modals')
</body>
</html>
