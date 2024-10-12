<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi Admin</title>
    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- Flowbite CSS -->
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <div class="bg-[#3489D2] fixed top-0 w-full z-50 animate__animated animate__fadeInDown" x-data="{ isOpen: false }">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="h-30 w-45 mt-7" src="/img/kominfo.jpg" alt="Your Company">
                    </div>
                </div>
                <h1 class="text-right font-semibold text-2xl text-gray-50">Inventory Dinas Kominfo</h1>
            </div>
        </div>
    </div>
    <form action="/register" method="POST">
        @csrf
        <!-- component -->
        <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center mt-4 sm:py-12">
            <div class="relative py-4 sm:max-w-xl sm:mx-auto">
                <div
                    class="absolute inset-0 mt-4 bg-gradient-to-r from-blue-300 to-blue-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
                </div>
                <div class="relative px-4 py-4 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                    <div class="max-w-screen mx-36">
                        <div>
                            <h1 class="text-2xl mt-2 font-semibold text-center">Daftar Sekarang</h1>
                        </div>
                        <div class="divide-y divide-gray-200">
                            <div
                                class="relative py-8 text-base leading-6 space-y-4 text-gray-700 -ml-32 sm:text-lg sm:leading-7">
                                <div class="relative -mr-32">
                                    <label for="username"
                                        class="absolute left-0 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-4 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Username
                                    </label>
                                    <input autocomplete="off" id="username" name="username" type="text"
                                        class="form-control @error('username') border-red-600 @enderror mt-6 peer placeholder-transparent h-10 w-full my-3 border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:border-rose-600"
                                        placeholder="username" required value="{{ old('username') }}" />
                                    @error('username')
                                        <div class="text-red-600 text-sm -mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="relative -mr-32">
                                    <label for="password"
                                        class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-4 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Password

                                    </label>
                                    <input autocomplete="off" id="password" name="password" type="password"
                                        class="form-control @error('password') border-red-600 @enderror peer placeholder-transparent my-3 h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:border-rose-600"
                                        placeholder="password" required />
                                    @error('password')
                                        <div class="text-red-600 text-sm -mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="relative -mr-32">
                                    <label for="password_confirmation"
                                        class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-4 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Konfirmasi
                                        Password

                                    </label>
                                    <input autocomplete="off" id="password_confirmation" name="password_confirmation"
                                        type="password"
                                        class="form-control @error('password_confirmation') border-red-600 @enderror peer placeholder-transparent my-3 h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:border-rose-600"
                                        placeholder="Konfirmasi Password" required />
                                    @error('password_confirmation')
                                        <div class="text-red-600 text-sm -mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="relative">
                                    <button
                                        class="bg-blue-500 hover:bg-blue-600 text-white rounded-md px-2 py-1 mt-3">Registrasi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
