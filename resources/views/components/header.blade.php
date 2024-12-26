<header class="bg-white shadow animate__animated animate__fadeInDown pt-20 flex">
    <div class="mx-auto w-full px-2 py-3 sm:px-3 lg:px-4 flex">
        <h1 class="text-3xl flex ml-40  font-bold tracking-tight text-gray-900">{{ $slot }}</h1>
    </div>
    <div class="logout">
        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="block px-5 py-3 text-md rounded flex items-center w-full text-left">
                <img src="/images/logout.png" alt="logout" class="mr-3 w-6">
                Keluar
            </button>
        </form>
    </div>

</header>
