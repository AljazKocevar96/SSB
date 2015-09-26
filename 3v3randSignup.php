<?php
include_once "header.php";

if(!isset($_SESSION['user_id'])&& empty($_SESSION['user_id'])){
    $rdrStr=explode('/',$_SERVER['REQUEST_URI']);
    $_SESSION['rdrString']= $rdrStr[2];
}
if(!empty($_SESSION['user_id']) && isset($_SESSION['user_id'])){

    unset($_SESSION['rdrString']);
}

?>
<script>
    $(document).ready(function(){
        window.redirection='<?php echo $_SESSION['rdrString'];?>';

    });
</script>

<!-- Start Outter Wrapper -->
<div id="introduction">
<div class="outter-wrapper body-wrapper">
    <div class="wrapper ad-pad clearfix">

        <div class="main-content ">

            <h1>Ime dogodka</h1>

            <div class="clearfix evt-single-date">
                <h6 class="left">Datum dogodka</h6>
                <div class="evt-price right">Štartnina: #€</div>
            </div>

            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d28369.415587766056!2d152.98820641500242!3d-27.276331333808365!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b93fb9c9442c901%3A0x10b5aa2f23d9e4e1!2sAshford+Circuit%2C+Petrie+QLD+4502!5e0!3m2!1sen!2sau!4v1406620130126" width="600" height="250" frameborder="0" style="border:0"></iframe>


            <div class="boxy boxy-pad col-1-3">
                <h5>Details</h5>
                <ul class="widget-list list-2">
                    <li><strong>Začetek:</strong><small>Začetek</small></li>
                    <li><strong>Konec:</strong> <small>Konec</small></li>
                    <li><strong>Kraj dogajanja:</strong> <small>Kraj</small> </li>
                    <li><strong>Kontakt:</strong> <small>Kontaktna številka</small> </li>
                    <li><strong>Spletni naslov:</strong> <small>www.sbs.com</small></li>
                </ul>
            </div>

            <h3>Prijava in pravila </h3>
            <p>Tukaj potekajo prijave na 3v3 turnir, kjer se ekipe določajo z žrebom, ki se odločil na dan turnirja. Prijavite se lahko do [datuma]. Some text...</p>

            <p>Pravila igre...</p>




            <ul class="inline-list clearfix evt-paging">
                <li class="right"><span id="btn" class="btn-3 small-btn">Nadaljuj na prijavo <em class="fa fa-angle-right"></em></span></li>
            </ul>

            <!-- Finish Main Content -->
        </div>


    </div>
</div>
</div>

<script>
    $(document).ready(function(){
        $("#btn").click(function(){

            if(typeof redirection === 'undefined') {

                $("#introduction").addClass('animated bounceOutLeft');
                setTimeout(function () {
                    $("#introduction").hide();
                }, 1000);
            }
            else{
                window.location.href= "sign_in.php";
            }
    });
    });
</script>

<?php
include_once "footer.php";
?>
