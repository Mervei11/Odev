@extends('layouts.app')
@section('admin-title', 'İzinler')
@section('content')


    <div class="card card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <input type="text" id="search_input" data-kt-user-table-filter="search"
                        class="form-control form-control-solid w-250px ps-13" placeholder="Menü ara . . . ">
                </div>
            </div>
            <div class="card-toolbar">

                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_add_off_day">
                        <i class="ki-duotone ki-plus fs-2"></i> İzin Günü Ekle
                    </button>
                </div>
                @include('models/off_day/add')
            </div>
        </div>
        <div class="card-body py-4">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable_example
            ">
                <thead>
                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                        <th>Sicil No</th>
                        <th>Adı/Soyadı</th>
                        <th>İzin Tarihi</th>
                        <th>İzin Türü</th>
                        <th>Açıklama</th>
                        <th class="text-end min-w-100px">İşlemler</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold">
                    @foreach ($off_days as $off_day)
                        <tr>
                            <td><span class="text-gray-800 mb-1">{{ $off_day->izin_personel_sicil_no }}</span></td>
                            <td><span class="text-gray-800 mb-1">{{ $off_day->izin_personel_ad_soyad }}</span></td>
                            <td><span class="text-gray-800 mb-1">{{ date('d/m/Y', strtotime($off_day->izin_tarihi)) }}</td>
                            <td><span class="text-gray-800 mb-1">{{ $off_day->izin_türü }}</td>
                            <td><span class="text-gray-800 mb-1">{{ $off_day->izin_aciklama }}</td>
                            <td>
                                <div class="text-end">
                                    <span class="btn btn-light-warning" data-bs-toggle="modal"
                                        data-bs-target='#kt_modal_edit_off_day{{ $off_day->id }}'>Düzenle</span>
                                    <button class="btn btn-light-danger"
                                        onclick="confirmDataRemoval({{ $off_day->id }})">Kaldır</button>
                                </div>
                            </td>
                        </tr>
                        @include('models/off_day/edit')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



@section('scripts')

    <script>
        var menuDataTable = $("#menu_table").DataTable({
            paging: true,
            pageLength: 10,
            searching: true,
            ordering: true,
            responsive: true,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.24/i18n/Turkish.json"
            }
        });





        $("#search_input").on("keyup", function() {
            menuDataTable.search(this.value).draw();
        });

        function updateStatus(checkbox) {
            var durum = checkbox.checked ? 1 : 0;
            var employee_id = checkbox.value;
            $.ajax({
                url: '{{ route('off_days.updateStatus') }}',
                type: 'POST',
                data: {
                    durum: durum,
                    off_day_id: off_day_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

        // Kaldırma
        function confirmDataRemoval(id) {
            Swal.fire({
                title: 'Veriyi Kaldırma Onayı',
                text: 'Bu veriyi kaldırmak istediğinizden emin misiniz?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Evet, Kaldır',
                cancelButtonText: 'Hayır, İptal Et'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete('/off_days/delete/' + id)
                        .then((response) => {
                            Swal.fire({
                                title: 'Başarılı',
                                text: response.data.message,
                                icon: 'success',
                                confirmButtonText: 'Tamam'
                            }).then(() => {
                                location.reload();
                            });
                        })
                        .catch((error) => {
                            Swal.fire('Hata', error.response.data.message || 'Bir hata oluştu.', 'error');
                        });
                } else {
                    Swal.fire('İptal Edildi', 'Veri kaldırma işlemi iptal edildi.', 'error');
                }
            });
        }


        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toastr-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "10000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        var toastrMessage = {!! json_encode(session('toastr')) !!};

        if (toastrMessage) {
            toastr[toastrMessage.type](toastrMessage.message);
        }
    </script>

@endsection
@endsection
