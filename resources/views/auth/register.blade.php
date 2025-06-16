@extends('layout')

@section('content')
    <div class="flex min-h-screen h-screen">
        <div class="flex flex-1 flex-col justify-center px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24 bg-gray-900">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div>
                    <img class="h-10 w-auto" src="{{ asset('images/logo-green.svg') }}" alt="OAKRAFT" />
                    <h2 class="mt-8 text-2xl/9 font-bold tracking-tight text-white">Welcome onboard!</h2>
                    <p class="mt-2 text-sm/6 text-gray-500">
                        Do you have an account?
                        <a href="{{ route('login') }}" class="font-semibold text-emerald-600 hover:text-emerald-500">Sign in instead</a>
                    </p>
                </div>

                <div class="mt-10">
                    <div>
                        <form action="{{ route('register.new-user') }}" method="POST" class="space-y-6">
                            @csrf
                            <div>
                                <label for="name" class="block text-sm/6 font-medium text-white">Your name</label>
                                <div class="mt-2">
                                    <input type="text" name="name" id="name" autocomplete="name" required/>
                                </div>
                            </div>

                            <div>
                                <label for="email" class="block text-sm/6 font-medium text-white">Email address</label>
                                <div class="mt-2">
                                    <input type="email" name="email" id="email" autocomplete="email" required/>
                                </div>
                            </div>

                            <div>
                                <label for="password" class="block text-sm/6 font-medium text-white">Password</label>
                                <div class="mt-2">
                                    <input type="password" name="password" id="password" autocomplete="off" required/>
                                </div>
                            </div>

                            <div>
                                <label for="password_confirmation" class="block text-sm/6 font-medium text-white">Confirm password</label>
                                <div class="mt-2">
                                    <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="off" required/>
                                </div>
                            </div>

                            <div>
                                <button type="submit" class="flex w-full justify-center rounded-md bg-emerald-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-emerald-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600">Let's fly!</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="relative hidden w-0 flex-1 lg:block">
            <img class="absolute inset-0 -z-10 size-full object-cover grayscale" src="https://static.scientificamerican.com/sciam/cache/file/F359312F-3936-4D78-87945E199355C7B0_source.jpg?crop=16%3A9%2Csmart&w=1920" alt="" />
            <div class="absolute inset-0 -z-10 bg-black/75"></div>
            <div class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl"
                 aria-hidden="true">
                <div class="aspect-[1097/845] w-[68.5625rem] bg-emerald-600 opacity-10"
                     style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>
        </div>
    </div>
@endsection
