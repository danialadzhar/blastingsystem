@extends('layouts.app')

@section('css')

@endsection

@section('content')
<div class="container">
    <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Email Blasting</h1>
        <p class="col-md-8 fs-5">
          Sistem ini dibina adalah bertujuan untuk membuat blasting kepada Team Momentum sahaja, sebarang penggunaan diluar dari tujuan sila berhubung dengan Encik Danial dari R&D.
        </p>
        <a href="https://danial-adzhar.notion.site/S-O-P-Blasting-Email-db4767693aac4b85a9916b81b43a8033" target="_blank" class="btn btn-info" type="button"><i class="bi bi-file-earmark"></i> Documentation</a>
        <a href="{{ asset('csv/format_email_blasting.csv') }}" class="btn btn-warning" download>Download CSV <i class="bi bi-cloud-arrow-down-fill"></i></a>
      </div>
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

{{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea#editor',
    menubar: false
  });
</script> --}}
@endsection
