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
                <input id="mail" name="mail" type="email" placeholder="Email"  />
                <input id="pass" name="pass" type="password" placeholder="Geslo" />
             </div>

                <br/>

                <input id="btnSubmit" name="button" type="button" value="Prijavi" /> &nbsp; <!--<small style="color: #ff9f23; ">Registracija je brezplačna</small>-->

            </fieldset>
        </form>
    </div>
<script>
$(document).ready(function(){
   $("#btnSubmit").click(function(){
      var mail=$("#mail").val();
       var pass=$("#pass").val();

       $.ajax({
           type:"POST",
           url:"loginCheck.php",
           data:{mail:mail, pass:pass},
           success:function(data){

               alert(data);

           }


       });
   });
});
</script>





<?php
include_once "footer.php";
?>