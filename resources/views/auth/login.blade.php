<x-auth-layout>
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Login</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <x-booty-set :value="old('username')" name="username" label="Username" />
                        </div>

                        <div class="mb-3">
                            <x-booty-set name="password" label="Password" type="password" />
                        </div>

                        <div class="d-flex align-items-center justify-content-end mt-4 mb-0">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-auth-layout>
