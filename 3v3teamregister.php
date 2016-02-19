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
<script xmlns="http://www.w3.org/1999/html">
    $(document).ready(function(){
        window.redirection='<?php echo $_SESSION['rdrString'];?>';

    });
</script>

<style>
    #prijava{
        display: none;
    }
    #form3v3team{
        
        margin: 2% 0 0 2%;
        position: relative;
        width: 30em;
    }
    #soglasje{
        margin-top: 0.5em;
        margin-left: 0.5em;
    }
    .disabled{
        cursor: not-allowed!important;
        background-color: #bfbfbf!important;
    }
    #btn:hover{
        cursor: pointer;
    }
    #notificationCenterTY{
        margin: 5% auto -2% auto;
        position: relative;
        width: 30em;
        display: none;
    }

    #notificationCenterErr{
        margin: 5% auto -2% auto;
        position: relative;
        width: 30em;
        display: none;
    }
    #notificationCenterInfo{
        margin: 5% auto -2% auto;
        position: relative;
        width: 30em;
        display: none;
    }
    fieldset{
        width:70%;

    }



    #igralec1{
        float: left;
        margin-left: 90%;
        margin-top: -40%;
        position: absolute;

    }
    #registrationHeader{
        margin-left: 2%;
    }
</style>

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
<div id="prijava">

    <div id="registrationHeader">
    <h1>Prijava ekipe</h1>

    <div class="clearfix evt-single-date">
        <h6 class="left">Vodja in igralci</h6>
    </div>
    </div>

    <div id="form3v3team">
        <div id="notificationCenterTY" class="message success"><i class="fa fa-check"></i>&nbsp; Hvala ! </div>
        <div id="notificationCenterErr" class="message notice"><i class="fa fa-exclamation-triangle"></i>&nbsp; Ups. Težave imamo s povezavo !  </div>
        <div id="notificationCenterInfo" class="message info"><i class="fa fa-info"></i>&nbsp; Na ta dogodek ste se že registrirali.  </div>
        <div id="hideOnLogIn">
            <form method="post" action="loginCheck.php" >
               <div class="col-1-1"> <fieldset id="vodja"><legend>Vodja ekipe</legend>

                    <div class="space" style="margin-top: 1em;">
                        <input id="registername" type="text" name="ime" value="<?php echo $_SESSION['user_name'];?>" placeholder="<?php echo $_SESSION['user_name'];?>"/>
                        <input id="registersurename" type="text" name="priimek" value="<?php echo $_SESSION['user_surename'];?>" placeholder="<?php echo $_SESSION['user_surename'];?>"/>

                    </div>

                </fieldset>

                <fieldset id="igralec1"><legend>Igralec 1</legend>

                    <div class="space" style="margin-top: 1em;">
                        <input id="registername" type="text" name="ime"  placeholder="Ime"/>
                        <input id="registersurename" type="text" name="priimek"  placeholder="Priimek"/>

                    </div>

                </fieldset>
                   </div>
                <input id="btnSubmit" name="button" class="disabled" type="button" value="Prijavi" /> &nbsp; <!--<small style="color: #ff9f23; ">Registracija je brezplačna</small>-->
            </form>
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
                    $("#prijava").show();
                }, 1000);
            }
            else{
                window.location.href= "sign_in.php";
            }
        });
        setInterval(function(){
            if($("input[name='soglasjeCheck']:checked").length>0){
                $("#btnSubmit").removeClass('disabled');
            }
            else{ $("#btnSubmit").addClass('disabled');}
        },1);

        $("#btnSubmit").click(function(){
            var ime= $("#registername").val();
            var priimek= $("#registersurename").val();

            $.ajax({
                type:"POST",
                url:"register3v3rand.php",
                data:{ime:ime,priimek:priimek},
                success:function(data){

                    if(data=="RegisteredAlready"){

                        $("#notificationCenterInfo").show();
                        setTimeout(function(){
                            $("#notificationCenterInfo").addClass('animated bounceOutLeft');
                        },2000);

                    }
                    else {
                        if (data === "Success") {

                            $("#notificationCenterTY").show();
                            setTimeout(function () {
                                $("#notificationCenterTY").addClass('animated bounceOutLeft');
                                window.location.href = "3v3randSignup.php";
                            }, 2000);

                        }
                        else {
                            $("#notificationCenterErr").show();
                            setTimeout(function () {
                                $("#notificationCenterErr").addClass('animated bounceOutLeft');
                            }, 2000);

                        }
                    }
                }
            }) ;

        });
    });


</script>

<?php
include_once "footer.php";
?>
