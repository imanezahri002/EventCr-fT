@extends('Admin.layout')
@section('title', 'Users')
@section('content')

<main>
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Recent Users</h3>
                <i class='bx bx-search' ></i>
                <i class='bx bx-filter' ></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>email</th>
                        <th>Role</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)


                    <tr>
                        <td>{{$user->nom}}</td>
                        <td>{{$user->prenom}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->nom}}</td>
                        <td><span class="status completed">{{$user->status}}</span></td>
                    </tr>
                    @endforeach
<!-- Pagination -->
<div class="mt-4">
    {{ $users->links() }}
</div>




                </tbody>
            </table>
        </div>
    </div>
</main>

@endsection
