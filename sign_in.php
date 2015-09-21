<?php
include_once "header.php";
?>

    <style >
        .forma-registracije{

            margin: 8% auto 8% auto;
            position: relative;
            width: 30em;
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
        .tooltip{
            float: right;
            margin-right: -16em;
            margin-top: -3.5em;
            position: relative;
            z-index: 2;
            display: none;
        }
        .addBorderErr{
            border: 2px solid;
            border-color: #890000!important;
            background-color: #FBCDCD !important;

        }
    </style>
    <div class="forma-registracije">
        <form method="post" action="loginCheck.php" >
            <div id="hideOnLogIn">
            <fieldset><legend>Prijavite se</legend>

             <div class="space" style="margin-top: 1em;">
                <input id="mail" name="mail" type="email" placeholder="Email" onkeyup="RemoveErrClassMail()" />
                 <div id="wrongMail" class="bubble tooltip"> <p>Ups! Ta mail ni registriran ! </p><div class="pointer"> </div></div>
                <input id="pass" name="pass" type="password" placeholder="Geslo" onkeyup="RemoveErrClassPass()"/>
                 <div id="wrongPass" class="bubble tooltip" style="width:12em; margin-right: -13em;;"> <p>Ups! Napačno geslo !</p><div class="pointer"> </div></div>
             </div>

                <input id="btnSubmit" name="button" type="button" value="Prijavi" /> &nbsp; <!--<small style="color: #ff9f23; ">Registracija je brezplačna</small>-->

            </fieldset>
            </div>
        </form>
    </div>
<script>
$(document).ready(function(){
   $("#btnSubmit").click(function(){
      var mail=$("#mail").val();
       var pass=$("#pass").val();

       if($.trim(mail).length>0 && $.trim(pass).length>0){
       $.ajax({
           type:"POST",
           url:"loginCheck.php",
           data:{mail:mail, pass:pass},
           beforeSend:function(){$("#btnSubmit").val("Prijavljanje...");},
           success:function(data){

               if(data === "Prijava uspešna"){
                   $("#hideOnLogIn").hide();
                   setTimeout(function(){
                       window.location.href="index.php";
                   },2000);

               }
               else{
                   if(data === "Mail ne obstaja"){

                       $("#wrongMail").show().delay(2000);
                       $("#wrongMail").fadeOut(1000);

                   }

                   if(data ==="Geslo zavrnjeno"){

                       $("#wrongPass").show().delay(2000);
                       $("#wrongPass").fadeOut(1000);

                   }
                   $("#btnSubmit").val("Prijavi");
               }
           }


       });
       }
       else{
           if(mail.lenght === 0 || pass.length === 0){
               $("#mail").addClass('addBorderErr');

           }
           if(pass.length === 0 && mail.lenght === 0){
               $("#mail").addClass('addBorderErr');
           }

       }
   });
});

    function RemoveErrClassMail(){
          $("#mail").removeClass("addBorderErr");


    }
    function RemoveErrClassPass(){

        $("#pass").removeClass("addBorderErr");
    }

</script>
<?php
include_once "footer.php";
?>