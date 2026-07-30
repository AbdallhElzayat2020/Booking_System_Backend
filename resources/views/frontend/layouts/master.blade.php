<!DOCTYPE html>
<html lang="en">

@include('frontend.layouts.head')

<body>

@include('frontend.layouts.navbar')


@yield('content')

<!--==========================
    FOOTER PART START
===========================-->
@include('frontend.layouts.footer')
<!--==========================
    FOOTER PART END
===========================-->


<!--=============SCROLL BTN==============-->
<div class="scroll_btn">
    <i class="fas fa-chevron-up"></i>
</div>
<!--=============SCROLL BTN==============-->


<section id="wsus__map_popup">
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close popup_close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="far fa-times"></i></button>
                <div class="modal-body modal-listing-content">



                </div>
            </div>
        </div>
    </div>
</section>


<!--jquery library js-->
@include('frontend.layouts.scripts')

</body>

</html>
