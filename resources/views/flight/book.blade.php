@extends('layout.base')

@section('styles')
@endsection

@section('content')
<div class="outer min-h-svh">
    <div class="max-w-screen-lg mx-auto p-6 bg-white shadow-md rounded-lg">

        <div class="flex justify-between border-b border-slate-300 mb-2">
            <h2 class="text-2xl font-bold mb-2">Ticket Booking For</h2>
            <h2 class="text-2xl font-bold mb-2">{{ $flight->flight_code }}</h2>
        </div>
        <div class="flex justify-between mb-10">
            <p class="text-md antialiased font-normal leading-normal text-gray-700 opacity-75">
                {{ $flight->origin }} <i class="fa-solid fa-arrow-right"></i>  {{ $flight->destination }}
            </p>
            <div>
                <span class="text-md antialiased font-normal leading-normal text-gray-700 opacity-75">Departure:</span>
                <span class="text-base antialiased font-medium leading-relaxed text-gray-900">
                    {{ $flight->departure_time }}
                </span>
            </div>
            <div>
                <span class="text-md antialiased font-normal leading-normal text-gray-700 opacity-75">Arrived:</span>
                <span class="text-base antialiased font-medium leading-relaxed text-gray-900">
                    {{ $flight->arrival_time }}
                </span>
            </div>
        </div>

        <form action="{{ route('ticket.store') }}" method="POST">
            @csrf
            <input type="hidden" name="flight_id" value="{{ $flight->id }}">
            <!-- passenger_name -->
            <div class="mb-4">
                <label for="passenger_name" class="block text-gray-700 font-medium mb-2">Passenger Name</label>
                <input
                    type="text"
                    id="passenger_name"
                    name="passenger_name"
                    class="@error('passenger_name') border-red-500 @enderror  w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan nama lengkap" required
                    value="{{ old('passenger_name') }}"
                    />
                <span class="mt-2 text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block">
                    @error('passenger_name') {{ $message }} @enderror
                </span>
            </div>

            <!-- passenger_phone -->
            <div class="mb-4">
                <label for="passenger_phone" class="block text-gray-700 font-medium mb-2">Passenger Phone</label>
                <input
                    type="tel"
                    id="passenger_phone"
                    name="passenger_phone"
                    class=" @error('passenger_name') border-red-500 @enderror w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan no telephone" required
                    value="{{ old('passenger_phone') }}"/>
                    <span class="mt-2 text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block">
                        @error('passenger_phone') {{ $message }} @enderror
                    </span>
            </div>

            <!-- seat_number -->
            <div class="mb-4">
                <label for="seat_number" class="block text-gray-700 font-medium mb-2">Seat Number</label>
                <input
                    type="text"
                    id="seat_number"
                    name="seat_number"
                    class=" @error('passenger_name') border-red-500 @enderror w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan Seat Number" required
                    value="{{ old('seat_number') }}" />
                    <span class="mt-2 text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block">
                        @error('seat_number') {{ $message }} @enderror
                    </span>
            </div>

            <!-- Tombol Submit & Reset -->
            <div class="flex items-center justify-end space-x-2">
                <button
                    type="reset"
                    class="px-6 py-2 bg-gray-400 text-white font-bold rounded-lg shadow-md hover:bg-gray-500 focus:ring-2 focus:ring-gray-400 focus:outline-none">
                    Reset
                </button>
                <button
                    type="submit"
                    class="px-6 py-2 bg-blue-500 text-white font-bold rounded-lg shadow-md hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    Submit
                </button>
            </div>
        </form>
    </div>


</div>

@endsection

@section('scripts')
@endsection
