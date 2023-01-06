@extends('layouts.master')
@section('content')
<form method="POST" action="{{ route('storePayment') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Form pembayaran</h4>
                </div>
                <div class="card-body">
                    <div class="row align-items-start">
                        <div class="col-sm-4">
                            <label for="bank" class="mb-2">Nama Bank</label>
                            <select name="bank" class="select2 form-control w-100 ml-0" onchange='checkvalue(this.value)' >
                                <option hidden disabled selected>--Pilih Bank--</option>
                                @include('partials.bank')
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>Nama Pemilik Rekening</label>
                            <input type="text" class="form-control" name="nama" >
                        </div>
                        <div class="col-sm-4">
                            <label>Nominal</label>
                            <input type="text" class="form-control" name="nominal" id="nominal" >
                        </div>
                        <div class="form-group col-sm-12 mt-3" id="other_text" style="display: none;">
                            <label for="bank_text" class="mb-2">Nama Bank</label>
                            <input type="text" name="bank_text" id="bank_text" class="form-control" placeholder="Masukkan Nama Bank">
                        </div>
                        <div class="col-sm-12 mt-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="image">
                                <label class="custom-file-label" for="customFile">foto</label>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="row align-items-start">
                        <div class="col-sm-8"></div>
                        <div class="col-sm-4">
                            <input type="submit" value="Upload Bukti Pembayaran" class="btn btn-block btn-primary">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
/* Bank Lainnya */
    function checkvalue(val) {
        if (val === "others") {
            document.getElementById('other_text').style.display = 'block';
        } else {
            document.getElementById('other_text').style.display = 'none';
        }
    }

/* Rupiah */
    var dengan_rupiah = document.getElementById('nominal');
    dengan_rupiah.addEventListener('keyup', function(e)
    {
        dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>
@endsection
