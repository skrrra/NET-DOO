@extends('layouts.app')

@section('content')    
    <div class="w-full min-h-full flex flex-col">

        <div class="bg-gray-300 h-screen fixed top-0 left-0 xl:w-3/12 xl:bg-gray-50 2xl:w-2/12 border-r-2 border-gray-200 ">

            <div class="xl:py-12 xl:px-10 font-semibold">
                <h3 class="text-2xl">Admin panel</h3>
            </div>

            <div class="text-base">

                <x-admin-panel.side-menu.item href="/" text="Narudžbe">
                    <x-icons.truck size="20"></x-icons.truck>
                </x-admin-panel.side-menu.item>

                <x-admin-panel.side-menu.item href="/admin-panel/products" text="Proizvodi" active="true">
                    <x-icons.tv size="20"></x-icons.tv>
                </x-admin-panel.side-menu.item>

                <x-admin-panel.side-menu.item href="/" text="Kategorije">
                    <x-icons.list size="20"></x-icons.list>
                </x-admin-panel.side-menu.item>

                <x-admin-panel.side-menu.item href="/" text="Akcije u toku">
                    <x-icons.precent size="20"></x-icons.precent>
                </x-admin-panel.side-menu.item>

                <x-admin-panel.side-menu.item href="/" text="Logout">
                    <x-icons.logout size="20"></x-icons.logout>
                </x-admin-panel.side-menu.item>
                
            </div>
            
        </div>
        
        <div class="min-h-screen xl:w-9/12 xl:px-10 2xl:w-10/12 self-end">

            <div class="min-h-screen w-full">
                
                <div class="xl:py-10">
                    <a href="/admin-panel/products/create" class="text-base w-40 border flex border-gray-200 shadow-sm  py-2 px-2 bg-white rounded-md hover:text-blue-600">
                        <div class="mr-2 flex">
                            <x-icons.add size="18"></x-icons.add>
                        </div>
                        Dodaj proizvod
                    </a>
                </div>

                <div class="px-6 py-6 rounded-md border border-gray-200 shadow-sm bg-white">
                    @if (session()->has('Success'))
                        <div class="bg-green-400 border border-gray-200 text-white absolute top-8 right-10 font-semibold py-2 px-4 rounded-md flex">
                            <p class="mr-2">{{ session()->get('Success') }}</p>
                            <x-icons.check size="18"></x-icons.check>
                        </div>
                    @endif

                    <div class="mb-12 flex">
                        <x-icons.tv size="32"></x-icons.tv>
                        <h1 class="font-semibold text-3xl ml-2">Dodaj novi proizvod</h1>
                    </div>

                    <form action="/admin-panel/products" method="POST" class="grid" enctype="multipart/form-data" class="">
                        @csrf
                        @method('POST')

                        <div class=" grid grid-cols-3 gap-6">
                            <div class="flex flex-col">
                                <label for="" class="mb-2">Naziv proizvoda *</label>
                                <input type="text" name="name" class="rounded-md bg-gray-50 border border-gray-300 focus:border-blue-600 focus:ring-blue-100" placeholder="Samsung Galaxy A5">
                                @error('name')
                                    <div class="mt-2">
                                        <p class="text-sm text-red-400">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>

                            <div class="flex flex-col">
                                <label for="" class="mb-2">Cijena *</label>
                                <input type="number" name="price" step="0.01" placeholder="0.00" class="rounded-md bg-gray-50 border border-gray-300 focus:border-blue-600 focus:ring-blue-100">
                                @error('price')
                                    <div class="mt-2">
                                        <p class="text-sm text-red-400">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>

                            <div class="flex flex-col">
                                <label for="" class="mb-2">Kolicina *</label>
                                <input type="text" name="amount" class="rounded-md bg-gray-50 border border-gray-300 focus:border-blue-600 focus:ring-blue-100" placeholder="12">
                                @error('amount')
                                    <div class="mt-2">
                                        <p class="text-sm text-red-400">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-6 mt-8">
                            <div class="flex flex-col">
                                <label for="" class="mb-2">Stanje</label>
                                <select name="state" id="" class="rounded-md bg-gray-50 border border-gray-300 focus:border-blue-600 focus:ring-blue-100">
                                    <option value="0">Novo</option>
                                    <option value="1">Polovno</option>
                                    <option value="2">Refurbished</option>
                                </select>
                            </div>
                            
                            <div class="flex flex-col">
                                <label for="" class="mb-2">Kategorija</label>
                                <select name="category" id="" class="rounded-md bg-gray-50 border border-gray-300 focus:border-blue-600 focus:ring-blue-100">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="flex flex-col">
                                <label for="" class="mb-2">Aktivnost</label>
                                <select name="active" id="" class="rounded-md bg-gray-50 border border-gray-300 focus:border-blue-600 focus:ring-blue-100">
                                    <option value="0">Neaktivan</option>
                                    <option value="1">Aktivan</option>
                                </select>
                            </div>

                        </div>

                        {{-- BEFORE INSER --}}


                        <div class="mt-8">
                            <label class="">
                                Slika proizvoda
                            </label>

                            <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md bg-gray-50">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                            <span>Upload a file</span>
                                            <input id="file-upload" name="image_url" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">
                                        PNG, JPG, GIF up to 10MB
                                    </p>
                                </div>
                            </div>

                            @error('image')
                                <div class="mt-2">
                                    <p class="text-sm text-red-400">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>


                        {{-- AFTER INSER --}}

                        <div class="grid grid-cols-3 gap-6">
                            <button type="submit" class="bg-blue-600 border border-gray-400 py-2 px-2 mt-10 rounded-md text-white font-semibold hover:bg-white hover:text-blue-600 hover:border-blue-600">Dodaj proizvod</button>
                            <a href="/admin-panel/products" class="bg-red-600 border border-gray-400 py-2 px-2 mt-10 rounded-md text-white font-semibold hover:bg-white hover:text-red-600 hover:border-red-600 text-center w-1/2">Odustani</a>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
@endsection