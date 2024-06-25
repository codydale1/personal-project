<div class="flex items-center justify-center h-full">
<x-card>
<div class="p-10 mt-4">
<form wire:submit="submitForm" class="max-w-lg mx-auto">
    <div class="flex gap-4 mb-5">
        <div>
            <label class="form-label">First Name</label>
            <input wire:model="form.first_name" 
                type="text" 
                class="form-input" />
            @error('form.first_name')
                <span class="error-message">{{$message}}</span>
            @enderror
        </div>
        <div>
            <label class="form-label">Last Name</label>
            <input wire:model="form.last_name" 
                type="text"
                class="form-input" />
            @error('form.last_name')
                <span class="error-message">{{$message}}</span>
            @enderror
        </div>
    </div>
        <div class="mb-5">
            <label class="form-label">Birthday</label>
            <input wire:model="form.birthday" 
                type="date" 
                class="form-input" />
            @error('form.birthday')
                <span class="error-message">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-5">
            <label class="form-label">Expected Salary</label>
            <input wire:model="form.salary" 
                type="text" 
                class="form-input" />
            @error('form.salary')
                <span class="error-message">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-5">
            <label class="form-label">Address</label>
            <input wire:model="form.address" 
                type="text" 
                class="form-input" />
            @error('form.address')
                <span class="error-message">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-5">
            <label class="form-label">Job Category</label>
            <select wire:model="form.category" 
                class="form-input">
                @foreach (App\Models\Applicant::$category as $label => $value)
                    <option value="{{ $value }}">{{ $label }}</option>
                @endforeach
            </select>
            @error('form.category')
                <span class="error-message">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-5">
            <label class="form-label">Experience Level</label>
            <select wire:model="form.experience" 
                class="form-input">
                @foreach (App\Models\Applicant::$experience as $label => $value)
                    <option value="{{ $value }}">{{ $label }}</option>
                @endforeach
            </select>
            @error('form.experience')
                <span class="error-message">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-5">
            <label class="form-label">Status</label>
            <select wire:model="form.status" 
                class="form-input">
                @foreach (App\Models\Applicant::$status as $label => $value)
                    <option value="{{ $value }}">{{ $label }}</option>
                @endforeach
            </select>
            @error('form.experience')
                <span class="text-red-500 text-xs">{{$message}}</span>
            @enderror
        </div>
    <div class="mt-10 flex items-center justify-center">
        <x-button type="submit" class="bg-blue-700 hover:bg-blue-800">Edit Applicant</x-button>
    </div>
</form>
</div>
</x-card>
</div>