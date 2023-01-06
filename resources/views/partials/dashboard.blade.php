@extends('layouts.master')
@section('content')

    @if (Auth::user()->is_admin == 0)
        @include('student.dashboard')
    @else
        @include('admin.dashboard')
    @endif

<script src="../../assets/admin/dataTables/js/jquery.dataTables.min.js"></script>
<script src="../../assets/admin/dataTables/js/dataTables.bootstrap4.min.js"></script>
@endsection
