<!--begin::Modal - Add task-->
<div class="modal fade" id="kt_modal_add_vardiya_otomasyon" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_kt_modal_add_vardiya_otomasyon_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Otomatik Vardiya Oluştur</h2>
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
                    'route' => 'shift.otomatik_vardiya',
                    'id' => 'kt_modal_add_vardiya_otomasyon_form',
                    'class' => 'form',
                    'method' => 'POST',
                ]) !!}
                <!--begin::Scroll-->
                <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_vardiya_otomasyon_scroll"
                    data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                    data-kt-scroll-max-height="auto"
                    data-kt-scroll-dependencies="#kt_modal_add_vardiya_otomasyon_header"
                    data-kt-scroll-wrappers="#kt_modal_add_vardiya_otomasyon_scroll" data-kt-scroll-offset="300px">

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

                    <!-- Personel sayısı  Input -->
                    <div class="fv-row mb-7">
                        {!! Form::label('personel_count', 'Personel Sayısı', ['class' => 'fw-semibold fs-6 mb-2']) !!}
                        {!! Form::text('personel_count', old('personel_count'), [
                            'class' => 'form-control form-control-solid mb-3 mb-lg-0',
                            'placeholder' => 'Personel sayısı giriniz',
                            'required',
                        ]) !!}
                        @error('personel_count')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Başlangıç Tarihi Input -->
                    <div class="fv-row mb-7">
                        {!! Form::label('start_date', 'Başlangıç Tarihi', ['class' => 'fw-semibold fs-6 mb-2']) !!}
                        {!! Form::date('start_date', old('start_date'), [
                            'class' => 'form-control form-control-solid mb-3 mb-lg-0',
                            'placeholder' => 'Başlangıç Tarihi',
                            'required',
                        ]) !!}
                        @error('start_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Bitiş Tarihi Input -->
                    <div class="fv-row mb-7">
                        {!! Form::label('end_date', 'Bitiş Tarihi', ['class' => 'fw-semibold fs-6 mb-2']) !!}
                        {!! Form::date('end_date', old('end_date'), [
                            'class' => 'form-control form-control-solid mb-3 mb-lg-0',
                            'placeholder' => 'Bitiş Tarihi',
                            'required',
                        ]) !!}
                        @error('end_date')
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
