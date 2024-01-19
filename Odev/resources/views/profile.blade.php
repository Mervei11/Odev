@extends('layouts.app')
@section('admin-title', 'Anasayfa')
@section('content')




    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Şifre Güncelleme</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->

        <!--begin::Content-->
        <div id="kt_account_settings_profile_details" class="collapse show">
            <!--begin::Form-->
            <form method="post" action="{{ route('password.update') }}"
                class="form fv-plugins-bootstrap5 fv-plugins-framework">
                @csrf
                @method('put')

                <!--begin::Card body-->
                <div class="card-body border-top p-9">




                    <!--begin::Current Password-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label  fw-semibold fs-6">Mevcut Şifre</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="password" name="current_password"
                                class="form-control form-control-lg form-control-solid" autocomplete="current-password">
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Current Password-->



                    <!--begin::New Password-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label  fw-semibold fs-6">Yeni Şifre</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="password" name="password"
                                class="form-control form-control-lg form-control-solid" autocomplete="new-password">
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::New Password-->


                    <!--begin::New Password-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label  q fw-semibold fs-6">Yeni Şifre Tekrar</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="password" name="password_confirmation"
                                class="form-control form-control-lg form-control-solid" autocomplete="new-password">
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::New Password-->


                </div>
                <!--end::Card body-->

                <!--begin::Actions-->
                <div class="justify-content-end py-6 px-9">

                    <button type="submit" class="btn btn-primary">Güncelle</button>
                </div>
                <!--end::Actions-->
                <input type="hidden">
            </form>
            <!--end::Form-->
        </div>
        <!--end::Content-->
    </div>




@endsection
