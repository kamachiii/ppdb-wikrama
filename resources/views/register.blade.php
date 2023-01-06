<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">
    <link href="img/Logo.png" rel='shortcut icon'>

    <title>PPDB SMK Wikrama Bogor</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- PLUGINS CSS STYLE -->
    <link rel="stylesheet" href="assets/template/plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/template/plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="assets/landing page/css/font-awesome.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- CUSTOM CSS -->
    <link href="assets/template/css/style.css" rel="stylesheet">
    <link href="assets/template/css/preloader.css" rel="stylesheet">
    <link href="assets/template/css/form.css" rel="stylesheet">

</head>

<body
    style="background-image: linear-gradient(45deg, #009EC5 0%, #2e7eed 20%, #02225B 50%); background-repeat: no-repeat; min-height: 100vh">
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <div class="container d-flex justify-content-center">
        <div class="card card-form mx-md-5 mx-0 my-5">
            <div class="card-body px-2">
                <h3 class="card-heading text-center">Form Pendaftaran PPDB</h3>
                <p class="card-subheading text-center mb-3 font-weight-bold pb-3 text-dark">SMK Wikrama Bogor TP.
                    2023-2024</p>
                <form method="POST" action="{{ route('storeStudent') }}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="nisn" class="mb-2">NISN</label>
                            <input type="text" name="nisn" id="nisn"
                                class="form-control  " placeholder="Masukkan NISN"
                                value="" required autocomplete="nisn">
                                                    </div>
                        <div class="form-group col-md-6">
                            <label for="jk" class="ml-2 mb-2">Jenis Kelamin</label>
                            <select name="jk" class="form-control w-100" id="jk" value="">
                                <option hidden>--Jenis Kelamin--</option>
                                <option value="Perempuan">Perempuan</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="nama" class="mb-2">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control"
                                placeholder="Masukkan Nama Lengkap" value="" required
                                autocomplete="nama">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="sekolah" class="mb-2">Asal Sekolah</label>
                            <select name="smp" class="select2 form-control w-100 ml-0"
                                onchange='checkvalue(this.value)' >
                                <option hidden disabled selected>--Pilih Asal Sekolah--</option>
                                @include('partials.smp')
                            </select>
                        </div>
                    </div>
                    <div class="row" id="other_text" style="display: none">
                        <div class="form-group col-md-12">
                            <label for="asal_sekolah_text" class="mb-2">Nama Sekolah</label>
                            <input type="text" name="smp_text" id="asal_sekolah_text" class="form-control"
                                placeholder="Masukkan Asal Sekolah">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="email" class="mb-2">Email</label>
                            <input type="email" name="email" id="email" class="form-control "
                                placeholder="Masukkan Email Aktif" value="" required
                                autocomplete="email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="telp" class="mb-2">Nomor Handphone</label>
                            <input type="number" name="no_hp" id="telp" class="form-control"
                                placeholder="Contoh : 08--------" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="telp-ayah" class="mb-2">Nomor HP Ayah</label>
                            <input type="number" name="no_hp_ayah" class="form-control" id="telp-ayah"
                                placeholder="Contoh : 08--------" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="telp-ibu" class="mb-2">Nomor HP Ibu</label>
                            <input type="number" name="no_hp_ibu" class="form-control" id="telp-ibu"
                                placeholder="Contoh : 08--------" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label>Pilih Referensi</label>
                            <select name="referensi" class="form-control" id="pilih_referensi"
                                onclick="tampil_referensi()" required>
                                <option disabled hidden selected>Pilih Referensi</option>
                                <option value="pegawai">Guru/Staf/Laboran/Pegawai Wikrama</option>
                                <option value="siswa">Siswa SMK Wikrama</option>
                                <option value="alumni">Alumni SMK Wikrama</option>
                                <option value="guru_smp">Guru SMP</option>
                                <option value="calon_siswa">Calon Siswa SMK Wikrama</option>
                                <option value="sosial_media">Sosial Media</option>
                                <option value="referensi_langsung">Referensi Langsung</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" id="referensi_pegawai" style="display:none;">
                        <div class="col-sm-12">
                            <label><b>Referensi dari Guru/Staf/Laboran/Pegawai Wikrama</b></label>
                            <br>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <label>Nama Guru/Staf/Laboran/Pegawai Wikrama</label>
                            <input type="text" class="form-control" name="nama_pegawai_wikrama"
                                id="nama_pegawai_wikrama">
                        </div>
                    </div>
                    <div class="row align-items-start" id="referensi_siswa" style="display:none;">
                        <div class="col-sm-12">
                            <label><b>Referensi dari Siswa Wikrama</b></label>
                            <br>
                        </div>
                        <div class="col-sm-12">
                            <label>Nama Siswa</label>
                            <input type="text" class="form-control" name="nama_siswa" id="nama_siswa">
                        </div>
                        <div class="col-sm-12 mt-2">
                            <label>Rayon</label>
                            <select name="rayon" id="rayon" class="form-control">
                                @include('partials.rayon')
                            </select>
                        </div>
                    </div>
                    <div class="row align-items-start" id="referensi_alumni" style="display:none;">
                        <div class="col-sm-12">
                            <label><b>Referensi dari Alumni Wikrama</b></label>
                            <br>
                        </div>
                        <div class="col-sm-12">
                            <label>Nama Alumni</label>
                            <input type="text" class="form-control" name="nama_alumni" id="nama_alumni">
                        </div>
                        <div class="col-sm-12 mt-2">
                            <label>Tahun Lulus Alumni</label>
                            <input type="number" class="form-control" name="tahun_lulus_alumni" id="tahun_lulus_alumni">
                        </div>
                    </div>
                    <div class="row align-items-start" id="referensi_guru_smp" style="display:none;">
                        <div class="col-sm-12">
                            <label><b>Referensi dari Guru SMP</b></label>
                            <br>
                        </div>
                        <div class="col-sm-12">
                            <label>Nama Guru</label>
                            <input type="text" class="form-control" name="nama_guru_smp" id="nama_guru_smp">
                        </div>
                        <div class="col-sm-12 mt-2">
                            <label>Asal SMP</label>
                            <input type="text" class="form-control" name="nama_smp" id="nama_smp" >
                        </div>
                    </div>
                    <div class="row align-items-start" id="referensi_calon_siswa" style="display:none;">
                        <div class="col-sm-12">
                            <label><b>Referensi dari Calon Peserta Didik</b></label>
                            <br>
                        </div>
                        <div class="col-sm-12">
                            <label>No Seleksi</label>
                            <input type="number" class="form-control" name="referensi_no_seleksi"
                                id="referensi_no_seleksi" >
                        </div>
                        <div class="col-sm-12 mt-2">
                            <label>Nama Calon Peserta</label>
                            <input type="text" class="form-control" name="referensi_nama_siswa"
                                id="referensi_nama_siswa" >
                        </div>
                    </div>
                    <div class="row align-items-start" id="referensi_sosmed" style="display:none;">
                        <div class="col-sm-12">
                            <!-- <label><b>Referensi Sosial Media</b></label>
                            <br> -->
                        </div>
                        <div class="col-sm-12">
                            <input type="hidden" name="referensi_sosmed" id="referensi_sosmed" class="form-control"
                                value="sosial_media">
                        </div>
                    </div>
                    <div class="row align-items-start" id="referensi_langsung" style="display:none;">
                        <div class="col-sm-12">
                            <!-- <label><b>Referensi Langsung</b></label> -->
                            <br>
                        </div>
                        <div class="col-sm-12">
                            <input type="hidden" name="referensi_langsung" id="referensi_langsung" class="form-control"
                                value="daftar_langsung">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div></div>
                        <button type="submit"
                            class="btn btn-main-sm shadow-md bordered mt-3"><span>Registrasi</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--============================
    =            Footer            =
    =============================-->
    <footer>
        <div class="footer-main bg-light px-0 pb-3 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1 col-md-12"></div>
                    <div class="col-lg-5 col-md-5 m-md-auto align-self-center">
                        <div class="block m-auto">
                            <a href="#"><img src="assets/landing page/images/logo.png" alt="footer-logo" width="120"
                                    class="ml-2"></a>
                            <!-- Social Site Icons -->
                            <ul class="social-icon list-inline pl-4">
                                <li class="list-inline-item">
                                    <a href="https://www.linkedin.com/school/smkwikramabogor/mycompany/" target="_blank"
                                        style="background-color: #fdd818; color: #333"><i class="ti-linkedin"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://www.instagram.com/smkwikrama/" target="_blank"
                                        style="background-color: #fdd818; color: #333"><i class="ti-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-5 col-12 mt-sm-5 mt-3 mt-lg-0 pl-4 pl-md-0">
                        <div class="block-2">
                            <!-- heading -->
                            <h6 class="text-dark">Tautan</h6>
                            <!-- links -->
                            <ul>
                                <li><a href="/#beranda" class="active">Beranda</a></li>
                                <li><a href="/#jurusan">Jurusan</a></li>
                                <li><a href="/#features">Tentang Kami</a></li>
                                <li><a href="/#testimonials">Testimoni</a></li>
                                <li><a href="/#contact-us">Hubungi Kami</a></li>
                                <li><a href="/student">Login</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-7 mt-sm-5 mt-3 mt-lg-0 pl-4 pl-md-0">
                        <div class="block-2">
                            <!-- heading -->
                            <h6 class="text-dark">Kontak Pendaftaran</h6>
                            <!-- links -->
                            <ul>
                                <li class="font-weight-bold">CS 1 : <a
                                        style="text-decoration: underline !important; font-weight: bold !important"
                                        href="https://wa.me/6288219412242">hubungi kami (klik disini)</a></li>
                                <li>Alamat<br />
                                    Jl. Raya Wangun<br />
                                    Kelurahan Sindangsari <br />
                                    Bogor Timur 16720</li>
                            </ul>
                        </div>
                        <div class="text-center py-4 bg-light" style="border-top: 1px solid #5F6F94">
                            <small class="text-secondary">Copyright &copy; <script>
                                    document.write(new Date().getFullYear())

                                </script> SMK Wikrama</small class="text-secondary">
                        </div>
    </footer>

    <!-- JAVASCRIPTS -->
    <script src="assets/template/plugins/jquery/jquery.min.js"></script>
    <script src="assets/template/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/template/plugins/slick/slick.min.js"></script>
    <script src="assets/template/plugins/fancybox/jquery.fancybox.min.js"></script>
    <script src="assets/template/plugins/syotimer/jquery.syotimer.min.js"></script>
    <script src="assets/template/plugins/aos/aos.js"></script>
    <script src="assets/landing page/js/scrollreveal.min.js"></script>

    <script src="assets/template/js/script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Global Init -->
    <script src="assets/landing page/js/custom.js"></script>

    <script>
        function checkvalue(val) {
            if (val === "others") {
                document.getElementById('other_text').style.display = 'block';
            } else {
                document.getElementById('other_text').style.display = 'none';
            }
        }

        $(document).ready(function () {
            $('.select2').select2();
        });

        function tampil_referensi() {

            if (document.getElementById("pilih_referensi").value == "pegawai") {
                document.getElementById("referensi_pegawai").style.display = "block";
            } else {
                document.getElementById("referensi_pegawai").style.display = "none";
            }

            if (document.getElementById("pilih_referensi").value == "siswa") {
                document.getElementById("referensi_siswa").style.display = "block";
            } else {
                document.getElementById("referensi_siswa").style.display = "none";
            }

            if (document.getElementById("pilih_referensi").value == "alumni") {
                document.getElementById("referensi_alumni").style.display = "block";
            } else {
                document.getElementById("referensi_alumni").style.display = "none";
            }

            if (document.getElementById("pilih_referensi").value == "guru_smp") {
                document.getElementById("referensi_guru_smp").style.display = "block";
            } else {
                document.getElementById("referensi_guru_smp").style.display = "none";
            }

            if (document.getElementById("pilih_referensi").value == "calon_siswa") {
                document.getElementById("referensi_calon_siswa").style.display = "block";
            } else {
                document.getElementById("referensi_calon_siswa").style.display = "none";
            }

            if (document.getElementById("pilih_referensi").value == "sosial_media") {
                document.getElementById("referensi_sosmed").style.display = "block";
            } else {
                document.getElementById("referensi_sosmed").style.display = "none";
            }

            if (document.getElementById("pilih_referensi").value == "referensi_langsung") {
                document.getElementById("referensi_langsung").style.display = "block";
            } else {
                document.getElementById("referensi_langsung").style.display = "none";
            }
        }

    </script>
</body>

</html>
