@extends('layout.auth')

@section('styles')
@endsection

@section('content')
    <section
        class="flex flex-col items-center justify-center py-8 mx-auto bg-gradient-to-r from-amber-100 to-red-300 min-h-screen">
        <div class="shadow-lg w-1/3 p-8 bg-orange-300 rounded-2xl items-center justify-center">
            <div class="w-full">
                <div class="p-6 space-y-6">
                    <form class="space-y-4 md:space-y-6" action="{{ route('login') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                            <input type="text" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="jonhdoe123@gmail.com" required="" value="{{ old('email') }}">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                required="">
                        </div>
                        <p class="text-sm font-medium">
                            Don't have an account? <a href="{{ route('register') }}"
                                class="font-bold text-primary-600 underline">Sign Up</a>
                        </p>
                        <button type="submit"
                            class="w-full border focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-full text-white p-3 text-center"
                            style="background-color: #DA9318">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.title = "Login";
    </script>
@endsection
