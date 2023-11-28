<!DOCTYPE html>
<html class="html h-full bg-white">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />

    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="h-full">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <a href="./index.html" class="text-center text-6xl font-bold text-gray-900">
                <h1>Barta</h1>
            </a>
            <h1 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
                Create a new account
            </h1>
        </div>
        {{-- {{ print_r($errors->all()) }} --}}
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Name -->
                <div>
                    <label for="fname" class="block text-sm font-medium leading-6 text-gray-900">First Name</label>
                    <div class="mt-2">
                        <input id="fname" name="fname" value="{{ old('fname') }}" type="text"
                            autocomplete="fname" placeholder="Alp Arslan" required
                            class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6 @error('fname')!border-red-500
                            @enderror " />
                    </div>
                    <div class="text-red-500">
                        @error('fname')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <!-- Last name -->
                <div>
                    <label for="lname" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
                    <div class="mt-2">
                        <input id="lname" name="lname" type="text" value="{{ old('lname') }}"
                            autocomplete="lname" placeholder="alparslan1029" required
                            class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6 @error('lname')!border-red-500
                            @enderror" />
                    </div>
                    <div class="text-red-500">
                        @error('lname')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                        address</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email"
                            value="{{ old('email') }}"autocomplete="email" placeholder="alp.arslan@mail.com" required
                            class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6  @error('email')!border-red-500
                            @enderror" />
                    </div>
                    <div class="text-red-500">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password"
                            placeholder="••••••••" required
                            class="block w-full rounded-md border-0 p-2 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6" />
                    </div>
                    <div class="text-red-500">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>

                </div>
                <!-- image  -->
                <div>
                    <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Image</label>
                    <div class="mt-2">
                        <input id="image" name="image" type="file" value="{{ old('image') }}"
                            autocomplete="image" placeholder="alparslan1029" required
                            class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6 @error('image')!border-red-500
                            @enderror " />
                    </div>
                    <div class="text-red-500">
                        @error('image')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <!-- Bio -->
                <div>
                    <label for="bio" class="block text-sm font-medium leading-6 text-gray-900">Bio</label>
                    <div class="mt-2">
                        <input id="bio" name="bio" type="text" value="{{ old('bio') }}"
                            autocomplete="bio" placeholder="alparslan1029" required
                            class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6 @error('bio')!border-red-500
                            @enderror" />
                    </div>
                    <div class="text-red-500">
                        @error('bio')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">
                        Register
                    </button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                Already a member?
                <a href="{{ route('login') }}" class="font-semibold leading-6 text-black hover:text-black">Sign In</a>
            </p>
        </div>
    </div>
</body>

</html>
