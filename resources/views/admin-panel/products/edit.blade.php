@extends('layouts.app')

@section('content')
    <x-admin-panel.layout>

        <div class="w-full">

            <div class="px-8 py-8 rounded-md border shadow-sm border-gray-200 bg-white dark:bg-gray-800 dark:border-gray-700">
                @if (session()->has('Success'))
                    <div class="bg-green-600 border border-gray-200 text-white text-sm absolute top-14 right-4 z-20 lg:top-3 font-semibold py-2 px-4 rounded-md flex">
                        <p class="mr-2">{{ session()->get('Success') }}</p>
                        <x-icons.check size="18"></x-icons.check>
                    </div>
                @endif

                <div class="mb-12 flex justify-between">
                    <h1 class="font-semibold text-2xl mr-2 self-center flex">
                        <p class="mr-2">Uredi kategoriju</p>
                        <div class="flex items-center">
                            <x-icons.edit size="22"></x-icons.edit>
                        </div>
                    </h1>
                    <form action="/admin-panel/product/{{ $product->id }}" method="POST" class="self-center">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-semibold w-40 border flex border-gray-200 shadow-sm py-1.5 px-2 bg-white dark:bg-gray-700 dark:border-gray-700 rounded-md hover:bg-red-700 hover:text-white dark:text-gray-400 dark:hover:border-blue-300 dark:hover:text-blue-300">
                            <div class="mr-2 flex self-center">
                                <x-icons.trash size="18"></x-icons.trash>
                            </div>
                            Izbriši proizvod
                        </button>
                    </form>
                </div>

                <form action="/admin-panel/product/{{ $product->id }}" method="POST" class="grid" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div>
                        <div>
                            <div class=" grid gap-4 md:grid-cols-3 md:gap-6">
                                <div class="flex flex-col">
                                    <label for="" class="mb-2 text-sm font-semibold">Naziv proizvoda <span class="text-blue-600 dark:text-blue-300">*</span></label>
                                    <x-forms.input
                                        type="text"
                                        name="name"
                                        placeholder="Samsung Galaxy A5"
                                        value="{{ $product->name }}"
                                        class=""
                                        class="dark:bg-gray-700 dark:border-gray-700 dark:focus:border-blue-300"
                                    ></x-forms.input>
                                </div>

                                <div class="flex flex-col">
                                    <label for="" class="mb-2 text-sm font-semibold">Cijena <span class="text-blue-600 dark:text-blue-300">*</span></label>
                                    <x-forms.input
                                        type="number"
                                        name="price"
                                        placeholder="123.99"
                                        step="0.01"
                                        value="{{ $product->price }}"
                                        class="dark:bg-gray-700 dark:border-gray-700 dark:focus:border-blue-300"
                                    ></x-forms.input>
                                </div>

                                <div class="flex flex-col">
                                    <label for="" class="mb-2 text-sm font-semibold">Količina <span class="text-blue-600 dark:text-blue-300">*</span></label>
                                    <x-forms.input
                                        type="number"
                                        name="amount"
                                        placeholder="3"
                                        value="{{ $product->amount }}"
                                        class="dark:bg-gray-700 dark:border-gray-700 dark:focus:border-blue-300"
                                    ></x-forms.input>
                                </div>
                            </div>

                            <div class="grid gap-4 md:grid-cols-3 md:gap-6 mt-10">
                                <div class="flex flex-col">
                                    <label for="" class="mb-2 text-sm font-semibold">Stanje <span class="text-blue-600 dark:text-blue-300">*</span></label>
                                    <select name="state" id="" class="rounded-md bg-gray-50 border border-gray-300 focus:border-blue-600 focus:border-2 focus:ring-blue-600 dark:bg-gray-700 dark:border-gray-700">
                                        @switch($product->state)
                                            @case(0)
                                                <option value="0" class="bg-blue-600 text-white">Novo</option>
                                                <option value="1">Polovno</option>
                                                <option value="2">Refurbished</option>
                                                @break
                                            @case(1)
                                                <option value="1" class="bg-blue-600 text-white">Polovno</option>
                                                <option value="0">Novo</option>
                                                <option value="2">Refurbished</option>
                                                @break
                                            @case(2)
                                                <option value="2" class="bg-blue-600 text-white">Refurbished</option>
                                                <option value="0">Novo</option>
                                                <option value="1">Polovno</option>
                                                @break
                                            @default    
                                        @endswitch
                                    </select>
                                </div>

                                <div class="flex flex-col">
                                    <label for="" class="mb-2 text-sm font-semibold">Aktivnost <span class="text-blue-600 dark:text-blue-300">*</span></label>
                                    <select name="active" id="" class="rounded-md bg-gray-50 border border-gray-300 focus:border-blue-600 focus:ring-blue-600 dark:bg-gray-700 dark:border-gray-700">
                                        @if ($product->active == 0)
                                            <option value="0">Neaktivan</option>
                                            <option value="1">Aktivan</option>
                                        @else
                                            <option value="1">Aktivan</option>
                                            <option value="0">Neaktivan</option>
                                        @endif
                                    </select>
                                </div>
                                
                            </div>
                            

                            <div class="mt-10">
                                <x-forms.multi-select-dropdown :items="$categories" :oldValues="$product->categories->pluck('id')"></x-forms.multi-select-dropdown>
                            </div>

                            <div class="mt-4 md:mt-0">
                                <label class="text-sm font-semibold">Slika proizvoda <span class="text-blue-600 dark:text-blue-300">*</span></label>

                                <x-forms.drag-drop-files></x-forms.drag-drop-files>

                                @error('image')
                                    <div class="mt-2">
                                        <p class="text-sm text-red-400">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>

                            <div class="mt-10">
                                <label for="" class="font-semibold text-sm">Kratki opis <span class="text-blue-600 dark:text-blue-300">*</span></label>
                                <x-forms.textarea
                                name="short-details"
                                value="{{ $product->short_details }}"
                                placeholder="Kratki opis proizvoda"
                                ></x-forms.textarea>
                            </div>

                            <div class="mt-10">
                                <label for="" class="font-semibold text-sm">Detaljni opis <span class="text-blue-600 dark:text-blue-300">*</span></label>
                                <x-forms.textarea
                                name="long-details"
                                value="{{ $product->long_details }}"
                                rows="16"
                                placeholder="Detaljni opis proizvoda"
                                ></x-forms.textarea>
                            </div>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-3 md:gap-6 mt-10">
                        <button type="submit" class="bg-blue-600 border flex border-gray-600 py-2 px-2 rounded-md text-white font-semibold hover:bg-blue-700  hover:border-blue-700 dark:bg-blue-300 dark:text-gray-900 dark:hover:bg-blue-400">
                            <div class="flex mx-auto">
                                <p class="mr-1">Spasi promjene</p>
                                <x-icons.check size="18"></x-icons.check>
                            </div>
                        </button>
                        <a href="/admin-panel/product" class="bg-gray-600 dark:bg-gray-700 dark:hover:text-blue-300 dark:hover:border-blue-300 mt-4 md:mt-0 flex border text-white border-gray-600 py-2 px-2 rounded-md font-semibold hover:bg-gray-700 text-center md:w-1/2">
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