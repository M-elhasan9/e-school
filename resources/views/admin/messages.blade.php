@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Messages</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $msg)
                <tr>
                    <td>{{ $msg->id }}</td>
                    <td>{{ $msg->name }}</td>
                    <td>{{ $msg->email }}</td>
                    <td>{{ $msg->message }}</td>
                    <td>{{ $msg->created_at->diffForHumans() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
