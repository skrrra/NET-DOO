@extends('layouts.app')

@section('content')    
{{-- Able to extend itself  --}}
    <div class="w-full min-h-screen">
        {{-- Able to extend itself  --}}

        {{-- Mobile navigation with hamburger start --}}
        
        <div class="w-full  py-4 px-4 fixed top-0 left-0 flex justify-between items-center border-b border-gray-200">

            <div>
                <a href="/admin-panel" class="font-medium">Admin panel</a>
            </div>
            
            <div>
                <x-icons.hamburger size="20"></x-icons.hamburger>
            </div>
            
        </div>

        {{-- Mobile navigation with hamburger end --}}

        <div class="min-h-screen w-full pt-14 pb-14 px-4 py-4">
            {{-- MAIN CONTENT --}}
        </div>
        
        {{-- Mobile user action menu start --}}
        
        <div class="w-full  py-4 px-4 fixed bottom-0 left-0 flex items-center justify-between border-t border-gray-200">
            
            <div>
                <x-icons.bell size="20"></x-icons.bell>
            </div>
            
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

        {{-- Mobile user action menu end --}}
    </div>
    @endsection