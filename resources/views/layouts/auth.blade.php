<x-base-layout class="bg-primary" {{ $attributes->merge(['assets' => 'sb-admin']) }}>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    {{ $slot }}
                </div>
            </main>
        </div>

        <div id="layoutAuthentication_footer">
            @include('components.footer')
        </div>
    </div>
</x-base-layout>
