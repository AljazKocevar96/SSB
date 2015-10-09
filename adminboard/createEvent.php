<?php
include_once "./header.php";
include_once "./core/session.php";
?>

<style>
 h3{
     margin-left: 0.6em;
 }
    #form{
        margin-left: 1em;
    }

</style>

<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        <h3>Dodajte nov dogodek</h3>
    </div>

</div>
    <br>
    <div id="form">
    <div class="row">

        <div class="col-lg-12">

            <div class="col-lg-7">
            <div class="input-group" >
            <span class="input-group-addon"><i class="fa fa-tags"></i></span>
                <input class="form-control" placeholder="Ime dogodka" type="text" name="ime" id="ime" />
            </div>
            </div>

            <div class="col-lg-7">
            <div class="input-group" style="margin-top: 0.8em;">
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                <input class="form-control" placeholder="Lokacija" type="text" name="lokacija" id="lokacija"/>
        </div>
        </div>

            <div class="col-lg-7">
            <div class="input-group" style="margin-top: 0.8em;">
                <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                <input class="form-control" placeholder="Datum začetka prijav na turnirje" type="text" name="openingDate" id="openingDate"/>
            </div>
    </div>

            <div class="col-lg-7">
            <div class="input-group" style="margin-top: 0.8em;">
                <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                <input class="form-control" placeholder="Datum dogodka" type="text" name="endDate" id="endDate" />
            </div>
            </div>

            <div class="col-lg-7"about="" style="margin-top: 0.8em;">
                <label>Opis dogodka</label>
              <textarea name="editor1" id="editor1" placeholder="Opis dogodka "> </textarea>
            </div>
            <script>
                CKEDITOR.replace( 'editor1' );
            </script>

            <div class="col-lg-7">
            <div style="margin-top: 0.8em; margin-right: 1em; ">
            <button id="submit" type="button" class="btn btn-primary pull-right">Potrdi <i class="fa fa-chevron-right"></i> </button>
                </div>
            </div>

    </div>
    </div>

</div>
</div>
<script>
    $(document).ready(function(){
        $("#submit").click(function(){
            var ime= $("#ime").val();
            var lokacija = $("#lokacija").val();
            var start_date = $("#openingDate").val();
            var end_date= $("#endDate").val();
            var description= CKEDITOR.instances['editor1'].getData();



            if(ime.length!=0 && lokacija.length!=0 && start_date.length!=0 && end_date.length!=0){
            $.ajax({
                type:"POST",
                url:"writeEvent.php",
                data:{ime:ime, lokacija:lokacija, start:start_date, end:end_date, opis:description},
                success: function(data){


                }

            });
            }
        });

    });
</script>
</body>
</html>
