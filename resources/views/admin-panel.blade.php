@extends('layouts.app')

@section('content')    
    <div class="w-full min-h-screen">

        <x-admin-panel.mobile.navigation></x-admin-panel.mobile.navigation>

        <div class="min-h-screen w-full px-4 md:px-6 py-14 lg:px-0 lg:py-0 lg:pt-14 lg:mb-0 lg:flex lg:flex-row lg:pl-56 xl:pl-64 2xl:pl-72">
            
            <x-admin-panel.desktop.navigation></x-admin-panel.desktop.navigation>

            <x-admin-panel.content-layout></x-admin-panel.content-layout>

        </div>
        
        <x-admin-panel.mobile.action-bar></x-admin-panel.mobile.action-bar>

    </div>
@endsection