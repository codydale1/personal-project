<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>User Management System</title>
        <script src="https://cdn.tailwindcss.com"></script>
        @livewireStyles
    </head>
    <body
    class="mx-auto mt-10 text-slate-700 bg-gray-200">
    <nav class="mb-8 flex items-center gap-6 justify-start text-lg font-medium">
      @auth
    <ul class="pl-4 flex space-x-2">
      <li>
        <a href="{{ route('applicants') }}">Home</a>
      </li>
    </ul>
    @endauth

    <ul class="flex gap-5 absolute right-0 pr-4">
      @auth
        <li>
          {{ auth()->user()->name ?? 'Anynomus' }}
        </li>
        <li>
          <form action="{{ route('auth.destroy') }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Logout</button>
          </form>
        </li>
      @endauth
    </ul>
  </nav>

    @livewireScripts
        {{$slot}}
    </body>
</html>
