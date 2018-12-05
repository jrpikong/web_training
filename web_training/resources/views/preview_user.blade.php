@extends('layouts.front')

@section('content')
    <section class="page-header page-header-modern page-header-background page-header-background-sm custom-page-header parallax mt-0" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="{{asset('porto/img/slides/slide-corporate-7-2.jpg')}}">

    </section>

    <div class="container">
        <div class="row justify-content-center pt-1 pb-4 mb-3">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">{{ __('PERJANJIAN FREELANCE SAMSUNG STUDENT AMBASADOR') }}</div>

                    <div class="card-body">
                        @php $dateNow = \Carbon\Carbon::now()->format('d-F-Y'); @endphp
                        <p>Pada hari ini, tanggal  <b>{{$dateNow }}</b> yang bertandatangan di bawah ini : </p>

                        <p>Nama			: <b>Nelly Magdalena</b> </p>
                        <p>Jabatan			: <b>Sr. Manager HRD PT. ACCENTUATES</b> </p>
                        <p>Alamat			: <b>Gedung Satrio Tower Lt. 10, Jl. Prof. Dr. Satrio Kav.1-4 Blok C4 Jakarta 12950</b></p>
                        <p>Selanjutnya di sebut sebagai <b>PIHAK PERTAMA</b> (perwakilan dari PT. Accentuates )</p>

                        <p>Nama : <b>{{ Auth::user()->name }}</b></p>
                        <p>Tempat / Tanggal Lahir : <b>{{ Auth::user()->place_of_birth }} {{ Auth::user()->birth_date }}</b></p>
                        <p>Alamat sesuai KTP: <b>{{ Auth::user()->address }}</b></p>
                        <p>No. HP: <b>{{ Auth::user()->phone_number }}</b></p>
                        <p>Nama Universitas: <b>{{ Auth::user()->university }}</b></p>
                        <p>Jurusan: <b>{{ Auth::user()->majors }}</b></p>
                        <p>Tahun Masuk: <b>{{ Auth::user()->entry_year }}</b></p>

                        <p>Selanjutnya disebut sebagai <b><b>PIHAK KEDUA</b></b> (Freelancer)</p>
                        <p>
                            Dengan ini PIHAK PERTAMA dan <b>PIHAK KEDUA</b> sepakat untuk memenuhi ketentuan-ketentuan dalam perjanjian sebagaimana yang tercantum di dalam pasal-pasal berikut ini:
                        </p>

                        <h4 class="text-center">Pasal 1</h4>
                        <h4 class="text-center">Kesepakatan</h4>
                        <p>
                            PIHAK PERTAMA bersedia menerima <b>PIHAK KEDUA</b> sebagai peserta Program Samsung Student Ambasador dan <b>PIHAK KEDUA</b> menyatakan kesediaannya untuk mengikuti Program Samsung Student Ambasador yang dilaksanakan oleh PIHAK PERTAMA.
                        </p>

                        <h4 class="text-center">Pasal 2</h4>
                        <h4 class="text-center">Masa Kerja</h4>>
                        <p>
                            Pelaksanaan Kerja yang lakukan oleh <b>PIHAK PERTAMA</b> kepada <b>PIHAK KEDUA</b> selama 3 (tiga) Bulan, yang di mulai pada tanggal {{$dateNow}} sampai dengan 26 Desember 2018.
                        </p>

                        <h4 class="text-center">Pasal 3</h4>
                        <h4 class="text-center">Hak & Kewajiban Pihak Pertama</h4>>
                        {{--<p>--}}
                        <ol>
                            <li><b>PIHAK PERTAMA</b> merupakan Vendor dari PT. Samsung Elektronik Indonesia, dan <b>PIHAK PERTAMA</b> mempunyai kewajiban untuk mencari Peserta Program yang bersedia untuk Samsung Student Ambasador dengan syarat dan ketentuan yang berlaku.</li>
                            <li><b>PIHAK PERTAMA</b> akan membayar setiap hak-hak yang telah di berikan oleh PT. Samsung Elektronik Indonesia kepada <b>PIHAK KEDUA</b> sesuai jadwal yang ditentukan.</li>
                            <li><b>PIHAK PERTAMA</b> akan memberikan Penilaian kepada Hasil Kerja dari Peserta Program yang akan di evaluasi secara berkala.</li>
                            <li>Setiap Personal Samsung Student Ambasador wajib membawa nama baik Brand SAMSUNG dan Agency PT Accentuates.</li>
                            <li>Setiap bulan Team Samsung Student Ambasador akan direview atas hasil penjualannya.</li>
                            <li>Bagi yang tidak aktif (tidak ada penjualan selama 3 bulan) akan di Non Aktifkan ID nya untuk di stop tunjangan pulsa / paket datanya serta tidak berlaku untuk insentif penjualan selanjutnya.</li>
                        </ol>

                        <h4 class="text-center">Pasal 4</h4>
                        <h4 class="text-center">
                            Hak & Kewajiban dari Pihak Kedua
                        </h4>
                        <ol>
                            <li><b>PIHAK KEDUA</b> bersedia untuk menjadi Partner PT. Samsung Elektronik Indonesia untuk melakukan proses penjualan online melalui “Blibli” dimana <b>PIHAK KEDUA</b> berhak mendapatkan pengajaran materi penjualan dari Pihak Samsung dan berhak atas insentif dari penjualan tersebut.</li>
                            <li>Selama masa program <b>PIHAK KEDUA</b> wajib mengikuti ketentuan yang berlaku sesuai dengan aturan yang telah diberikan oleh <b>PIHAK PERTAMA</b>. </li>
                            <li>
                                <p>3. <b>PIHAK KEDUA</b> berhak untuk mendapatkan benefit sebagai berikut: </p>
                                <p>• Tunjangan Pulsa	: Rp. 100.000,-/bulan</p>
                                <p>• Insentif : sesuai pencapaian penjualan</p>

                            </li>
                        </ol>
                        <p>
                            Hasil kerja dari <b>PIHAK KEDUA</b> akan di evaluasi oleh <b>PIHAK PERTAMA</b> secara berkala.
                        </p>
                        <p class="text-center">Pasal 5</p>
                        <p>
                            Setelah masa program (pasal 2 diatas) berakhir, maka berakhir pula perjanjian ini dan tidak ada kewajiban atau tuntutan dari <b>PIHAK PERTAMA</b> dan <b>PIHAK KEDUA</b> terhadap perjanjian program ini.
                        </p>
                        <h4 class="text-center">Pasal 6</h4>
                        <h4 class="text-center">Penutup</h4>

                        <p>Perjanjian ini dibuat oleh <b>PIHAK PERTAMA</b> dan <b>PIHAK KEDUA</b> tanpa ada paksaan dari Pihak manapun dan di tandatangani dengan adanya Kesepakatan Bersama serta dibuat rangkap 2 (dua).</p>

                        <p class="text-right"><b>Jakarta, {{$dateNow}} </b></p>
                        <div class="text-right">
                            <img src="{{asset($user->getFirstMediaUrl('img_digital_signature'))}}" class="img-thumbnail" style="width: 300px;height: 100px;">
                        </div>

                        <div class="text-right mt-5">
                            <form method="get" action="{{ route('home') }}" class="contact-form custom-contact-form-style-1" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-0">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('OK SIGN IT') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
