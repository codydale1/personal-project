<div>
    <button @click="$dispatch('open-modal')" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400">
        {{$applicant->first_name}}
    </button>
    <div x-data = "{show : false}", x-show ="show" 
        x-on:open-modal.window = "show = true"
        x-on:close-modal.window= "show = false">
        @livewire('delete-modal', [$applicant])
    </div>
</div>