@extends('layouts.app')

@section('content')    
    <div class="w-full min-h-full flex flex-col">

        <div class="bg-gray-300 h-screen fixed top-0 left-0 xl:w-3/12 xl:bg-gray-50 2xl:w-2/12">

            <div class="xl:py-12 xl:px-6 font-semibold">
                <h3 class="text-2xl">Admin panel</h3>
            </div>

            <div class="text-base">

                <x-admin-panel.side-menu.item href="/" text="Narudzbe">
                    <x-icons.truck></x-icons.truck>
                </x-admin-panel.side-menu.item>

                <x-admin-panel.side-menu.item href="/" text="Proizvodi">
                    <x-icons.tv></x-icons.tv>
                </x-admin-panel.side-menu.item>

            </div>

        </div>

        <div class="bg-gray-100 min-h-screen xl:w-9/12 2xl:w-10/12 self-end">
        </div>
    </div>
@endsection