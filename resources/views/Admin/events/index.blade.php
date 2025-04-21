@extends('Admin.layout')
@section('title', 'Events')
@section('content')

<main>
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
                <h3 class="text-lg font-semibold">Recent Events</h3>
                <div class="flex items-center gap-3 text-gray-600">
                    <i class='bx bx-search text-xl cursor-pointer'></i>
                    <i class='bx bx-filter text-xl cursor-pointer'></i>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full table-auto text-center border-collapse">
                    <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                        <tr>
                            <th class="py-3 px-4">Titre</th>
                            <th class="py-3 px-4">Organisateur</th>
                            <th class="py-3 px-4">Prix</th>
                            <th class="py-3 px-4">Participants</th>
                            <th class="py-3 px-4">Statut</th>
                            <th class="py-3 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800">
                        @foreach ($events as $event)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4">{{$event->title}}</td>
                            <td class="py-3 px-4">{{$event->organisateur_id}}</td>
                            <td class="py-3 px-4">{{$event->prix}}</td>
                            <td class="py-3 px-4">{{$event->max_participants}}</td>
                            <td class="py-3 px-4">
                                @if ($event->status == 'pending')
                                    <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-sm font-medium">
                                        {{ $event->status }}
                                    </span>
                                @elseif ($event->status == 'accepted')
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm font-medium">
                                        {{ $event->status }}
                                    </span>
                                @elseif ($event->status == 'rejected')
                                    <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-sm font-medium">
                                        {{ $event->status }}
                                    </span>
                                @endif
                            </td>
                            <td class="py-3 px-4">
                                <a href="#" class="inline-flex items-center text-blue-600 hover:underline gap-x-1" title="Voir détails">
                                    <i class='bx bx-show text-lg'></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4 px-4">
                {{ $events->links() }}
            </div>
        </div>
    </div>


</main>

@endsection
