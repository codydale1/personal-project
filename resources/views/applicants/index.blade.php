<x-layout>
  <div class="flex flex-col items-center justify-center">
    <x-card class="mb-4 text-sm" x-data="">
      <form x-ref="filters" id="filtering-form" action="{{route('applicants.index')}}" method="GET">
        <div class="mb-4 grid grid-cols-2 gap-4">
          <div>
            <div class="mb-1 font-semibold">
              Search
            </div>
            <x-text-input 
              name="search" 
              value="{{request('search')}}" 
              placeholder="Search for applicant's name"
              formRef="filters"/>
            </div>
            <div>
              <div class="mb-1 font-semibold">
                Salary
            </div>
            <div class="flex space-x-2">
              <x-text-input 
                name="min_salary" 
                value="{{request('min_salary')}}" 
                placeholder="From"
                formRef="filters"/>
              <x-text-input 
                name="max_salary" 
                value="{{request('max_salary')}}" 
                placeholder="To"
                formRef="filters"/>
            </div>
          </div>
        </div>
        <div class="my-4 p-3 grid grid-cols-4 gap-4">
          <div>
            <x-radio-group name="main_filter" 
              :options="\App\Models\Applicant::$mainFilters"/>
          </div>
          <div>
            <div class="mb-1 font-semibold">Experience</div>
            <x-radio-group name="experience" 
              :options="array_combine(
              array_map('ucfirst', \App\Models\Applicant::$experience),
              \App\Models\Applicant::$experience)"/>
            </div>
          <div>
            <div class="mb-1 font-semibold">Category</div>
              <x-radio-group name="category" 
                :options="\App\Models\Applicant::$category"/>
            </div>
            <div>
              <div class="mb-1 font-semibold">Status</div>
                <x-radio-group name="status" 
                  :options="\App\Models\Applicant::$status"/>
            </div>
        </div>
        <div class="flex items-center gap-2">
          <x-button class="w-full">
            Filter
          </x-button>
          <x-button class="w-full">
            Clear
          </x-button>
          <x-button class="w-full">
            Delete
          </x-button>
        </div>
      </form>
    </x-card> 
<div class="overflow-x-auto max-w-max min-w-max">
  <div class="p-1.5 inline-block align-middle">
    <x-card>
      <table class="max-w-3xl divide-y divide-gray-500 dark:divide-neutral-700">
        <thead>
          <tr class="divide-x divide-gray-200 bg-gray-200">
            <th>
              <div class="flex pl-4 items-center">
                <input id="select_all" type="checkbox" class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-neutral-100 dark:border-neutral-700">
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
            <x-row :$applicant></x-row>
          @endforeach
        </tbody>
      </table>
    </x-card>
    @if($applicants->count())
    <div class="my-10">
      {{$applicants->links()}}
    </div>
    @endif
  </div>
</div>
</div>
</x-layout>

