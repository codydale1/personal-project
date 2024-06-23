<div>
  <section class="mt-10">
    <div class="mx-auto max-w-screen-full">
      <div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden">
        <div class="flex items-center justify-between p-4">
          <div class="flex gap-4">
            <div class="relative max-w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                    fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                   <path fill-rule="evenodd"
                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                    clip-rule="evenodd" />
                  </svg>
                </div>
                <input
                  wire:model.live.debounce.200ms="search" 
                  type="text"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                  placeholder="Search" required="">
            </div>
            <div class="mx-3 flex gap-4">
            <div class="relative max-w-40">
                <input
                  wire:model.live.debounce.200ms="min_salary" 
                  type="text"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2 "
                  placeholder="Minimum Salary" required="">
            </div>
            <div class="relative max-w-40">
                <input
                  wire:model.live.debounce.200ms="max_salary" 
                  type="text"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2 "
                  placeholder="Maximum Salary" required="">
            </div>
            </div>
          </div>
  <div class="flex justify-end items-center gap-6">
    <div class="flex space-x-3">
      <div class="w-full flex gap-4 items-center">
        <label class="text-sm font-medium text-gray-900">Status</label>
          <select
            wire:model.live="status"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-32 p-2.5">
          <option value="">All</option>
          @foreach (App\Models\Applicant::$status as $label => $value)
            <option value="{{ $value }}">{{ $label }}</option>
          @endforeach
          </select>
      </div>
    </div>
    <div class="flex space-x-3">
      <div class="w-full flex gap-4 items-center">
        <label class="text-sm font-medium text-gray-900">Experience</label>
          <select
            wire:model.live="experience"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-32 p-2.5">
          <option value="">All</option>
          @foreach (App\Models\Applicant::$experience as $label => $value)
            <option value="{{ $value }}">{{ $label }}</option>
          @endforeach
          </select>
      </div>
    </div>
    <div class="flex space-x-3">
      <div class="w-full flex gap-4 items-center">
        <label class="text-sm font-medium text-gray-900">Job Category</label>
          <select
            wire:model.live="category"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-48 p-2.5">
          <option value="">All</option>
          @foreach (App\Models\Applicant::$category as $label => $value)
            <option value="{{ $value }}">{{ $label }}</option>
          @endforeach
          </select>
        </div>
      </div>
    </div>
  </div>
  <div class="m-1">
    <div class="overflow-x-auto w-full">
      <table class="divide-y divide-gray-500">
        <thead>
          <tr class="divide-x divide-gray-200 bg-gray-200">
            <th>
              <div class="flex pl-4 items-center">
                <input id="select_all" type="checkbox" class="border-gray-200 rounded text-blue-600 focus:ring-blue-500">
              </div>
            </th>
            <th class="header-text">First Name</th>
            <th class="header-text">Last Name</th>
            <th class="header-text">Age</th>
            <th class="header-text">Expected Salary</th>
            <th class="header-text">Address</th>
            <th class="header-text">Job Type(Category)</th>
            <th class="header-text">Experience</th>
            <th class="header-text">Status</th>
            <th class="header-text text-end">Action</th>
          </tr>
        </thead>
          <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
            @foreach ($applicants as $applicant)
              <livewire:applicant-row :$applicant/>
            @endforeach
          </tbody>
      </table>
    </div>
</div>
  <div class="py-4 px-3">
    <div class="flex ">
      @livewire('applicants-per-page')
    </div>
  </div>
  @if($applicants->count())
    <div class="mb-6">
      {{$applicants->links()}}
    </div>
  @endif
  </div>
</div>
</section>
</div>