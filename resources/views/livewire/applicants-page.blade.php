<div>
    <section class="mt-10">
        <div class="mx-auto max-w-screen-full">
            <!-- Start coding here -->
            <div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex items-center justify-between d p-4">
                    <div class="flex">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input
                                wire:model.change.debounce.200ms="search"  
                                type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                                placeholder="Search" required="">
                        </div>
                    </div>
                    <div class="flex space-x-3">
                        <div class="flex space-x-3 items-center">
                            <label class="w-40 text-sm font-medium text-gray-900">User Type :</label>
                            <select 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="">All</option>
                                <option value="0">User</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                    </div>
                </div>
    <x-card class="mb-4 text-sm" x-data="">
      <form x-ref="filters" id="filtering-form" action="{{route('applicants')}}" method="GET">
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
    <x-card class="m-1">
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
            <x-row :$applicant></x-row>
          @endforeach
        </tbody>
      </table>
  </div>
  </x-card>
  <div class="py-4 px-3">
                    <div class="flex ">
                        <div class="flex space-x-4 items-center mb-3">
                            <label class="w-32 text-sm font-medium text-gray-900">Per Page</label>
                            <select wire:model.live='perPage'
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
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