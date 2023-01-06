@extends('layouts.master')
@section('content')


<section class="section">
    <div class="section-header">
        <h1>Data Peminjaman</h1>
        <div class="section-header-breadcrumb">

        </div>
    </div>
    <div class="section-body">
        <h3 class="section-title">Daftar Peminjaman Laptop</h3>
        <table id="data-admin" class="table table-striped table-bordered table-md"
            style="width: 100%; margin-top:5%; padding:2%;" cellspacing="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>JK</th>
                    <th>Email</th>
                    <th>No Handphone</th>
                    <th>No Handphone Ayah</th>
                    <th>No Handphone Ibu</th>
                    <th>Validator</th>
                    <th>Tanggal divalidasi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;?>
                @foreach($data as $dt)

                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$dt->nisn}}</td>
                    <td>{{$dt->nama}}</td>
                    <td>{{$dt->jk}}</td>
                    <td>{{$dt->email}}</td>
                    <td>{{$dt->no_hp}}</td>
                    <td>{{$dt->no_hp_ayah}}</td>
                    <td>{{$dt->no_hp_ibu}}</td>
                    @if ($dt->validator)
                        <td>{{$dt->validator}}</td>
                        <td>{{$dt->updated_at}}</td>
                    @else
                        <td><form method="POST" action="{{route('validate')}}">
                            @csrf
                            <input type="hidden" name="nisn" value="{{$dt->nisn}}">
                            <input type="hidden" name="no_laptop" value="{{$dt->no_laptop}}">
                            <input type="submit" value="Validasi" class="btn btn-primary btn-lg btn-demo">
                        </form></td>
                        <td>-</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
<script src="../../assets/admin/dataTables/js/jquery.dataTables.min.js"></script>
<script src="../../assets/admin/dataTables/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#data-admin').DataTable({
            "iDisplayLength": 25
        });
    });

</script>


@endsection
