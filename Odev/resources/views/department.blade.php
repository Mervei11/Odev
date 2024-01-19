@extends('layouts.app')
@section('admin-title', 'Department')
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
                        class="form-control form-control-solid w-250px ps-13" placeholder="Departman ara . . . ">
                </div>
            </div>
            <div class="card-toolbar">
                
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_add_department">
                        <i class="ki-duotone ki-plus fs-2"></i> Departman Ekle
                    </button>
                </div>
                @include('models/department/add')
            </div>
        </div>
        <div class="card-body py-4">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="menu_table">
                <thead>
                    <tr class="text-start text-gray-700 fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-10px">
                            Sıra
                        </th>
                        <th class="text-end min-w-100px">
                            Kadro Kısaltması
                        </th>
                        <th class="text-end min-w-70px">
                            Kadro
                        </th>
                        <th class="text-end min-w-100px">
                            Görev Ünvanı
                        </th>

                        <th class="text-end min-w-70px">
                            İşlemler
                        </th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold">
                    @foreach ($departments as $department)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">

                                    <!--begin::Title-->
                                    <a href="edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold"
                                        data-kt-ecommerce-product-filter="product_name">{{ $department->id }}</a>
                                    <!--end::Title-->
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="rating-3">
                                {{ $department->kadro_adi_kisaltma }}
                            </td>
                            <td class="text-end pe-0" data-order="rating-3">
                                {{ $department->kadro_adi }}
                            </td>
                            <td class="text-end pe-0" data-order="rating-3">
                                {{ $department->görev_unvani }}
                            </td>

                            <td>
                                <div class="text-end">
                                    <span class="btn btn-light-warning" data-bs-toggle="modal"
                                        data-bs-target='#kt_modal_edit_department{{ $department->id }}'>
                                        <i
                                            class="ki-duotone ki-notepad-edit fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        Düzenle
                                    </span>

                                    <button class="btn btn-light-danger"
                                        onclick="confirmDataRemoval({{ $department->id }})">
                                        <i class="ki-duotone ki-trash fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                            <span class="path5"></span>
                                        </i>
                                        Kaldır
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @include('models/department/edit')
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
            var department_id = checkbox.value;
            $.ajax({
                url: '{{ route('department.updateStatus') }}',
                type: 'POST',
                data: {
                    durum: durum,
                    department_id: department_id,
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
                    axios.delete('/departments/delete/' + id)
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
