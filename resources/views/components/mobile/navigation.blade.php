<div class="w-full  py-4 px-4 fixed top-0 left-0 z-10 flex justify-between items-center border-b border-gray-300 md:bg-green-400 md:px-6 lg:bg-blue-500 lg:px-8 xl:bg-red-600 xl:px-10 2xl:bg-gray-300 2xl:px-12">

    <div>
        <a href="/admin-panel" class="font-medium">Admin panel</a>
    </div>
    
    <div class="flex">
        <div class="flex mr-4">
            <x-icons.moon size="18"></x-icons.moon>
        </div>
        <div class="flex mr-4">
            <x-icons.bell size="18"></x-icons.bell>
        </div>
        <div x-data="{ open: false }" @click.away="open = false" class="flex">
            <div @click="open = true">
                <x-icons.hamburger size="18"></x-icons.hamburger>
            </div>

            <div x-show="open" class="fixed top-0 right-0 z-20 w-8/12 md:w-6/12 lg:w-4/12 xl:w-3/12 2xl:w-2/12 h-screen bg-white border-l border-gray-300 shadow-lg">
        
                <div class="flex justify-end py-5 px-4 border-b border-gray-300">
                    <div @click="open = false" class="-mb-0.5">
                        <x-icons.cancel size="18"></x-icons.cancel>
                    </div>
                </div>
        
                <div>

                    <a href="#" class="flex px-4 py-4 border-b border-gray-200">
                        <x-icons.tv size="20"></x-icons.tv>
                        <p class="ml-2 self-center">Proizvodi</p>
                    </a>

                    <a href="#" class="flex px-4 py-4 border-b border-gray-200">
                        <x-icons.truck size="20"></x-icons.truck>
                        <p class="ml-2 self-center">Narudžbe</p>
                    </a>

                    <form action="/logout" method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit" class="flex px-4 py-4 w-full border-b border-gray-200">
                            <x-icons.logout size="20"></x-icons.logout>
                            <p class="ml-2">Log out</p>
                        </button>
                    </form>

                </div>
        
            </div>
        </div>
    </div>
    
</div>