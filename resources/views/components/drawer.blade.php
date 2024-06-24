@props([ 'title', 'applicant'])

<div x-data="{ show: false, title: '{{ $title }}' }" 
    x-show="show"
    x-on:open-modal.window="console.log($event.detail); show = ($event.detail.title === title)" 
    x-on:close-modal.window="console.log($event.detail); show = false"
    x-on:keydown.escape.window="console.log($event.detail); show = false" 
    style="display: none;" 
    class="fixed inset-0 z-50 overflow-hidden"
    x-transition:enter="transform transition ease-in-out duration-300"
    x-transition:enter-start="translate-x-full"
    x-transition:enter-end="translate-x-0"
    x-transition:leave="transform transition ease-in-out duration-300"
    x-transition:leave-start="translate-x-0"
    x-transition:leave-end="translate-x-full">
    
    {{-- Drawer Body --}}
    <div class="absolute right-0 top-0 h-full w-full max-w-lg bg-white shadow-xl overflow-y-auto">
        @if (isset($title))
            <div class="px-4 py-3 flex text-center items-center justify-between border-b border-gray-300">
                <div class="text-xl m-1 text-gray-800">{{ $title }} Applicant</div>
                <button x-on:click="$dispatch('close-modal')">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        @endif
        <div class="p-6 mt-4">
            <form class="max-w-lg mx-auto">
            <div class="flex gap-4">
            <div class="mb-5">
                <label for="first_name" class="block mb-3 text-sm font-medium text-gray-90">First Name</label>
                <input type="first_name" id="first_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
            </div>
            <div class="mb-5">
                <label for="last_name" class="block mb-3 text-sm font-medium text-gray-90">Last Name</label>
                <input type="last_name" id="last_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
            </div>
            </div>
            <div class="flex gap-4">
            <div class="mb-5">
                <label for="birthday" class="block mb-3 text-sm font-medium text-gray-90">Birthday</label>
                <input type="birthday" id="birthday" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
            </div>
            <div class="mb-5">
                <label for="salary" class="block mb-3 text-sm font-medium text-gray-90">Salary</label>
                <input type="salary" id="salary" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
            </div>
            </div>
            <div class="mb-5">
                <label for="address" class="block mb-3 text-sm font-medium text-gray-900">Address</label>
                <input type="address" id="address" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
            </div>
            <div class="mb-5">
                <label for="category" class="block mb-3 text-sm font-medium text-gray-900">Job Category</label>
                <select
                    class="bg-gray-50 border w-full border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                        @foreach (App\Models\Applicant::$category as $label => $value)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                </select>
            </div>
            <div class="mb-5">
                <label for="experience" class="block mb-3 text-sm font-medium text-gray-900">Experience Level</label>
                <select
                    class="bg-gray-50 border w-full border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                        @foreach (App\Models\Applicant::$experience as $label => $value)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                </select>
            </div>
            <div class="mt-10 flex items-center justify-center ">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Applicant Data</button>
            </div>

        </form>
        </div>
    </div>
</div>
