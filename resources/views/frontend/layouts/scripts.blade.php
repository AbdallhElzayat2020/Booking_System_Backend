<script src="{{asset('assets/client/js/jquery-3.6.0.min.js')}}"></script>
<!--bootstrap js-->
<script src="{{asset('assets/client/js/bootstrap.bundle.min.js')}}"></script>
<!--font-awesome js-->
<script src="{{asset('assets/client/js/Font-Awesome.js')}}"></script>
<!--slick js-->
<script src="{{asset('assets/client/js/slick.min.js')}}"></script>
<!--venobox js-->
<script src="{{asset('assets/client/js/venobox.min.js')}}"></script>
<!--counter js-->
<script src="{{asset('assets/client/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets/client/js/jquery.countup.min.js')}}"></script>
<!--nice select js-->
<script src="{{asset('assets/client/js/select2.min.js')}}"></script>
<!--isotope js-->
<script src="{{asset('assets/client/js/isotope.pkgd.min.js')}}"></script>
<!--summer_note js-->
<script src="{{asset('assets/client/js/summernote.min.js')}}"></script>
<!--select js-->
<script src="{{asset('assets/client/js/jquery.nice-select.min.js')}}"></script>

<!--main/custom js-->
<script src="{{asset('assets/client/js/main.js')}}"></script>
@stack('js')

{{--DataTables --}}
<script src="//cdn.datatables.net/2.3.8/js/dataTables.min.js"></script>

{{--select2 cdn--}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>

{{--summernote cdn --}}
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>


<script>
    // Select2
    if (jQuery().select2) {
        $(".select2").select2();
    }

    // summernote
    $(document).ready(function () {
        $('#summernote').summernote();
    });

</script>
