@extends('layout.auth')

@section('styles')
@endsection

@section('content')
    <section>
        <div class="flex flex-col items-center justify-center py-8 mx-auto bg-gradient-to-r from-amber-100 to-red-300 min-h-screen">
            <div class="shadow-lg w-1/2 rounded-2xl bg-orange-300 p-8 mt-5">
                <div class="w-full">
                    <div class="p-6 space-y-6">
                        <form class="space-y-4 md:space-y-6" action="{{ route('register') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                                <input type="text" name="name" id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                    placeholder="jonhdoe123" required="" value="{{ old('name') }}">
                            </div>
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                <input type="email" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                    placeholder="name@company.com" required="" value="{{ old('email') }}">
                            </div>
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                                <input type="password" name="password" id="password" placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                    required="">
                            </div>
                            <p class="text-sm font-medium">
                                Already have an account? <a href="{{ route('login') }}"
                                    class="font-bold text-primary-600 underline">Sign In</a>
                            </p>
                            <button type="submit"
                                class=" w-1/2 flex justify-center mx-auto border focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-full text-white p-3 text-center"
                                style="background-color: #DA9318">Create an account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.title = "Register";
    </script>
@endsection
