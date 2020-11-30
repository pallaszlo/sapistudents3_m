@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('students.create') }}" class="btn btn-primary">Create student</a>
                    <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Név</th>
                            <th>E-mail cím</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($studs as $stud)
                            <tr>
                                <td>{{$stud->id}}</td>
                                <td>{{$stud->name}}</td>
                                <td>{{$stud->email}}</td>
                                <td><a href="{{ route('students.edit', $stud->id) }}" class="btn btn-primary">Edit</a></td>
                                <td>
                                    <form action="{{ route('students.destroy',$stud->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
