@extends('layouts.app')

@section('content')    
{{-- Able to extend itself  --}}
    <div class="w-full min-h-screen">
        {{-- Able to extend itself  --}}
        <div class="bg-white py-4 px-4 flex justify-between items-center border-b border-gray-200">

            <div>
                <a href="/admin-panel" class="">Admin panel</a>
            </div>

            <div>
                <x-icons.hamburger size="20"></x-icons.hamburger>
            </div>

        </div>

        <div class="bg-white py-4 px-4 fixed flex items-center justify-between bottom-0 left-0 w-full border-t border-gray-200">

            <div>
                <x-icons.truck size="20"></x-icons.truck>
            </div>

            <div>
                <x-icons.precent size="20"></x-icons.precent>
            </div>
            
            <div>
                <x-icons.tv size="20"></x-icons.tv>
            </div>
            
            <div>
                <x-icons.list size="20"></x-icons.list>
            </div>

        </div>
    </div>
@endsection