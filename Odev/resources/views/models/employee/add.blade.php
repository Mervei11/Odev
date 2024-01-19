<!--begin::Modal - Add task-->
<div class="modal fade" id="kt_modal_add_employee" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_employee_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">
                    <i class="ki-solid ki-user fs-2">

                    </i>
                    Personel Ekle
                </h2>
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
                    'route' => 'employee.create',
                    'id' => 'kt_modal_add_employee_form',
                    'class' => 'form',
                    'method' => 'POST',
                ]) !!}
                <!--begin::Scroll-->
                <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_employee_scroll"
                    data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                    data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_employee_header"
                    data-kt-scroll-wrappers="#kt_modal_add_employee_scroll" data-kt-scroll-offset="300px">

                    <div class="fv-row mb-7">
                        {!! Form::label('yetki', 'Yetki Türü', ['class' => 'form-label']) !!}
                        {!! Form::select(
                            'yetki',
                            [
                                'Admin' => 'Admin',
                                'Personel' => 'Personel',
                            ],
                            old('yetki'),
                            [
                                'class' => 'form-select form-select-solid',
                                'data-control' => 'select2',
                                'placeholder' => 'Yetki türü seçiniz',
                                'data-hide-search' => 'true',
                            ],
                        ) !!}

                        @error('yetki')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="fv-row mb-7">
                        {!! Form::label('departman_adi', 'Departman', ['class' => 'form-label']) !!}
                        {!! Form::select('departman_adi', $departments->pluck('kadro_adi_kisaltma', 'id'), old('departman_adi'), [
                            'class' => 'form-select form-select-solid',
                            'data-control' => 'select2',
                            'placeholder' => 'Departman Seçiniz',
                            'data-hide-search' => 'true',
                            'required',
                        ]) !!}

                        @error('departman_adi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="fv-row mb-7">
                        {!! Form::label('izin_gün_1', 'İzin Gün 1', ['class' => 'form-label']) !!}
                        {!! Form::select(
                            'izin_gün_1',
                            [
                                'Pazartesi' => 'Pazartesi',
                                'Salı' => 'Salı',
                                'Çarşamba' => 'Çarşamba',
                                'Perşembe' => 'Perşembe',
                                'Cuma' => 'Cuma',
                                'Cumartesi' => 'Cumartesi',
                                'Pazar' => 'Pazar',
                            ],
                            old('izin_gün_1'),
                            [
                                'class' => 'form-select form-select-solid',
                                'data-control' => 'select2',
                                'placeholder' => 'Gün Seçiniz',
                                'data-hide-search' => 'true',
                                'required',
                            ],
                        ) !!}

                        @error('izin_gün_1')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="fv-row mb-7">
                        {!! Form::label('izin_gün_2', 'İzin Gün 2', ['class' => 'form-label']) !!}
                        {!! Form::select(
                            'izin_gün_2',
                            [
                                'Pazartesi' => 'Pazartesi',
                                'Salı' => 'Salı',
                                'Çarşamba' => 'Çarşamba',
                                'Perşembe' => 'Perşembe',
                                'Cuma' => 'Cuma',
                                'Cumartesi' => 'Cumartesi',
                                'Pazar' => 'Pazar',
                            ],
                            old('izin_gün_2'),
                            [
                                'class' => 'form-select form-select-solid',
                                'data-control' => 'select2',
                                'placeholder' => 'Gün Seçiniz',
                                'data-hide-search' => 'true',
                            ],
                        ) !!}

                        @error('izin_gün_2')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <!-- Tc Kimlik No Input -->
                    <div class="fv-row mb-7">
                        {!! Form::label('kimlik_no', 'Tc Kimlik No', ['class' => 'fw-semibold fs-6 mb-2']) !!}
                        {!! Form::text('kimlik_no', old('kimlik_no'), [
                            'class' => 'form-control form-control-solid mb-3 mb-lg-0',
                            'placeholder' => 'Kimlik No',
                            'required',
                        ]) !!}
                        @error('kimlik_no')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Adres Input -->
                    <div class="fv-row mb-7">
                        {!! Form::label('adres', 'Adres', ['class' => 'fw-semibold fs-6 mb-2']) !!}
                        {!! Form::text('adres', old('adres'), [
                            'class' => 'form-control form-control-solid mb-3 mb-lg-0',
                            'placeholder' => 'Adres',
                            'required',
                        ]) !!}
                        @error('adres')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Telefon Input -->
                    <div class="fv-row mb-7">
                        {!! Form::label('phone', 'Telefon', ['class' => 'fw-semibold fs-6 mb-2']) !!}
                        {!! Form::text('phone', old('phone'), [
                            'class' => 'form-control form-control-solid mb-3 mb-lg-0',
                            'placeholder' => 'Telefon',
                            'required',
                        ]) !!}
                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Kullanıcı Adı Input -->
                    <div class="fv-row mb-7">
                        {!! Form::label('name', 'Kullanıcı Adı', ['class' => 'fw-semibold fs-6 mb-2']) !!}
                        {!! Form::text('name', old('name'), [
                            'class' => 'form-control form-control-solid mb-3 mb-lg-0',
                            'placeholder' => 'Kullanıcı Adı',
                            'required',
                        ]) !!}
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email Input -->
                    <div class="fv-row mb-7">
                        {!! Form::label('email', 'E-posta', ['class' => 'fw-semibold fs-6 mb-2']) !!}
                        {!! Form::text('email', old('email'), [
                            'class' => 'form-control form-control-solid mb-3 mb-lg-0',
                            'placeholder' => 'Email',
                            'required',
                        ]) !!}
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Şifre Input -->
                    <div class="fv-row mb-7">
                        {!! Form::label('password', 'Şifre', ['class' => 'fw-semibold fs-6 mb-2']) !!}
                        {!! Form::password('password', [
                            'class' => 'form-control form-control-solid mb-3 mb-lg-0',
                            'placeholder' => 'Şifre',
                            'required',
                        ]) !!}
                        @error('password')
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
