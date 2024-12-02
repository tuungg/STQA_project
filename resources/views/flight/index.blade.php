@extends('layout.base')

@section('styles')
@endsection

@section('content')
<div class="container outer min-h-svh py-5 mx-auto ">
    {{-- headline --}}
    <div class="block mb-8 mx-auto border-b border-slate-300 pb-1 max-w-[360px]">
        <a
            target="_blank"
            href="https://www.material-tailwind.com/docs/html/card"
            class="block w-full px-4 py-2 text-xl text-center text-slate-700 transition-all"
        >
            <b>Airplane Booking System</b>.
        </a>
    </div>

    {{-- landing Card--}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 max-w-7xl mx-auto">
        @foreach ($flights as $flight )
            <!-- Card 1 -->
            <div class="relative flex flex-col text-gray-700 bg-white shadow-lg  rounded-xl w-72 mx-auto">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-2">
                        <p class="block font-sans text-base antialiased font-medium leading-relaxed text-gray-900">
                            {{$flight->flight_code}}
                        </p>
                        <p class="block font-sans text-base antialiased font-medium leading-relaxed text-gray-900">
                            {{ $flight->origin }} <i class="fa-solid fa-arrow-right"></i>  {{ $flight->destination }}
                        </p>
                    </div>
                    <p class="block font-sans text-sm antialiased font-normal leading-normal text-gray-700 opacity-75">
                        Departure
                    </p>
                    <p class="block font-sans text-base antialiased font-medium leading-relaxed text-gray-900">
                        {{ $flight->departure_time }}
                    </p>
                    <p class="block font-sans text-sm antialiased font-normal leading-normal text-gray-700 opacity-75">
                        Arrival
                    </p>
                    <p class="block font-sans text-base antialiased font-medium leading-relaxed text-gray-900">
                        {{ $flight->arrival_time }}
                    </p>
                </div>
                <div class="p-6 pt-0">
                    <div class="space-y-3">
                        <a href="{{ route('ticket.create',$flight->id) }}" class="block">
                            <button
                                class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg shadow-gray-900/10 hover:shadow-gray-900/20 focus:opacity-[0.85] active:opacity-[0.85] active:shadow-none w-full bg-blue-600 text-white shadow-none hover:scale-105 hover:shadow-none focus:scale-105 focus:shadow-none active:scale-100"
                                type="button">
                                Book Ticket
                            </button>
                        </a>
                        <a href="{{ route('ticket.index',$flight->id) }}" class="block">
                            <button
                            class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg shadow-gray-900/10 hover:shadow-gray-900/20 focus:opacity-[0.85] active:opacity-[0.85] active:shadow-none w-full bg-gray-300 text-black shadow-none hover:scale-105 hover:shadow-none focus:scale-105 focus:shadow-none active:scale-100"
                            type="button">
                            View Detail
                            </button>
                        </a>
                    </div>
                </div>

            </div>

        @endforeach
    </div>
</div>
@endsection

@section('scripts')
@endsection
