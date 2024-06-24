@props(['applicant'])

<div x-data="{ show: false, title: '' }" 
    x-show="show"
    x-on:open-modal.window="console.log($event.detail); show = true; title = $event.detail.title" 
    x-on:close-modal.window="console.log($event.detail); show = false"
    x-on:keydown.escape.window="console.log($event.detail); show = false" 
    style="display: none;" 
    class="fixed inset-0 z-50 overflow-hidden"
    x-transition:enter="transform transition ease-in-out duration-300"
    x-transition:enter-start="translate-x-full"
    x-transition:enter-end="translate-x-0"
    x-transition:leave="transform transition ease-in-out duration-300"
    x-transition:leave-start="translate-x-0"
    x-transition:leave-end="translate-x-full">
    
    {{-- Drawer Body --}}
    <div class="absolute right-0 top-0 h-full w-full max-w-lg bg-white shadow-xl overflow-y-auto">
        <div class="px-4 py-3 flex text-center items-center justify-between border-b border-gray-300">
            <div class="text-xl m-1 text-gray-800" x-text="`${title} Applicant`"></div>
            <button x-on:click="$dispatch('close-modal')">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        {{ $body }}
    </div>
</div>
