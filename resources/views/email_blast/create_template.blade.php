@extends('layouts.app')

@section('css')
    
@endsection

@section('content')
<div class="container">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-primary text-decoration-none">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('email/template') }}" class="text-primary text-decoration-none">Email Template</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav> 
    <div class="col-md-12">
        <form action="{{ url('email/template/store') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-8 mb-3">
                    <input type="text" class="form-control" placeholder="Email Subject" name="title" required>
                </div>
                <div class="col-md-12 col-lg-8 mb-3">
                    <div class="form-group">
                        {{-- <textarea name="email_content" id="technig"></textarea> --}}
                        <textarea class="ckeditor form-control" name="email_content"></textarea>
                    </div>
                </div>
                <div class="col-md-12 col-lg-8">
                    <button type="submit" class="btn btn-primary float-end">Submit <i class="bi bi-arrow-right"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script> 
@endsection