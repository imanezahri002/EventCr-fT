@extends('Organisateur.layout')
@section('title', 'Event Details')
@section('content')



    <main class="overflow-hidden">
        <div class="head-title">
            <div class="left">
                <h1>Events</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Events</a>
                    </li>
                </ul>
            </div>
            <a href="#" class="btn-download">
                <i class='bx bxs-cloud-download' ></i>
                <span class="text">Download PDF</span>
            </a>
        </div>
        <div class="table-data p-4">
            <div class="order bg-white shadow-md rounded-lg overflow-hidden">
                <div class="head flex items-center justify-between p-4 border-b">
                    <h3 class="text-lg font-semibold">Reservation Events</h3>
                    <div class="flex items-center gap-3 text-gray-600">
                        <i class='bx bx-search text-xl cursor-pointer'></i>
                        <i class='bx bx-filter text-xl cursor-pointer'></i>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full table-auto border-collapse">
                        <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                            <tr>
                                <th class="py-3 px-4 text-left w-1/3">Evenement</th>
                                <th class="py-3 px-4 text-center w-1/3">Total Prix</th>
                                <th class="py-3 px-4 text-left w-1/3">Email Participant</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-800">
                            @foreach ($reservations as $reservation)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 px-4 text-left">{{$reservation->event->title}}</td>
                                <td class="py-3 px-4 text-center">{{$reservation->prix_total}}</td>
                                <td class="py-3 px-4 text-left">{{$reservation->email}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 px-4">
                    {{ $reservations->links() }}
                </div>
            </div>
        </div>


    </main>



@endsection
