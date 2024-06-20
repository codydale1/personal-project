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
        <div class="my-4 p-3 grid grid-cols-3 gap-4">
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
        <x-button class="w-full">
            Filter
        </x-button>
    </form>
    </x-card>
 <x-card>
        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
          <thead>
            <tr>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-black-500 uppercase">First Name</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-black-500 uppercase">Last Name</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-black-500 uppercase">Age</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-black-500 uppercase">Expected Salary</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-black-500 uppercase">Address</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-black-500 uppercase">Job Type(Category)</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-black-500 uppercase">Experience</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-black-500 uppercase">Status</th>
              <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-black-500 uppercase">Action</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
            @foreach ($applicants as $applicant)
            <tr class="hover:bg-gray-100  dark:hover:bg-gray-800 hover:text-white">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">{{$applicant->first_name}}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm">{{$applicant->last_name}}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm ">
              {{ floor(\Carbon\Carbon::parse($applicant->birthday)->diffInYears(\Carbon\Carbon::now())) }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm ">Php {{number_format($applicant->salary)}}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm ">{{$applicant->address}}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm ">{{ $applicant->getCategoryKey() }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm ">{{ $applicant->getExperienceKey() }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm ">{{ $applicant->getStatusKey() }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
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

