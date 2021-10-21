<div>
    <h6>{{ __('install.system-requirements.title') }}</h6>

    <hr />

    @if ($systemRequirements['modules']['errors'])
        <div class="alert alert-danger">{{ __('install.system-requirements.missing') }}</div>
    @endif

    <ul class="list-group">
        @php
            $listGroupItemBaseClasses = 'list-group-item d-flex justify-content-between align-items-center';
        @endphp

        <li @class([
            $listGroupItemBaseClasses,
            'list-group-item-success' => $systemRequirements['php']['supported'],
            'list-group-item-danger' => ! $systemRequirements['php']['supported'],
        ])>
            PHP - {{ __('general.version') }}
            <span class="badge bg-primary rounded-pill">
                @if (! $systemRequirements['php']['supported'])
                    {{ __('install.system-requirements.php-version-not-met', ['required' => $systemRequirements['php']['minimum']]) }}
                @endif
                {{ $systemRequirements['php']['current'] }}
            </span>
        </li>

        @foreach ($systemRequirements['modules']['requirements'] as $module => $requirements)
            @foreach ($requirements as $name => $value)
                <li @class([
                    $listGroupItemBaseClasses,
                    'list-group-item-success' => $value,
                    'list-group-item-danger' => ! $value,
                ])>
                    {{ strtoupper($module) }} - {{ $name }}
                    <span class="badge bg-primary rounded-pill">{{ $value ? 'Yes' : 'No' }}</span>
                </li>
            @endforeach
        @endforeach

    </ul>
</div>
