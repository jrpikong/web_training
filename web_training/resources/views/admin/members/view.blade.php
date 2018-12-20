@extends('layouts.app')


@section('content')
    <div class="card my-3">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Detail Member</h5>
            <div class="header-elements">
                <ul class="pagination pagination-sm pagination-pager justify-content-between mt-2 mt-sm-0">
                    <li class="page-item">
                        <a href="{{route('admin_members')}}" class="page-link"><i class="icon-backward mr-3 icon-1x"></i> Back</a>
                    </li>
                </ul>
            </div>
        </div>
        <table class="table table-bordered">
            <tr>
                <td>Nama Lengkap</td>
                <td>{{$member->name}}</td>
            </tr>
            <tr>
                <td>Nama Panggilian</td>
                <td>{{$member->nic_name}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{$member->email}}</td>
            </tr>
            <tr>
                <td>Nomor HP / WA</td>
                <td>{{$member->phone_number }}</td>
            </tr>
            <tr>
                <td>TTL</td>
                <td>{{$member->place_of_birth}} - {{$member->birth_date}}</td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>{{$member->gender}}</td>
            </tr>
            <tr>
                <td>Nama Universitas</td>
                <td>{{$member->university}}</td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>{{$member->majors}}</td>
            </tr>
            <tr>
                <td>Nomor KTP</td>
                <td>{{$member->id_identity}}</td>
            </tr>
            <tr>
                <td>Nomor Identitas Mahasiswa</td>
                <td>{{$member->id_university}}</td>
            </tr>
            <tr>
                <td>IPK</td>
                <td>{{$member->grade_point_average}}</td>
            </tr>
            <tr>
                <td>Rekening Mandiri</td>
                <td>{{ $member->bank_account }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>{{ $province.' - '.$city.' - '.$disctric }} - {{$member->address}} {{$member->postal_code}}</td>
            </tr>
            <tr>
                <td>Tipe Kepribadian</td>
                <td>
                    @php
                        $melankolis=0;
                        $kolerik = 0;
                        $sanguinis = 0;
                        $plegmatis = 0;
                            foreach ( $personality as $field ) {
                                if($field->type_of_choice == 'Melankolis'){
                                    $melankolis ++ ;
                                }else if ($field->type_of_choice == 'Kolerik'){
                                    $kolerik++;
                                }else if($field->type_of_choice == 'Sanguinis'){
                                    $sanguinis++;
                                }else if($field->type_of_choice == 'Plegmati'){
                                    $plegmatis++;
                                }
                            }
                    @endphp
                    <p>Melankolis: {{ round($melankolis / count($personality) * 100)}} %</p>
                    <p>Kolerik: {{ round($kolerik / count($personality) * 100)}} %</p>
                    <p>Sanguinis: {{ round($sanguinis / count($personality) * 100)}} %</p>
                    <p>Plegmati: {{ round($plegmatis / count($personality) * 100)}} %</p>
                </td>
            </tr>
            <tr>
                <td>Foto diri</td>
                <td><img src="{{$member->getFirstMediaUrl('img_profile','thumb')}}" class="img-thumbnail"></td>
            </tr>
            <tr>
                <td>Digital Signature</td>
                <td><img src="{{$member->getFirstMediaUrl('img_digital_signature')}}" class="img-thumbnail"></td>
            </tr>
            <tr>
                <td>Foto kartu mahasiswa</td>
                <td><img src="{{$member->getFirstMediaUrl('img_student_card')}}" class="img-thumbnail"></td>
            </tr>
            <tr>
                <td>Upload scan KTP</td>
                <td><img src="{{$member->getFirstMediaUrl('img_identity')}}" class="img-thumbnail"></td>
            </tr>
            <tr>
                <td>Upload scan NPWP</td>
                <td><img src="{{$member->getFirstMediaUrl('img_npwp')}}" class="img-thumbnail"></td>
            </tr>
        </table>
    </div>
@endsection


@push('script')
    <!-- Theme JS files -->
    <script src="{{asset('limitless/assets/js/app.js')}}"></script>
@endpush
