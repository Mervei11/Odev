<!--begin::Modal - Add task-->
<div class="modal fade" id="kt_modal_add_department" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_department_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Departman Ekle</h2>
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
                    'route' => 'department.create',
                    'id' => 'kt_modal_add_department_form',
                    'class' => 'form',
                    'method' => 'POST',
                ]) !!}
                <!--begin::Scroll-->
                <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_department_scroll"
                    data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                    data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_department_header"
                    data-kt-scroll-wrappers="#kt_modal_add_department_scroll" data-kt-scroll-offset="300px">
                    <!-- Kadro Input -->



                    <!-- Gorev Unvani Input -->
                    <div class="fv-row mb-7">
                        {!! Form::label('kadro_adi_kisaltma', 'Kadro Kısaltması', ['class' => 'fw-semibold fs-6 mb-2']) !!}
                        {!! Form::text('kadro_adi_kisaltma', old('kadro_adi_kisaltma'), [
                            'class' => 'form-control form-control-solid mb-3 mb-lg-0',
                            'placeholder' => 'Kadro adı kısaltması',
                            'required',
                        ]) !!}
                        @error('kadro_adi_kisaltma')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Gorev Unvani Input -->
                    <div class="fv-row mb-7">
                        {!! Form::label('kadro_adi', 'Kadro Adı', ['class' => 'fw-semibold fs-6 mb-2']) !!}
                        {!! Form::text('kadro_adi', old('kadro_adi'), [
                            'class' => 'form-control form-control-solid mb-3 mb-lg-0',
                            'placeholder' => 'Kadro Adı',
                            'required',
                        ]) !!}
                        @error('kadro_adi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Gorev Unvani Input -->
                    <div class="fv-row mb-7">
                        {!! Form::label('görev_unvani', 'Görev Ünvanı', ['class' => 'fw-semibold fs-6 mb-2']) !!}
                        {!! Form::text('görev_unvani', old('görev_unvani'), [
                            'class' => 'form-control form-control-solid mb-3 mb-lg-0',
                            'placeholder' => 'Görev ünvanı',
                            'required',
                        ]) !!}
                        @error('görev_unvani')
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
