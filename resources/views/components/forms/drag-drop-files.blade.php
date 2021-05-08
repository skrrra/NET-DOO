<div class="flex flex-col flex-grow mb-3">
    <div x-data="{ files: [] }" id="FileUpload" class="block w-full mt-2 py-2 px-3 relative bg-gray-50 appearance-none border-2 border-gray-300 border-solid rounded-md hover:shadow-outline-gray">
        <input type="file" multiple
            name="image[]"
            class="absolute inset-0 z-30 m-0 p-0 w-full h-full outline-none opacity-0"
            x-on:change="files = $event.target.files"
            x-on:dragover="$el.classList.add('active')" x-on:dragleave="$el.classList.remove('active')" x-on:drop="$el.classList.remove('active')"
        >
        <template x-if="files !== []">
            <div class="flex flex-col space-y-1">
                <template x-for="(_,index) in Array.from({ length: files.length })">
                    <div class="flex flex-row items-center space-x-2">
                        <template x-if="files[index].type.includes('image/')"><i class="far fa-file-image fa-fw"></i></template>
                        <span class="font-medium text-gray-900" x-text="files[index].name">Uploading</span>
                    </div>
                </template>
            </div>
        </template>
        <template x-if="files.length == 0">
            <div class="flex flex-col space-y-2 items-center justify-center">
                <div class="space-y-1 text-center py-4">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                        <label for="file-upload" class="relative cursor-pointer bg-gray-50 dark:bg-gray-700 dark:border-gray-700 dark:hover:text-blue-300 rounded-md font-medium text-blue-600 dark:text-blue-300 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                            <span>Upload a file</span>
                            <input id="file-upload" name="image" type="file" class="sr-only" multiple>
                        </label>
                        <p class="pl-1">or drag and drop</p>
                    </div>
                    <p class="text-xs text-gray-500">
                        PNG, JPG, GIF up to 10MB
                    </p>
                </div>
            </div>
        </template>
    </div>
    @error('image')
        <div>
            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
        </div>
    @enderror
</div>
