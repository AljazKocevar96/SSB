<?php
include_once "header.php";
include_once "core/DBfunctions.php";
include_once "core/connect.php"
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
        }



    </style>

<script>

$(document).ready(function(){

   $("#passCheck").keyup(function(){

      if($("#pass").val() == $("#passCheck").val()){

      $("#check").show();
      $("#nomatch").hide();



      }

       else{
          $("#check").hide();
          $("#nomatch").show();

      }

       if( $("#passCheck").val()== ""){


           $("#check").hide();
           $("#nomatch").hide();

       }
   });
});


</script>


<div class="forma-registracije">
<form method="post" action="register_do.php" >
    <fieldset><legend>Registrirajte se <small>(brezplačno)</small></legend>


        <input name="ime" type="text" placeholder="Ime"  "/>
        <input name="priimek" type="text" placeholder="Priimek"  />
        <input name="mail" type="email" placeholder="Email"  />
        <i class="fa fa-times error"></i><!-- Preveri v bazi jče je mail še dosegljiv. Če ni se pojavi križec. -->
        <input id="pass" name="pass" type="password" placeholder="Geslo" />
        <input id="passCheck" name="passCheck" type="password" placeholder="Ponovite geslo" />
       <div id="check" style="display: none;"><i class="fa fa-check" style="color: #219917;"></i> &nbsp;Gesli se ujemata.</div>
        <div id="nomatch" style="display: none;"><i class="fa fa-times" style="color: #d62911;"></i> &nbsp;Gesli se ne ujemata.</div>
        <br/>

        <input id="btnReg" name="button" type="button" value="Registriraj" /> &nbsp; <!--<small style="color: #ff9f23; ">Registracija je brezplačna</small>-->

    </fieldset>
</form>
</div>


<?php
include_once "footer.php";
?>