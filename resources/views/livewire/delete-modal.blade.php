<div>
    <div class="fixed bg-opacity-75 inset-0 flex items-center justify-center z-50">
        <div class="bg-gray-900 backdrop-blur-md p-5 rounded-lg shadow-lg">
            <h2 class="text-lg font-bold mb-4">Confirm Deletion</h2>
            <p>Are you sure you want to delete this applicant {{$applicant->first_name}}?</p>
            <div class="mt-4 flex justify-end gap-2">
                <button @click="$dispatch('close-modal')" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg">Cancel</button>
                <button wire:click="onClick" class="bg-red-600 text-white px-4 py-2 rounded-lg">Delete</button>
            </div>
        </div>
    </div>
    <div class="fixed inset-0 bg-opacity-500 z-40"></div>
</div>