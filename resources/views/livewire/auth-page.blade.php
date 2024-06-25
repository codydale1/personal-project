<div class="min-h-screen flex flex-col items-center gap-16 px-4">
    <h1 class="mt-10 text-center text-4xl font-medium text-slate-600">
        Sign in to your account
    </h1>
    <div class="w-full max-w-lg">
        <x-card class="py-8 px-16">
            <form action="{{ route('auth.store') }}" method="POST">
                @csrf
                <div class="mb-8">
                    <label class="form-label">E-mail</label>
                    <x-text-input name="email" placeholder="johncena@gmail.com" 
                        required 
                        class="form-input" />
                </div>
                <div class="mb-8">
                    <label class="form-label">Password</label>
                    <x-text-input name="password" 
                    required 
                    type="password" 
                    class="form-label"/>
                </div>
                <div class="mb-8 flex justify-between text-sm font-medium">
                    <div>
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" name="remember" class="rounded-sm border border-slate-400">
                            <label>Remember me</label>
                        </div>
                    </div>
                    <div>
                        <a href="#" class="text-indigo-600 hover:underline">
                            Forget password?
                        </a>
                    </div>
                </div>
                <x-button type="submit" class="bg-blue-700 hover:bg-blue-800">Login</x-button>
            </form>
        </x-card>
    </div>
</div>
