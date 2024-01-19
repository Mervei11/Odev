</div>
<!--end::Row-->
</div>
<!--end::Content container-->
</div>
<!--end::Content-->
</div>
<!--end::Content wrapper-->

</div>
</div>
<!--end::Wrapper-->
</div>
<!--end::Page-->
</div>
<!--end::App-->
<!--begin::Javascript-->

<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{ asset('assets') }}/plugins/global/plugins.bundle.js"></script>
<script src="{{ asset('assets') }}/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->



<script src="{{ asset('assets') }}/plugins/custom/formrepeater/formrepeater.bundle.js"></script>

<!--end::Vendors Javascript-->

<!--begin::Custom Javascript(used for this page only)-->
<script src="{{ asset('assets') }}/js/custom/apps/ecommerce/catalog/save-product.js"></script>
<script src="{{ asset('assets') }}/js/custom/apps/user-management/users/list/table.js"></script>
<script src="{{ asset('assets') }}/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="{{ asset('assets') }}/js/custom/utilities/modals/create-app.js"></script>
<script src="{{ asset('assets') }}/js/custom/utilities/modals/new-target.js"></script>
<script src="{{ asset('assets') }}/js/custom/utilities/modals/users-search.js"></script>
<script src="{{ asset('assets') }}/plugins/custom/datatables/datatables.bundle.js"></script>



@yield('scripts')
<!--end::Custom Javascript-->
</body>
</html>
