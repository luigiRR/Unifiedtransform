@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <em class="bi bi-person-lines-fill"></em> Teacher List
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Teacher List</li>
                        </ol>
                    </nav>
                    <div class="mb-4 p-3 bg-white border shadow-sm">
                        <table class="table table-responsive" aria-describedby="TeachersList">
                            <thead>
                                <tr>
                                    <th scope="col">Photo</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teachers as $teacher)
                                <tr>
                                    <td>
                                        @if (isset($teacher->photo))
                                            <img src="{{asset('/storage'.$teacher->photo)}}" class="rounded" alt="Profile picture" height="30" width="30">
                                        @else
                                            <em class="bi bi-person-square"></em>
                                        @endif
                                    </td>
                                    <td>{{$teacher->first_name}}</td>
                                    <td>{{$teacher->last_name}}</td>
                                    <td>{{$teacher->email}}</td>
                                    <td>{{$teacher->phone}}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{url('teachers/view/profile/'.$teacher->id)}}" role="button" class="btn btn-sm btn-outline-primary"><em class="bi bi-eye"></em> Profile</a>
                                            @can('edit users')
                                            <a href="{{route('teacher.edit.show', ['id' => $teacher->id])}}" role="button" class="btn btn-sm btn-outline-primary"><em class="bi bi-pen"></em> Edit</a>
                                            @endcan
                                            {{-- <button type="button" class="btn btn-sm btn-primary"><em class="bi bi-trash2"></em> Delete</button> --}}
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
</div>
@endsection
