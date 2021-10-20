<div>
    <h6>System Requirements</h6>
    <hr />
    <ul class="list-group">
        @php
            $listGroupItemBaseClasses = 'list-group-item d-flex justify-content-between align-items-center';
        @endphp

        <li @class([$listGroupItemBaseClasses, 'list-group-item-success'])>
            PHP - version
            <span class="badge bg-primary rounded-pill">{{ $systemRequirements['php']['current'] }}</span>
        </li>

        @foreach ($systemRequirements['modules']['requirements'] as $module => $requirements)
            @foreach ($requirements as $name => $value)
                <li @class([
                    $listGroupItemBaseClasses,
                    'list-group-item-success' => $value,
                    'list-group-item-error' => ! $value,
                ])>
                    {{ strtoupper($module) }} - {{ $name }}
                    <span class="badge bg-primary rounded-pill">{{ $value ? 'Yes' : 'No' }}</span>
                </li>
            @endforeach
        @endforeach

    </ul>
</div>
