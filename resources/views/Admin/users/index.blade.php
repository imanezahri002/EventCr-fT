@extends('Admin.layout')
@section('title', 'Users')
@section('content')

<main>
    <div class="head-title">
        <div class="left">
            <h1>Users</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Users</a>
                </li>
            </ul>
        </div>
        <a href="#" class="btn-download">
            <i class='bx bxs-cloud-download' ></i>
            <span class="text">Download PDF</span>
        </a>
    </div>
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
                        <td>
                            @if ($user->status == 'active')
                            <form action="{{route('admin.users.ban',$user->id)}}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="status banned" onclick="return confirm('Confirmer le bannissement ?')">banner</button>
                            </form>
                            @else
                            <form action="{{route('admin.users.activate',$user->id)}}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="status completed">activer</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
            {{ $users->links() }}
            </div>

        </div>

    </div>

</main>

@endsection
