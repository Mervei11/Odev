<!--begin::Modal - Edit task-->
<div class="modal fade" id="kt_modal_edit_off_day{{ $off_day->id }}" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_edit_department_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">İzin Düzenle</h2>
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
                {!! Form::model($off_day, [
                    'method' => 'patch',
                    'route' => ['off_days.update', $off_day->id],
                    'id' => 'kt_modal_edit_department_form',
                    'class' => 'form',
                ]) !!}
                <!--begin::Scroll-->
                <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_edit_department_scroll"
                    data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                    data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_edit_department_header"
                    data-kt-scroll-wrappers="#kt_modal_edit_department_scroll" data-kt-scroll-offset="300px">




                   <!-- Employee Selection -->
                   <div class="fv-row mb-7">
                    {!! Form::label('personel_sicil_no', 'Select Employee', ['class' => 'fw-semibold fs-6 mb-2']) !!}
                    {!! Form::select('personel_sicil_no', $employeeSicilNolar, $off_day->personel_sicil_no, [
                        'class' => 'form-control form-control-solid mb-3 mb-lg-0',
                        'required',
                    ]) !!}
                    @error('personel_sicil_no')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                    <!-- Izin Tarihi Input -->
                    <div class="fv-row mb-7">
                        {!! Form::label('izin_tarihi', 'Izin Tarihi', ['class' => 'fw-semibold fs-6 mb-2']) !!}
                        {!! Form::date('izin_tarihi', old('izin_tarihi'), [
                            'class' => 'form-control form-control-solid mb-3 mb-lg-0',
                            'placeholder' => 'Permission Date',
                            'required',
                        ]) !!}
                        @error('izin_tarihi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <!-- Izin Turu Input -->
                    <div class="fv-row mb-7">
                        {!! Form::label('izin_türü', 'Izin Turu', ['class' => 'fw-semibold fs-6 mb-2']) !!}
                        {!! Form::text('izin_türü', old('izin_türü'), [
                            'class' => 'form-control form-control-solid mb-3 mb-lg-0',
                            'placeholder' => 'Permission Type',
                            'required',
                        ]) !!}
                        @error('izin_türü')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Aciklama Input -->
                    <div class="fv-row mb-7">
                        {!! Form::label('aciklama', 'Aciklama', ['class' => 'fw-semibold fs-6 mb-2']) !!}
                        {!! Form::text('aciklama', $off_day->izin_aciklama, [
                            'class' => 'form-control form-control-solid mb-3 mb-lg-0',
                            'placeholder' => 'Description',
                            'required',
                        ]) !!}
                        @error('aciklama')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>




                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">
                            İptal
                        </button>

                        {{ Form::button('Güncelle', ['class' => 'btn btn-primary', 'type' => 'submit']) }}
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
