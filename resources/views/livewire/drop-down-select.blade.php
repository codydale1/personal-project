<div class="w-40 flex gap-4 items-center">
    <label class="text-sm font-medium text-gray-900">{{$title}}</label>
    <select
        wire:model.live="value"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
        <option value="">All</option>
        @foreach ($options as $label => $value)
        <option value="{{ $value }}">{{ $label }}</option>
        @endforeach
    </select>
</div>
