@extends('layouts.app')
@section('admin-title', 'Vardiyalar')
@section('content')

    <!-- Kart Başlangıcı -->
    <div class="card">
        <div class="card-header border-0 pt-6">
            <!-- Arama ve Filtreleme Alanı Başlangıcı -->
            <div class="card-title">
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <input type="text" id="search_input" data-kt-filter="search"
                        class="form-control form-control-solid w-250px ps-13" placeholder="Vardiya ara . . . ">
                </div>
            </div>
            <!-- Arama ve Filtreleme Alanı Bitişi -->

            <!-- Kart Araç Çubuğu Başlangıcı -->
            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                <!-- Çıktı kısmı başlangıç-->
                <button type="button" class="btn btn-light-primary" data-kt-menu-trigger="click"
                    data-kt-menu-placement="bottom-end">
                    <i class="ki-duotone ki-exit-down fs-2"><span class="path1"></span><span class="path2"></span></i>
                    Tablo Dışa Aktar
                </button>

                <!-- Dışa Aktarma Menüsü Başlangıcı -->
                <div id="kt_datatable_example_export_menu"
                    class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4"
                    data-kt-menu="true">
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3" data-kt-export="excel">
                            Excel olarak dışa aktar
                        </a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3" data-kt-export="csv">
                            CSV olarak dışa aktar
                        </a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3" data-kt-export="pdf">
                            PDF olarak dışa aktar
                        </a>
                    </div>
                    <!--end::Menu item-->
                </div>
                <!-- Dışa Aktarma Menüsü Bitişi -->

                <!-- Diğer Araçlar ve İşlemler -->
                <div id="kt_datatable_example_buttons" class="d-none"></div>

                <!-- Tüm Vardiyaları Silme Butonu -->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <form action="{{ route('shift.destroyeAll') }}" style="margin-right:20px" method="GET">
                        <button type="submit" class="btn btn-light-danger ">
                            <i class="ki-duotone ki-trash fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                            </i>Tüm Vardiyaları Sil
                        </button>
                    </form>

                    <!-- Otomatik Vardiya Ekleme Modalı Butonu -->
                    <button type="button" class="btn btn-light-warning" style="margin-right: 20px" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_add_vardiya_otomasyon">
                        <i class="ki-duotone ki-plus fs-2"></i> Otomatik Vardiya Ekle
                    </button>

                    <!-- Vardiya Ekleme Modalı Butonu -->
                    <button type="button" class="btn btn-light-primary" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_add_shift">
                        <i class="ki-duotone ki-plus fs-2"></i> Vardiya Ekle
                    </button>

                    <!-- Modal İçeriği -->
                    @include('models/shift/add')
                    @include('models/shift/vardiya_otomasyon')
                </div>
                <!-- Diğer Araçlar ve İşlemler Bitişi -->
            </div>
            <!-- Kart Araç Çubuğu Bitişi -->

            <!-- Kart İçeriği Başlangıcı -->
            <div class="card-body py-4">
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable_example">
                    <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th>Ad Soyad</th>
                            <th>Sicil No</th>

                            <th>Günler</th>
                            <th>Saatler</th>
                            <th>Lokasyon</th>

                            <th class="text-end min-w-100px">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">
                        <!-- Vardiya Verileri -->
                        @foreach ($shifts as $shift)
                            <tr>
                                <td><span class="text-gray-800 mb-1">{{ $shift->sicil }}</span></td>
                                <td><span class="text-gray-800 mb-1">{{ $shift->employee->ad_soyad }}</span></td>
                                <td><span class="text-gray-800 mb-1">{{ date('d/m/Y', strtotime($shift->gün)) }}</td>
                                <td><span class="text-gray-800 mb-1">{{ $shift->saat }}</td>
                                <td><span class="text-gray-800 mb-1">{{ $shift->bölge }}</td>
                                <td>
                                    <div class="text-end">
                                        <!-- Düzenleme ve Kaldırma Butonları -->
                                        <span class="btn btn-light-warning" data-bs-toggle="modal"
                                            data-bs-target='#kt_modal_edit_shift{{ $shift->id }}'>
                                            <i class="ki-duotone ki-notepad-edit fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Düzenle</span>
                                        <button class="btn btn-light-danger"
                                            onclick="confirmDataRemoval({{ $shift->id }})">
                                            <i class="ki-duotone ki-trash fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                                <span class="path5"></span>
                                            </i>
                                            Kaldır</button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Vardiya Düzenleme Modalı -->
                            @include('models/shift/edit')
                        @endforeach
                        <!-- Vardiya Verileri Bitişi -->
                    </tbody>
                </table>
            </div>
            <!-- Kart İçeriği Bitişi -->
        </div>
        <!-- Kart Bitişi -->
    </div>

    <!-- Script Bölümü Başlangıcı -->
    @section('scripts')
        {{-- Çıktı kısmı başlangıç --}}
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
        <script>
            // Class definition
            var KTDatatablesExample = function() {
                // Shared variables
                var table;
                var datatable;

                // Private functions
                var initDatatable = function() {
                    // Set date data order
                    const tableRows = table.querySelectorAll('tbody tr');

                    tableRows.forEach(row => {
                        const dateRow = row.querySelectorAll('td');
                        const realDate = moment(dateRow[3].innerHTML, "DD MMM YYYY, LT")
                            .format();
                        dateRow[3].setAttribute('data-order', realDate);
                    });

                    datatable = $(table).DataTable({
                        "info": false,
                        'order': [],
                        'pageLength': 10,
                    });
                }

                // Hook export buttons
                var exportButtons = () => {
                    const documentTitle = 'Personel Vardiya Çıktısı';
                    var buttons = new $.fn.dataTable.Buttons(table, {
                        buttons: [{
                                extend: 'excelHtml5',
                                title: documentTitle
                            },
                            {
                                extend: 'csvHtml5',
                                title: documentTitle
                            },
                            {
                                extend: 'pdfHtml5',
                                title: documentTitle
                            }
                        ]
                    }).container().appendTo($('#kt_datatable_example_buttons'));

                    // Hook dropdown menu click event to datatable export buttons
                    const exportButtons = document.querySelectorAll(
                        '#kt_datatable_example_export_menu [data-kt-export]');
                    exportButtons.forEach(exportButton => {
                        exportButton.addEventListener('click', e => {
                            e.preventDefault();

                            // Get clicked export value
                            const exportValue = e.target.getAttribute('data-kt-export');
                            const target = document.querySelector('.dt-buttons .buttons-' +
                                exportValue);

                            // Trigger click event on hidden datatable export buttons
                            target.click();
                        });
                    });
                }

                var handleSearchDatatable = () => {
                    const filterSearch = document.querySelector('[data-kt-filter="search"]');
                    filterSearch.addEventListener('keyup', function(e) {
                        datatable.search(e.target.value).draw();
                    });
                }

                // Public methods
                return {
                    init: function() {
                        table = document.querySelector('#kt_datatable_example');

                        if (!table) {
                            return;
                        }

                        initDatatable();
                        exportButtons();
                        handleSearchDatatable();
                    }
                };
            }();

            // On document ready
            KTUtil.onDOMContentLoaded(function() {
                KTDatatablesExample.init();
            });

            $("#search_input").on("keyup", function() {
                menuDataTable.search(this.value).draw();
            });
        </script>
        {{-- çıktı script bitiş --}}

        <script>
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
                        axios.delete('/shifts/delete/' + id)
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
        </script>

    @endsection
    <!-- Script Bölümü Bitişi -->

@endsection
