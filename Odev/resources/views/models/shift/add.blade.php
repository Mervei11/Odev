<!--begin::Modal - Add task-->
<div class="modal fade" id="kt_modal_add_shift" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_shift_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Vardiya Ekle</h2>
                <!--end::Modal title-->

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->

            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                {!! Form::open([
                    'route' => 'shift.create',
                    'id' => 'kt_modal_add_shift_form',
                    'class' => 'form',
                    'method' => 'POST',
                ]) !!}
                <!--begin::Scroll-->
                <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_shift_scroll" data-kt-scroll="true"
                    data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                    data-kt-scroll-dependencies="#kt_modal_add_shift_header"
                    data-kt-scroll-wrappers="#kt_modal_add_shift_scroll" data-kt-scroll-offset="300px">
                    <!-- Kadro Input -->

                    <!-- Personel Seçme select -->
                    <!-- shift.blade.php -->

                    <div class="fv-row mb-7">
                        {!! Form::label('employee_sicil_no', 'Personel', ['class' => 'form-label']) !!}
                        {!! Form::select('employee_sicil_no', $employees->pluck('ad_soyad', 'sicil_no'), old('employee_sicil_no'), [
                            'class' => 'form-select form-select-solid',
                            'data-control' => 'select2',
                            'placeholder' => 'Personel Seçiniz',
                            'data-hide-search' => 'true',
                            'required',
                        ]) !!}

                        @error('employee_sicil_no')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <!-- Lokasyon Input -->
                    <div class="fv-row mb-7">
                        {!! Form::label('bölge', 'Lokasyon', ['class' => 'fw-semibold fs-6 mb-2']) !!}
                        {!! Form::select('bölge', ['Kampus Disi' => 'Kampüs Girişi', 'Kampus İci' => 'Kampüs İçi'], old('bölge'), [
                            'class' => 'form-control form-control-solid mb-3 mb-lg-0',
                            'placeholder' => 'Lokasyon seçiniz',
                            'required',
                        ]) !!}
                        @error('bölge')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <!-- Vardiya Saatleri Input -->
                    <div class="fv-row mb-7">
                        {!! Form::label('saat', 'Vardiya Saatleri', [
                            'class' => 'fw-semibold fs-6 mb-2',
                        ]) !!}
                        {!! Form::select(
                            'saat',
                            [
                                '00:00-08:00' => '00:00-08:00',
                                '08:00-16:00' => '08:00-16:00',
                                '09:00-17:00' => '09:00-17:00',
                                '16:00-24:00' => '16:00-24:00',
                            ],
                            old('saat'),
                            [
                                'class' => 'form-control form-control-solid mb-3 mb-lg-0',
                                'required',
                            ],
                        ) !!}
                        @error('saat')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Vardiya Tarihi Input -->
                    <div class="fv-row mb-7">
                        {!! Form::label('gün', 'Gün', ['class' => 'fw-semibold fs-6 mb-2']) !!}
                        {!! Form::date('gün', old('gün'), [
                            'class' => 'form-control form-control-solid mb-3 mb-lg-0',
                            'required',
                        ]) !!}
                        @error('start_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                </div>
                <!--end::Scroll-->



                <!--end::Form-->
            </div>
            <!--end::Modal body-->
            <!--begin::Actions-->
            <div class="modal-footer">
                <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">
                    İptal
                </button>
                <button type="submit" class="btn btn-primary">
                    Gönder
                </button>
            </div>

            <!--end::Actions-->
            {!! Form::close() !!}
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Add task-->
