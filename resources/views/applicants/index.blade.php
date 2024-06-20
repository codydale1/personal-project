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
                :options="['Added By You']"/>
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
              <x-radio-group name="category" :options="\App\Models\Applicant::$category"/>
            </div>
            <div>
              <div class="mb-1 font-semibold">Status</div>
                <x-radio-group name="status" :options="\App\Models\Applicant::$status"/>
            </div>
          </div>
          <div class="flex items-center gap-2">
          <x-button class="w-full">
            Filter
        </x-button>
        <x-button class="w-full">
            Clear
        </x-button>
          </div>
    </form>
    </x-card>
 <x-card>
        <table class="max-w-3xl divide-y divide-gray-500 dark:divide-neutral-700">
          <thead>
            <tr class="divide-x divide-gray-200 bg-gray-200">
              <th class="header-text">First Name</th>
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
            <tr class="hover:bg-gray-100  dark:hover:bg-gray-800 hover:text-white">
            <td class="py-3 pl-4">
                <div class="flex items-center h-5">
                  <input id="hs-table-checkbox-2" type="checkbox" class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-neutral-100 dark:border-neutral-700">
                  <label for="hs-table-checkbox-2" class="sr-only">Checkbox</label>
                </div>
              </td>
              <td class="data-text">{{$applicant->first_name}}</td>
              <td class="data-text">{{$applicant->last_name}}</td>
              <td class="data-text">
              {{ floor(\Carbon\Carbon::parse($applicant->birthday)->diffInYears(\Carbon\Carbon::now())) }}
              </td>
              <td class="data-text">Php {{number_format($applicant->salary)}}</td>
              <td class="data-text">{{$applicant->address}}</td>
              <td class="data-text">{{ $applicant->getCategoryKey() }}</td>
              <td class="data-text">{{ $applicant->getExperienceKey() }}</td>
              <td class="data-text">{{ $applicant->getStatusKey() }}</td>
              <td class="data-text">
              <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 disabled:opacity-50 disabled:pointer-events-none dark:text-red-500 dark:hover:text-red-400">Edit</button>
              <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400">Delete</button>
              </td>
            </tr>
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
</x-layout>

