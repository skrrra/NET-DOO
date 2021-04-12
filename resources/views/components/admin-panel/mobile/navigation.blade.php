<div class="w-full  py-4 px-4 fixed top-0 left-0 z-20 flex justify-between items-center border-b bg-white dark:bg-gray-900 border-gray-200 dark:border-gray-700 md:px-6 lg:px-8 xl:px-10 2xl:px-12">

    <div>
        <a href="/admin-panel" class="font-semibold lg:text-lg">Admin panel</a>
    </div>
    
    <div class="flex lg:hidden">

        <div class="flex mr-4 xl:mr-4 hover:text-yellow-300" id="moonTwo">
            <a href="#">
                <x-icons.moon size="18"></x-icons.moon>
            </a>
        </div>

        <div class="flex mr-4 xl:mr-0">
            <a href="#" class="hover:text-blue-600">
                <x-icons.bell size="18"></x-icons.bell>
            </a>
        </div>

        <div x-data="{ open: false }" @click.away="open = false" class="flex">

            <div @click="open = true">
                <x-icons.hamburger size="18"></x-icons.hamburger>
            </div>

            <div x-show="open" class="fixed top-0 right-0 w-8/12 md:w-5/12 h-screen bg-white border-l border-gray-200">
                <div class="flex justify-end py-5 px-4 border-b border-gray-200">
                    <div @click="open = false" class="-mb-0.5">
                        <x-icons.cancel size="18"></x-icons.cancel>
                    </div>
                </div>
        
                <div>
                    <a href="#" class="flex px-4 py-4 border-b border-gray-200">
                        <x-icons.list size="20"></x-icons.list>
                        <p class="ml-2 self-center">Kategorije</p>
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