@extends('layout.base')

@section('style')

@endsection

@section('content')

<div class="min-h-svh max-w-screen-xl mx-auto mt-12">
    <div class="flex justify-between border-b border-slate-300 mb-2">
        <h2 class="text-2xl font-bold mb-2">Ticket Details for {{ $flight->flight_code }}</h2>
        <h2 class="text-2xl font-bold mb-2">{{ count($tickets) }} passengers | {{ $totalBoard }} boardings</h2>
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


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full  text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Passenger Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Passenger Phone
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Seat_number
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Boarding
                    </th>
                    <th scope="col" class="px-6 py-3">
                        delete
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $t)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$loop->iteration}}
                        </th>
                        <td class="px-6 py-4 ">
                            {{ $t->passenger_name }}
                        </td>
                        <td class="px-6 py-4 ">
                            {{ $t->passenger_phone }}
                        </td>
                        <td class="px-6 py-4 ">
                            {{ $t->seat_number }}
                        </td>
                        <td class="px-6 py-4">
                            @if($t->is_boarding)
                                <span class="text-green-500 dark:text-green-600">Board: {{$t->boarding_time}}</span>
                            @else
                                <form action="{{ route('ticket.boarding',$t->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                        Confirm Boarding
                                    </button>
                                </form>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('ticket.destroy',$t->id) }}" method="POST">
                                @csrf
                                @method('Delete')
                                <button type="submit" {{ $t->is_boarding? 'disabled': '' }} class=" text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</div>



@endsection

@section('script')

@endsection
