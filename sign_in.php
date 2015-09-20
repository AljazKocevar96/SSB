<?php
include_once "header.php";
?>

    <style >
        .forma-registracije{

            margin: 8% auto 8% auto;
            position: relative;
            width: 30em;
        }





    </style>




    <div class="forma-registracije">
        <form method="post" action="loginCheck.php" >
            <fieldset><legend>Prijavite se</legend>

             <div class="space" style="margin-top: 1em;">
                <input name="mail" type="email" placeholder="Email"  />
                <input id="pass" name="pass" type="password" placeholder="Geslo" />
             </div>

                <br/>

                <input id="btnReg" name="button" type="button" value="Prijavi" /> &nbsp; <!--<small style="color: #ff9f23; ">Registracija je brezplačna</small>-->

            </fieldset>
        </form>
    </div>





<?php
include_once "footer.php";
?>