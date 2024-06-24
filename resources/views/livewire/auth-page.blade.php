<div class="min-h-screen flex flex-col items-center gap-16 px-4">
    <h1 class="mt-10 text-center text-4xl font-medium text-slate-600">
        Sign in to your account
    </h1>
    <div class="w-full max-w-lg">
        <x-card class="py-8 px-16">
            <form action="{{ route('auth.store') }}" method="POST">
                @csrf
                <div class="mb-8">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">E-mail</label>
                    <x-text-input name="email" placeholder="johncena@gmail.com" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                </div>
                <div class="mb-8">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                    <x-text-input name="password" required type="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                </div>
                <div class="mb-8 flex justify-between text-sm font-medium">
                    <div>
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" name="remember" class="rounded-sm border border-slate-400">
                            <label for="remember">Remember me</label>
                        </div>
                    </div>
                    <div>
                        <a href="#" class="text-indigo-600 hover:underline">
                            Forget password?
                        </a>
                    </div>
                </div>
                <x-button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</x-button>
            </form>
        </x-card>
    </div>
</div>
