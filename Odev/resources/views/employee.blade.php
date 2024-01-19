@extends('layouts.app')
@section('admin-title', 'Personeller')
@section('content')


    <div class="card">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <input type="text" id="search_input" data-kt-user-table-filter="search"
                        class="form-control form-control-solid w-250px ps-13" placeholder="Personel ara . . . ">
                </div>
            </div>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_add_employee">
                        <i class="ki-duotone ki-plus fs-2"></i> Personel Ekle
                    </button>
                </div>
                @include('models/employee/add')
            </div>
        </div>
        <div class="card-body pt-0">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="menu_table">
                <thead>
                    <tr class="text-start text-gray-700 fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-50px">
                            Sicil No
                        </th>
                        <th class="text-end min-w-100px">
                            Kadro Adı
                        </th>
                        <th class="text-end min-w-70px">
                            Ad Soyad
                        </th>
                        <th class="text-end min-w-100px">
                            Tc No
                        </th>
                        <th class="text-end min-w-100px">
                            Telefon
                        </th>
                        <th class="text-end min-w-100px">
                            Mail
                        </th>

                        <th class="text-end min-w-100px">
                            İzin Günleri
                        </th>
                        <th class="text-end min-w-100px">
                            Oluşturma Tarihi
                        </th>
                        <th class="text-end min-w-70px">
                            İşlemler
                        </th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold">
                    @foreach ($employees as $employee)
                        <tr>

                            <td>
                                <div class="d-flex align-items-center">

                                    <!--begin::Title-->
                                    <a href="edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold"
                                        data-kt-ecommerce-product-filter="product_name">{{ $employee->sicil_no }}</a>
                                    <!--end::Title-->
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">{{ $employee->department->kadro_adi_kisaltma }}</span>
                            </td>
                            <td class="text-end pe-0" data-order="19">
                                <span class="fw-bold ms-3">{{ $employee->ad_soyad }}</span>
                            </td>
                            <td class="text-end pe-0">
                                {{ $employee->kimlik_no }}
                            </td>
                            <td class="text-end pe-0" data-order="rating-3">
                                {{ $employee->telefon }}
                            </td>
                            <td class="text-end pe-0" data-order="rating-3">
                                {{ $employee->email }}
                            </td>
                            <td class="text-end pe-0" data-order="rating-3">
                                {{ $employee->izin_gün_1 }}, {{ $employee->izin_gün_2}}
                            </td>
                            <td class="text-end pe-0" data-order="rating-3">
                                {{ date('d/m/Y ', strtotime($employee->created_at)) }}
                            </td>
                            <td class="text-end">
                                <a href="{{ route('employee.show', $employee->sicil_no) }}" class="btn btn-light-primary">
                                    <i class="ki-duotone ki-eye fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                    Göster
                                </a>
                                <span class="btn btn-light-warning" data-bs-toggle="modal"
                                    data-bs-target='#kt_modal_edit_employee{{ $employee->id }}'>
                                    <i class="ki-duotone ki-notepad-edit fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    Düzenle
                                </span>
                                <button class="btn btn-light-danger" onclick="confirmDataRemoval({{ $employee->id }})">
                                    <i class="ki-duotone ki-trash fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                    </i>
                                    Kaldır
                                </button>
                            </td>
                        </tr>
                        @include('models/employee/edit')
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
                url: '{{ route('employee.updateStatus') }}',
                type: 'POST',
                data: {
                    durum: durum,
                    employee_id: employee_id,
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
                    axios.delete('/employees/delete/' + id)
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
