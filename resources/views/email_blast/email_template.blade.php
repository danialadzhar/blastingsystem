@extends('layouts.app')

@section('css')
    
@endsection

@section('content')
<div class="container">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-primary text-decoration-none">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Email Template</li>
        </ol>
    </nav> 
    @if(session('success'))
    <div class="col-md-12">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Successful!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif
    <div class="col-md-12">
        <a href="{{ url('email/template/create') }}" class="btn btn-primary mb-3 float-end"><i class="bi bi-plus-lg"></i> New Template</a>
    </div>
    <div class="col-md-12">
        <table class="table table-hover">
            <thead>
                <th>#</th>
                <th>Title</th>
                <th><i class="bi bi-gear-wide-connected"></i></th>
            </thead>
            <tbody>
                @foreach ($email_template as $value)
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ $value->title }}</td>
                        <td><a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete{{ $value->id }}"><i class="bi bi-trash"></i></a></td>
                    </tr>
                    <!-- Delete Template -->
                    <div class="modal fade" id="delete{{ $value->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Delete Template</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are You Sure To Delete?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{ url('email/template/destroy') }}/{{ $value->id }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Yes, I am</button>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
    
@endsection