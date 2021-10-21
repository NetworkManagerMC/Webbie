<x-auth-layout>
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">{{ __('auth.login') }}</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <x-booty-set :value="old('username')" name="username" :label="__('auth.username')" />
                        </div>

                        <div class="mb-3">
                            <x-booty-set name="password" :label="__('auth.password')" type="password" />
                        </div>

                        <div class="d-flex align-items-center justify-content-end mt-4 mb-0">
                            <button type="submit" class="btn btn-primary">{{ __('auth.login') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-auth-layout>
