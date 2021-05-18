@extends('layouts.app')

@section('content')
    <x-admin-panel.layout>

        <div class="bg-white px-4 py-4 border border-gray-200 shadown-sm rounded-md flex flex-row justify-between">
            {{-- <p class="text-sm mb-4">Trenutni broj kategorija: {{ count($categories) }}</p> --}}
            <a href="category/create" class="bg-gray-600 text-white py-2 px-4 rounded-md font-semibold hover:bg-gray-700">Dodaj kategoriju</a>
            @if (session('Success'))
                <div class="bg-green-600 py-2 px-2 rounded-md mx-16">
                    <div class="text-white">
                        {{ session('Success') }}
                    </div>
                </div>
            @endif
        </div>

        {{-- SEARCH INPUT AND CATEGORIES COMPONENT --}}
        <div class="w-full mt-4">
            <div x-data="displayCategories({{ $categories }})" x-init="loadCategories()">  
                <div class="bg-white border border-gray-200 rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-700 flex flex-col px-4 py-4">
                    <input x-model="search" type="search" @keyup="searchCategories()" @keydown="open" class="w-full rounded-md border-2 border-gray-200 focus:border-1 focus:ring-transparent focus:border-gray-300 dark:bg-gray-700 dark:border-gray-700 dark:placeholder-gray-400" placeholder="Traži kategorije">
                </div>
                <div class="mt-8 lg:mt-6 grid grid-cols-1 gap-y-4 md:grid-cols-2 md:gap-x-4 md:gap-y-4 lg:grid-cols-3 lg:gap-x-4 lg:gap-y-4 xl:grid-cols-4 2xl:grid-cols-5">
                    <template x-for="element in searchCategories()">
                        <div class="bg-white dark:bg-gray-800 dark:border-gray-700 py-4 px-4 rounded-md border border-gray-200 shadow-sm hover:text-gray-900">
                            <div class="flex flex-col hover:opacity-80 transition duration-300">
                                <a :href="'/admin-panel/category/' + element.id"><img x-bind:src="element.image_url" alt="Slika kategorije" class="object-contain h-76"></a>
                                <a class="text-base font-semibold hover:text-blue-600" x-text="element.name" x-bind:href="'/admin-panel/category/' + element.name"></a>
                                <p x-text="'Broj proizvoda: ' + element.products_count" class="text-sm mt-4"></p>
                                <p x-text="'Pripada kategorijama: ' + element.parent_categories_count" class="text-sm mt-2"></p>
                                <p x-text="'Podkategorije: ' + element.child_categories_count" class="text-sm mt-2"></p>
                                <div class="flex flex-row justify-end">
                                    <button title="Izmjeni kategoriju" class="focus:outline-none py-1 px-1 rounded hover:bg-gray-300 transition duration-300">
                                        <a :href="'/admin-panel/category/edit/' + element.id">
                                            <svg class="h-5 w-5 focus:outline-none text-gray-600 hover:text-gray-900 transition duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                              </svg>
                                        </a>
                                    </button>

                                    <form method="POST" :action="'/admin-panel/category/delete/' + element.id">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" title="Izbriši kategoriju" class="focus:outline-none py-1 px-1 rounded hover:bg-gray-300 transition duration-300">
                                            
                                            <svg class="h-5 w-5 text-gray-600 hover:text-gray-900 transition duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>            
        </div>
        
        <script>
            function displayCategories(categories){
                return{
                    categories,
                    open() { this.show = true },
                    search: '',
                    loadCategories(){
                        categoriesToDisplay = []
                        for(let element of this.categories){
                            categoriesToDisplay.push(element)
                        }
                        return categoriesToDisplay
                    },
                    searchCategories(){
                        if(this.search == ''){
                            return this.categories;
                        }

                        return filterCategories = this.categories.filter(element => {
                            if(element.name.toLowerCase().includes(this.search.toLocaleLowerCase())){
                                return element
                            }
                        })
                    }
                }
            }
        </script>
    </x-admin-panel.layout>
@endsection