@extends('layouts.app')

@section('content')
    <x-admin-panel.layout>

      <div class="md:flex md:flex-row-reverse md:justify-between">

        <a href="/admin-panel/product/create" class="border font-semibold flex border-gray-200 shadow-sm py-2 px-4 bg-gray-600 text-white rounded-md hover:bg-gray-700 justify-center">
          Dodaj proizvod
          <div class="ml-2 flex">
            <x-icons.add size="18"></x-icons.add>
          </div>
        </a>

        <form action="/admin-panel/product/search" method="POST" class="flex flex-col md:flex-row mt-4 md:mt-0">
          @csrf
          @method('GET')

          <div class="flex flex-col md:flex-row">
            <select name="category" id="" class="rounded-md border-2 border-gray-200 focus:ring-2 focus:ring-blue-600 outline-none focus:outline-none focus:border-transparent mb-2 md:mb-0 md:mr-2">
              @isset($currentCategory)
                <option value="{{ $currentCategory->id }}">{{ $currentCategory->name }}</option>
              @endisset
                <option value="0">Sve kategorije</option>  
              @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>                      
              @endforeach
            </select>

            <select name="order" id="" class="rounded-md border-gray-200 border-2 focus:ring-2 focus:ring-blue-600 outline-none focus:outline-none focus:border-transparent mb-2 md:mb-0 md:mr-2">
              <option value="created_at,DESC">Najnovije</option>
              <option value="created_at,ASC">Najstarije</option>
              <option value="price,DESC">Cijena najvisa</option>
              <option value="price,ASC">Cijena najniza</option>
            </select>
                
            <select name="perPage" id="" class="rounded-md border-2 border-gray-200 focus:ring-2 focus:ring-blue-600 outline-none focus:outline-none focus:border-transparent mb-4 md:mb-0 md:mr-2">
              <option value="30">Po 30</option>
              <option value="60">Po 60</option>
              <option value="90">Po 90</option>
            </select>
          </div>

          <button type="submit" class="bg-blue-600 text-white py-2 font-semibold border-2 border-gray-200 rounded-md w-full flex flex-1 md:max-w-xs md:px-4 hover:bg-blue-700">
            <div class="mx-auto flex items-center">
              <p class="mr-1">Traži</p>
              <x-icons.search size="18"></x-icons.search>
            </div>
          </button>
        </form>
      </div>

    </x-admin-panel.layout>
@endsection