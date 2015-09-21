<?php
include_once "header.php";
include_once "core/functions.php";
include_once "core/connect.php";

if(!empty($_SESSION['user_id'])){

    header("Location: index.php");
}
?>
    <style>
        .forma-registracije{

            margin: 6% auto 6% auto;
            position: relative;
            width: 30em;
        }
        .error{

            float: right;
            margin-right: 10px;
            margin-top: -46px;
            position: relative;
            z-index: 2;
            color: #d62911;
            display: none;
        }
        .success{
            float: right;
            margin-right: 10px;
            margin-top: -46px;
            position: relative;
            z-index: 2;
            color: #219917;
            display: none;
        }
        .tooltip{
            float: right;
            margin-right: -16em;
            margin-top: -3.5em;
            position: relative;
            z-index: 2;
            display: none;
        }
        .addBorderSucc {
            border: 2px solid;
            border-color: #219917!important;
            background-color: #DDFFDC!important;
        }
        .addBorderErr{
            border: 2px solid;
            border-color: #890000!important;
            background-color: #FBCDCD!important;

        }
        .bubble
        {
            position: relative;
            width: 15em;
            height: 2em;
            padding: 0;
            background: #890000;
            -webkit-border-radius: 0px;
            -moz-border-radius: 0px;
            border-radius: 0px;
        }
        .bubble p{
            position: absolute;
            color: white;
            margin-left: 9%;
            margin-top: 2%;
            font-family: robotomedium;
        }
        .pointer{
            position: absolute;
            border-style: solid;
            border-width: 8px 11px 8px 0;
            border-color: transparent#890000;
            display: block;
            width: 0;
            z-index: 1;
            left: -11px;
            top: 0.5em;
        }
    </style>
<script>

    function emailChecking(email){

        var regx = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return regx.test(email);

    }

$(document).ready(function(){

   $("#passCheck").keyup(function(){

      if($("#pass").val() == $("#passCheck").val()){
          $("#passCErr").hide();
          $("#passCheck").removeClass("addBorderErr");
          $("#passCSucc").show();
          $("#pass").addClass("addBorderSucc");
          $("#passCheck").addClass("addBorderSucc");
      }
       else{
          $("#passCSucc").hide();
          $("#passCErr").show();
          $("#pass").addClass("addBorderSucc");
          $("#passCheck").addClass("addBorderErr");
      }
       if($("#passCheck").val()=== ""){
           $("#passCErr").hide();
           $("#passCSucc").hide();
           $("#pass").removeClass("addBorderSucc");
           $("#passCheck").removeClass("addBorderErr");
       }
       if($("#pass").val()=== ""){
           $("#passCErr").hide();
           $("#passCSucc").hide();
           $("#pass").removeClass("addBorderSucc");
           $("#passCheck").removeClass("addBorderErr");
       }

   });
});

    function AvalibleMail(){
        var mail= document.getElementById('formMail').value;

        if (mail.length >0) {

            if (emailChecking(mail)) {
                $("#formMail").removeClass("addBorderSucc");
                $("#formMail").removeClass("addBorderErr");

                $.ajax({
                    type: "POST",
                    url: "checkMail.php",
                    data: {mail: mail},
                    success: function (data) {


                        if (data === "mailFree") {
                            $("#mailErr").hide();
                            $("#formMail").removeClass("addBorderErr");
                            $("#mailSucc").show();
                            $("#formMail").addClass('addBorderSucc');


                        }
                        else {
                            $("#mailSucc").hide();
                            $("#formMail").removeClass("addBorderSucc");
                            $("#mailErr").show();
                            $("#formMail").addClass("addBorderErr");

                        }
                    }
                });
            }
            else{
                $("#formMail").removeClass("addBorderSucc");
                $("#formMail").addClass("addBorderErr");
                $(".tooltip").show().delay(2000);
                $(".tooltip").fadeOut(1000);
            }
        }
            else{
               $("#formMail").removeClass("addBorderErr");
               $("#formMail").removeClass("addBorderSucc");
               $("#mailSucc").hide();
               $("#mailErr").hide();
            }
    }


</script>


<div class="forma-registracije">
<form method="post" action="doRegister.php" >
    <fieldset><legend>Registrirajte se <small>(brezplačno)</small></legend>


        <input id="formName" name="ime" type="text" placeholder="Ime"  "/>
        <input id="formSurname" name="surname" type="text" placeholder="Priimek"  />
        <input id="formMail" name="mail" type="text" placeholder="Email" onchange="AvalibleMail()" />
        <div class="bubble tooltip"> <p>Ups! Vpišite svoj e-naslov.</p><div class="pointer"> </div></div>
        <i id="mailErr" class="fa fa-times error"></i>
        <i id="mailSucc" class="fa fa-check success"></i><!-- Preveri v bazi jče je mail še dosegljiv. Če ni se pojavi križec. -->
        <input id="pass" name="pass" type="password" placeholder="Geslo" />
        <i id="passSucc" class="fa fa-check success"></i>
        <input id="passCheck" name="passCheck" type="password" placeholder="Ponovite geslo" onchange="MatchPass()"/>
        <i id="passCErr" class="fa fa-times error"></i>
        <i id="passCSucc" class="fa fa-check success" ></i>


        <input id="btnReg" name="button" type="button" value="Registriraj" /> &nbsp; <!--<small style="color: #ff9f23; ">Registracija je brezplačna</small>-->

    </fieldset>
</form>


</div>

<script><!-- POST SCRIPT -->
    $("#btnReg").click(function(){
        var name = $("#formName").val();
        var surname = $("#formSurname").val();
        var mail= $("#formMail").val();
        var pass = $("#pass").val();
        var passCheck= $("#passCheck").val();

        if($.trim(name).length>0 || $.trim(surname).length>0 || $.trim(mail).length>0 ||
            $.trim(pass).length>0 || $.trim(passCheck).length>0 ){

            $.ajax({
               type:"POST",
                url:"doRegister.php",
                data:{ime:name,surname:surname,mail:mail,pass:pass, passCheck:passCheck},
                beforeSend:function(){$("#btnReg").val("Registriram...");},
                success: function(data){

                    if(data=="Success"){

                        $(".forma-registracije").hide().delay(2000);
                        window.location.href="index.php";

                    }
                    else{
                        $("#btnReg").val("Registriraj");

                    }
                }
            });
        }
    });
</script>

<?php
include_once "footer.php";
?>