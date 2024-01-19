<!--begin::Modal - Edit task-->
<div class="modal fade" id="kt_modal_edit_shift{{ $shift->id }}" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_edit_shift_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Vardiya Düzenle</h2>
                <!--end::Modal title-->

                <!--begin::Close-->
                <button type="button" class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </button>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->

            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                {!! Form::model($shift, [
                    'method' => 'patch',
                    'route' => ['shift.update', $shift->id],
                    'id' => 'kt_modal_edit_shift_form',
                    'class' => 'form',
                ]) !!}
                <!--begin::Scroll-->
                <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_edit_shift_scroll"
                    data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                    data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_edit_shift_header"
                    data-kt-scroll-wrappers="#kt_modal_edit_shift_scroll" data-kt-scroll-offset="300px">

                    <!-- Employee Sicil No Input -->
                    <div class="fv-row mb-7">
                        {!! Form::label('employee_sicil_no', 'Personel Sicil No', ['class' => 'required fw-semibold fs-6 mb-2']) !!}
                        {!! Form::text('employee_sicil_no', $shift->employee_sicil_no,[
                            'class' => 'form-control form-control-solid mb-3 mb-lg-0',
                            'placeholder' => 'Personel sicil numarası',
                            'required',
                        ]) !!}
                        @error('employee_sicil_no')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Lokasyon Input -->
                    <div class="fv-row mb-7">
                        {!! Form::label('shift_type', 'Lokasyon', ['class' => 'required fw-semibold fs-6 mb-2']) !!}
                        {!! Form::select(
                            'shift_type',
                            ['kampus_giris' => 'Kampüs Girişi', 'kampus_ici' => 'Kampüs İçi'], $shift->lokasyon,
                            [
                                'class' => 'form-control form-control-solid mb-3 mb-lg-0',
                                'placeholder' => 'Lokasyon seçiniz',
                                'required',
                            ],
                        ) !!}
                        @error('shift_type')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Vardiya Başlangıç Saati Input -->
                    <div class="fv-row mb-7">
                        {!! Form::label('start_time', 'Vardiya Başlangıç Saati', [
                            'class' => 'required fw-semibold fs-6 mb-2',
                        ]) !!}
                        {!! Form::select(
                            'start_time',
                            ['00:00' => '00:00', '08:00' => '08:00', '09:00' => '09:00', '16:00' => '16:00'],$shift->baslangic_saati,
                            [
                                'class' => 'form-control form-control-solid mb-3 mb-lg-0',
                                'placeholder' => 'Başlangıç Saati Seçiniz',
                                'required',
                            ],
                        ) !!}
                        @error('start_time')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Vardiya Bitiş Saati Input -->
                    <div class="fv-row mb-7">
                        {!! Form::label('end_time', 'Vardiya Bitiş Saati', ['class' => 'required fw-semibold fs-6 mb-2']) !!}
                        {!! Form::select(
                            'end_time',
                            ['08:00' => '08:00', '16:00' => '16:00', '17:00' => '17:00', '24:00' => '24:00'],$shift->bitis_saati,
                            [
                                'class' => 'form-control form-control-solid mb-3 mb-lg-0',
                                'placeholder' => 'Bitiş Saati Seçiniz',
                                'required',
                            ],
                        ) !!}
                        @error('end_time')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <!--end::Scroll-->

                <!--begin::Actions-->
                <div class="text-center pt-15">
                    <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">
                        İptal
                    </button>

                    {!! Form::submit('Güncelle', ['class' => 'btn btn-primary']) !!}
                </div>
                <!--end::Actions-->
                {!! Form::close() !!}

                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Edit task-->
