<div class="hidden lg:flex lg:flex-col h-screen w-56 xl:w-64 2xl:w-72 fixed top-14 left-0 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700">

    <div class="pt-6 pb-4 flex lg:pl-8 xl:pl-10 2xl:pl-12 border-b dark:border-gray-700">
        <div class="flex hover:text-yellow-300 dark:text-yellow-300 cursor-pointer" id="moonOne">
            <x-icons.moon size="18"></x-icons.moon>
        </div>

        <div class="flex ml-4">
            <a href="#" class="hover:text-blue-600 dark:hover:text-blue-300">
                <x-icons.bell size="18"></x-icons.bell>
            </a>
        </div>
    </div>

    <div class="w-full h-full lg:py-2 text-sm">
        <x-admin-panel.side-menu.item href="/admin-panel/order" text="Narudžbe" active="{{ str_contains(request()->url(), '/order' ) ? true : false }}">
            <x-icons.truck size="18"></x-icons.truck>
        </x-admin-panel.side-menu.item>
    
        <x-admin-panel.side-menu.item href="/admin-panel/product" text="Proizvodi" active="{{ str_contains(request()->url(), '/product' ) ? true : false }}">
            <x-icons.tv size="18"></x-icons.tv>
        </x-admin-panel.side-menu.item>
    
        <x-admin-panel.side-menu.item href="/admin-panel/category" text="Kategorije" active="{{ str_contains(request()->url(), '/category' ) ? true : false }}">
          <x-icons.list size="18"></x-icons.list>
        </x-admin-panel.side-menu.item>
    
        <x-admin-panel.side-menu.item href="/admin-panel/sales" text="Akcije u toku" active="{{ str_contains(request()->url(), '/sales' ) ? true : false }}">
            <x-icons.precent size="18"></x-icons.precent>
        </x-admin-panel.side-menu.item>
        
        <x-admin-panel.side-menu.item href="/admin-panel/my-profile" text="Moj profil" active="{{ str_contains(request()->url(), '/my-profile' ) ? true : false }}">
            <x-icons.user size="18"></x-icons.user>
        </x-admin-panel.side-menu.item>

        <x-admin-panel.side-menu.item href="/admin-panel/logout" text="Logout">
            <x-icons.logout size="18"></x-icons.logout>
        </x-admin-panel.side-menu.item>
    
        {{-- <div class="">
            <div class="flex flex-row ">
                <button class="flex flex-row font-semibold lg:pl-8 xl:pl-10 2xl:pl-12 bg-white dark:bg-gray-800 border-white hover:text-blue-600 dark:hover:text-blue-300 ring-0 outline-none focus:ring-0 focus:outline-white focus:ring-white dark:focus:ring-gray-800 focus:border-white dark:focus:border-gray-800">
                    <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                      </svg>
                    <a href="/my-profile">Moj profil</a>
                </button>
            </div>
            <div class="">
                <form action="/logout" method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit" class="flex flex-row font-semibold py-4 lg:pl-8 xl:pl-10 2xl:pl-12 bg-white dark:bg-gray-800 border-white hover:text-blue-600 dark:hover:text-blue-300 ring-0 outline-none focus:ring-0 focus:outline-white focus:ring-white dark:focus:ring-gray-800 focus:border-white dark:focus:border-gray-800">
                        <div class="mr-2">
                            <x-icons.logout size="18"></x-icons.logout>
                        </div>
                        Logout
                    </button>
                </form>
            </div>
        </div> --}}
    </div>

</div>