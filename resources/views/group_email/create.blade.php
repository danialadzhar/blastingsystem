@extends('layouts.app')

@section('css')
    
@endsection

@section('content')
<div class="container">
    <div class="row">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-primary text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">User Email</li>
                <li class="breadcrumb-item active" aria-current="page">Upload Email</li>
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

        @if($errors->has('user_email'))
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Sorry!</strong> The file you uploaded is not in CSV format
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-body py-5 px-5" style="background-color: #fafafa;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Upload Email</label>
                                <form action="{{ url('user-email/upload') }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <input class="form-control" name="user_email" type="file" required>
                                    <small class="text-danger">*Only CSV file</small>
                                    <button class="btn btn-success btn-sm mt-3 float-end">Upload <i class="bi bi-cloud-arrow-up-fill"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    
@endsection