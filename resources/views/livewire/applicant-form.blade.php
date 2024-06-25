<div class="p-6 mt-4">
<form wire:submit="submitForm" class="max-w-lg mx-auto">
    <div class="flex gap-4">
        <div class="mb-5">
            <label for="first_name" class="block mb-3 text-sm font-medium text-gray-900">First Name</label>
            <input wire:model="form.first_name" type="text" id="first_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
            @error('form.first_name')
                <span class="text-red-500 text-xs">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-5">
            <label for="last_name" class="block mb-3 text-sm font-medium text-gray-900">Last Name</label>
            <input wire:model="form.last_name" type="text" id="last_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
            @error('form.last_name')
                <span class="text-red-500 text-xs">{{$message}}</span>
            @enderror
        </div>
    </div>
        <div class="mb-5">
            <label for="birthday" class="block mb-3 text-sm font-medium text-gray-900">Birthday</label>
            <input wire:model="form.birthday" type="date" id="birthday" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
            @error('form.birthday')
                <span class="text-red-500 text-xs">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-5">
            <label for="salary" class="block mb-3 text-sm font-medium text-gray-900">Expected Salary</label>
            <input wire:model="form.salary" type="text" id="salary" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
            @error('form.salary')
                <span class="text-red-500 text-xs">{{$message}}</span>
            @enderror
        </div>
    <div class="mb-5">
        <label for="address" class="block mb-3 text-sm font-medium text-gray-900">Address</label>
        <input wire:model="form.address" type="text" id="address" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
        @error('form.address')
                <span class="text-red-500 text-xs">{{$message}}</span>
            @enderror
    </div>
    <div class="mb-5">
        <label for="category" class="block mb-3 text-sm font-medium text-gray-900">Job Category</label>
        <select wire:model="form.category" id="category" class="bg-gray-50 border w-full border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
            @foreach (App\Models\Applicant::$category as $label => $value)
                <option value="{{ $value }}">{{ $label }}</option>
            @endforeach
        </select>
        @error('form.category')
                <span class="text-red-500 text-xs">{{$message}}</span>
            @enderror
    </div>
    <div class="mb-5">
        <label for="experience" class="block mb-3 text-sm font-medium text-gray-900">Experience Level</label>
        <select wire:model="form.experience" id="experience" class="bg-gray-50 border w-full border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
            @foreach (App\Models\Applicant::$experience as $label => $value)
                <option value="{{ $value }}">{{ $label }}</option>
            @endforeach
        </select>
        @error('form.experience')
                <span class="text-red-500 text-xs">{{$message}}</span>
            @enderror
    </div>
    <div class="mt-10 flex items-center justify-center">
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Applicant Data</button>
    </div>
</form>
</div>