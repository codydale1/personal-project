<tr wire:key="{{$applicant->id}}" class="hover:bg-gray-100  dark:hover:bg-gray-800 hover:text-white">
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
    <td class="data-text flex gap-2">
    <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 disabled:opacity-50 disabled:pointer-events-none dark:text-red-500 dark:hover:text-red-400">Edit</button>
    </td>
</tr>