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


<!--jquery library js-->
@include('frontend.layouts.scripts')

</body>

</html>
