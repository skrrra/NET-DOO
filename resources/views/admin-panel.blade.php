@extends('layouts.app')

@section('content')    
{{-- Able to extend itself  --}}
    <div class="w-full min-h-screen">
        {{-- Able to extend itself  --}}

        {{-- Mobile navigation with hamburger start --}}
        <x-mobile.navigation></x-mobile.navigation>

        {{-- Mobile navigation with hamburger end --}}

        <div class="min-h-screen w-full px-4 py-14">
            
        </div>
        
        {{-- Mobile user action menu start --}}
        
        <x-mobile.action-bar></x-mobile.action-bar>

        {{-- Mobile user action menu end --}}
    </div>
    @endsection