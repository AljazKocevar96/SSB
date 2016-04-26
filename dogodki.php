<?php
include_once "header.php";
include_once "core/session.php";

$query="SELECT * FROM events WHERE status='Active' ORDER BY start_date ASC";
$result=Db::executeNoParams($query);

?>

<script>

    $(document).ready(function(){
        $("#datum").removeAttr('h3');
    });

</script>

<div class="outter-wrapper body-wrapper">
    <div class="wrapper ad-pad blog-roll clearfix">

        <h1>Prihajajoči dogodki</h1>

        <!-- Start Main Column  -->
        <div class="col-1-1">

            <div class="page-heading">
                <a href="author.html" class="fa">&#xf07c;</a> 14 Results for <span class="highlight">Sport</span>
            </div>

            <?php while($resultRows=Db::FetchRows($result)){ ?>
            <div class="post-excerpt clearfix">
                <div class="col-1-3 mosaic-block circle">
                    <a href="post.html" class="mosaic-overlay link" title="Insert Your Title"></a><div class="mosaic-backdrop">
                        <img src="img/fill-4.jpg" alt="Mock" /></div>
                </div>

                <div class="col-2-3 last">
                    <div><h3><a href="dogodek.php?id=<?php echo $resultRows["id"]; ?>"><?php echo $resultRows['ime'] ;  ?></a> <small id="datum">(<?php echo $resultRows['start_date'];?> - <?php echo $resultRows['end_date'];?>)</small></h3></div>
                    <p><?php echo $resultRows['opis'];  ?> &#8230;<a href="post.html" class="read-more">Preberi več</a></p>
                </div>
            </div>
            <?php } ?>



        </div>
    </div>
</div>

<style>
    #datum{
        color: #000;
        font-family: robotolight;
        font-weight:normal;
        font-size: 0.59em;
    }
</style>
<?php
include_once "footer.php";
?>
