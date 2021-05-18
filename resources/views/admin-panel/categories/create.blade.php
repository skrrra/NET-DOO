@extends('layouts.app')

@section('content')
    <x-admin-panel.layout>
        <div class="w-full">

            <div class="px-8 py-8 rounded-md border border-gray-200 shadow-sm bg-white dark:bg-gray-800 dark:border-gray-700">
                @if (session()->has('Success'))
                    <div class="bg-green-600 border border-gray-200 text-white text-sm absolute top-14 right-4 z-20 lg:top-3 font-semibold py-2 px-4 rounded-md flex">
                        <p class="mr-2">{{ session()->get('Success') }}</p>
                        <x-icons.check size="18"></x-icons.check>
                    </div>
                @endif

                <div class="mb-12 flex">
                    <div class="flex flex-col">
                        <h1 class="font-semibold text-2xl mr-2 flex">
                            <p class="mr-2">Dodaj novu kategoriju</p>
                            <x-icons.add size="22"></x-icons.add>
                        </h1>
                        <div class="flex flex-row mt-2">
                            <svg class="h-5 w-5 my-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                              </svg>
                            <a href="/admin-panel/category" class="font-semibold underline">Nazad na kategorije</a>
                        </div>
                    </div>
                </div>

                @if (session('status'))
                    <div class="bg-green-600 p-5 rounded-md mx-16 flex flex-row justify-center">
                        <div class="text-white">
                            {{ session('status') }}
                        </div>
                        <div class="ml-3">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="white">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                @endif

                <form action="/admin-panel/category/create" method="POST" class="grid" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <div>
                            <div class="lg:grid lg:grid-cols-2 lg:gap-4 2xl:grid-cols-3">
                                <div class="flex flex-col">
                                    <label for="" class="mb-2 text-sm font-semibold">Naziv kategorije <span class="text-blue-600 dark:text-blue-300">*</span></label>
                                    <x-forms.input
                                        type="text"
                                        name="name"
                                        placeholder="Fujitsu laptopi"
                                        class="dark:bg-gray-700 dark:border-gray-700 dark:focus:border-blue-300"
                                    ></x-forms.input>
                                </div>

                                <div class="flex flex-col mt-4 lg:mt-0">
                                    <label for="" class="mb-2 text-sm font-semibold">Aktivnost <span class="text-blue-600 dark:text-blue-300">*</span></label>
                                    <select name="root" id="" class="rounded-md bg-gray-50 dark:bg-gray-700 dark:border-gray-700 border border-gray-300 focus:border-blue-600 focus:ring-blue-600 dark:focus:border-blue-300">
                                        <option value="1">Matična</option>
                                        <option value="0">Podkategorija</option>
                                    </select>
                                </div>

                            </div>

                            <div class="mt-10">
                                <x-forms.multi-select-dropdown :items="$categories" oldValues="[{{ old('categories') }}]" text="Matične kategorije" name="parent_categories"></x-forms.multi-select-dropdown>
                            </div>

                            <div class="mt-2">
                                <x-forms.multi-select-dropdown :items="$categories" oldValues="[{{ old('categories') }}]" text="Podkategorije" name="child_categories"></x-forms.multi-select-dropdown>
                            </div>

                            <div class="mt-2">
                                <label class="text-sm font-semibold">Slike kategorije <span class="text-blue-600 dark:text-blue-300">*</span></label>

                                <x-forms.drag-drop-files></x-forms.drag-drop-files>

                            </div>
                        </div>
                    </div>

                    <div class="flex flex-row mt-10">
                        <button type="submit" class="mr-5 bg-blue-600 border flex border-gray-600 py-2 px-2 rounded-md text-white font-semibold hover:bg-blue-700  hover:border-blue-700 dark:bg-blue-300 dark:text-gray-900 dark:hover:bg-blue-400 2xl:w-60">
                            <div class="flex mx-auto">
                                <p class="mr-1">Dodaj kategoriju</p>
                                <x-icons.add size="18"></x-icons.add>
                            </div>
                        </button>
                        <a href="/admin-panel/category" class="bg-gray-600 dark:bg-gray-700 dark:hover:text-blue-300 dark:hover:border-blue-300 mt-4 md:mt-0 flex border text-white border-gray-600 py-2 px-2 rounded-md font-semibold hover:bg-gray-700 text-center 2xl:w-60">
                            <div class="flex mx-auto">
                                <p class="mr-1">Odustani</p>
                                <x-icons.cancel size="18"></x-icons.cancel>
                            </div>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </x-admin-panel.layout>
@endsection