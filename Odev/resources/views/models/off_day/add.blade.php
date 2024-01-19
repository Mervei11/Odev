<!--begin::Modal - Add off day-->
<div class="modal fade" id="kt_modal_add_off_day" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_shift_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Add Off Day</h2>
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
                    'route' => 'off_days.create', // Assuming you have a route named 'off-day.create'
                    'id' => 'kt_modal_add_off_day_form',
                    'class' => 'form',
                    'method' => 'POST',
                ]) !!}
                <!--begin::Scroll-->
                <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_shift_scroll" data-kt-scroll="true"
                    data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                    data-kt-scroll-dependencies="#kt_modal_add_shift_header"
                    data-kt-scroll-wrappers="#kt_modal_add_shift_scroll" data-kt-scroll-offset="300px">

                    <!-- Employee Selection -->
                    <div class="fv-row mb-7">
                        {!! Form::label('personel_sicil_no', 'Select Employee', ['class' => 'fw-semibold fs-6 mb-2']) !!}
                        <select name="personel_sicil_no" class="form-control form-control-solid mb-3 mb-lg-0" required>
                            <option value="" disabled selected>Select Employee</option>
                            @foreach ($employeeSicilNolar as $sicilNo => $adSoyad)
                                <option value="{{ $sicilNo }}">{{ $sicilNo }} - {{ $adSoyad }}</option>
                            @endforeach
                        </select>
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
                        {!! Form::text('aciklama', old('aciklama'), [
                            'class' => 'form-control form-control-solid mb-3 mb-lg-0',
                            'placeholder' => 'Description',
                            'required',
                        ]) !!}
                        @error('aciklama')
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
                    Cancel
                </button>
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </div>

            <!--end::Actions-->
            {!! Form::close() !!}
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Add off day-->
