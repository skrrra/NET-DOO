@extends('layouts.app')

@section('content')
    <x-admin-panel.layout>
        <div class="w-full">
            <div x-data="displayCategories({{ $categories }})" x-init="loadCategories()">  
                <div class="bg-white border border-gray-200 rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-700 flex flex-col px-4 py-4">
                    <input x-model="search" type="search" @keyup="searchCategories()" @keydown="open" class="w-full rounded-md border-2 border-gray-200 dark:bg-gray-700 dark:border-gray-700 dark:placeholder-gray-400" placeholder="Traži kategorije">
                    <p class="mt-4 text-sm">Trenutni broj kategorija: {{ count($categories) }}</p>
                </div>
                <div class="mt-8 lg:mt-6 grid grid-cols-1 gap-y-4 md:grid-cols-2 md:gap-x-4 md:gap-y-4 lg:grid-cols-3 lg:gap-x-4 lg:gap-y-4 xl:grid-cols-4 2xl:grid-cols-5">
                    <template x-for="element in searchCategories()">
                        <div class="bg-white dark:bg-gray-800 dark:border-gray-700 py-4 px-4 rounded-md border border-gray-200 shadow-sm">
                            <div class="flex">
                                <a class="text-base" x-text="element.name" x-bind:href="'category/' + element.name"></a>
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