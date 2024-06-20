<x-layout>
<div class="flex flex-col">
  <div class="-m-1.5 overflow-x-auto">
    <div class="p-1.5 min-w-full inline-block align-middle">
      <div class="overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
          <thead>
            <tr>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-black-500 uppercase">Name</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-black-500 uppercase">Age</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-black-500 uppercase">Address</th>
              <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-black-500 uppercase">Action</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
            @foreach ($applicants as $applicant)
            <tr class="hover:bg-gray-100  dark:hover:bg-gray-800 hover:text-white">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">John Brown</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm">45</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm ">New York No. 1 Lake Park</td>
              <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400">Delete</button>
              </td>
            </tr>
            @endforeach


          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</x-layout>

