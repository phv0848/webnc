<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mt-4">
            <label for="email">email:</label>
            <input type="text" name="email">
        </div>

        <div class="mt-4">
            <label for="password">mat khau:</label>
            <input type="password" name="password">
        </div>
        <div class="mt-4">
            <label for="password">lap lai mat khau:</label>
            <input type="password" name="password_confirmation">
        </div>

        <div class="mt-4">
            <label for="name">ho va ten:</label>
            <input type="text" name="name">
        </div>

        <div class="mt-4">
            <label for="phone">so dien thoai:</label>
            <input type="text" name="phone">
        </div>

        <div class="mt-4">
            <label for="address">dia chi:</label>
            <input type="text" name="address">
        </div>


        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <button class="btn btn-outline-primary">Dang ky</button>
        </div>
    </form>
</x-guest-layout>
