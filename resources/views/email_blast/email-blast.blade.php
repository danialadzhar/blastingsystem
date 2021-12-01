@extends('layouts.app')

@section('css')
    
@endsection

@section('content')
<div class="container">
    <form action="{{ url('email/send-mail') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <h2>Email Blast</h2>
                <hr>
            </div>
            @if(session('success'))
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Successful!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            <div class="col-md-6 mb-3">
                <select class="form-select" name="email_template" required>
                    <option value="" selected>-- Choose Email Template --</option>
                    @foreach ($email_template as $value)
                        <option value="{{ $value->id }}">{{ $value->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <select class="form-select" name="email_group" required>
                    <option value="" selected>-- Choose Email Group --</option>
                    @foreach ($email_group as $value)
                        <option value="{{ $value->group_id }}">{{ $value->group_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary float-end">Submit <i class="bi bi-arrow-right"></i></button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('js')
    
@endsection