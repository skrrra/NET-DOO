@extends('layouts.app')

@section('content')
    <x-admin-panel.layout>
        <div class="bg-white border border-gray-200 rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-700 flex flex-col px-4 py-6">
            <input type="search" class="w-full rounded-md border-gray-200 dark:bg-gray-700 dark:border-gray-700 dark:placeholder-gray-400" placeholder="Traži kategorije">
            <p class="mt-4 text-sm">Trenutni broj kategorija: {{ count($categories) }}</p>
        </div>

        <div class="w-full mt-8 lg:mt-6">
            <div class="grid grid-cols-1 gap-y-4 md:grid-cols-2 md:gap-x-4 md:gap-y-4 lg:grid-cols-3 lg:gap-x-4 lg:gap-y-4 xl:grid-cols-4 2xl:grid-cols-5">  
                @foreach ($categories as $category)
                    <div class="bg-white dark:bg-gray-800 dark:border-gray-700 py-4 px-4 rounded-md border border-gray-200 shadow-sm">
                        <div>
                            <h2 class="text-xl">
                                {{ $category->name }}
                            </h2>
                        </div>
                        <div>
                            <h3>Broj proizvoda: {{ count($category->products) }}</h3>
                        </div>
                        <div>
                            <h4>Matične kategorija: {{ $category->category }}</h4>
                        </div>
                    </div>
                @endforeach
            </div>            
        </div>
    </x-admin-panel.layout>
@endsection