<?php
include_once "header.php";
include_once "core/session.php";

$query = "SELECT * FROM events;";
$result = Db::executeNoParams($query);

?>

<style>
    .material-switch > input[type="checkbox"] {
        display: none;
    }

    .material-switch > label {
        cursor: pointer;
        height: 0px;
        position: relative;
        width: 40px;
    }

    .material-switch > label::before {
        background: rgb(0, 0, 0);
        box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
        border-radius: 8px;
        content: '';
        height: 16px;
        margin-top: -8px;
        position: absolute;
        opacity: 0.3;
        transition: all 0.4s ease-in-out;
        width: 40px;
    }

    .material-switch > label::after {
        background: rgb(255, 255, 255);
        border-radius: 16px;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
        content: '';
        height: 24px;
        left: -4px;
        margin-top: -8px;
        position: absolute;
        top: -4px;
        transition: all 0.3s ease-in-out;
        width: 24px;
    }

    .material-switch > input[type="checkbox"]:checked + label::before {
        background: inherit;
        opacity: 0.5;
    }

    .material-switch > input[type="checkbox"]:checked + label::after {
        background: inherit;
        left: 20px;
    }
</style>

<div id="page-wrapper" style="margin-left: 1%; position: relative;   ">
    <div class="row">
        <div class="col-lg-12">
            <h1><i class="fa fa-calendar"></i> Prihajajoči dogodki</h1>
            <hr>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <a href="index.php">Nadzorna plošča</a>
                </li>
                <li class="active">
                    <i class="fa fa-table"></i> Prihajajoči dogodki
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Ime</th>
                    <th>Lokacija</th>
                    <th>Začetek</th>
                    <th>Konec</th>
                    <th>Status</th>

                </tr>
                </thead>
                <?php while ($resultRows = Db::FetchRows($result)) { ?>
                    <tr>
                        <td><?php echo $resultRows['ime']; ?></td>
                        <td><?php echo $resultRows['lokacija']; ?></td>
                        <td><?php echo $resultRows['start_date']; ?></td>
                        <td><?php echo $resultRows['end_date']; ?></td>
                        <td>
                            <?php if ($resultRows['status'] == "Active") { ?>
                                <div class="material-switch pull-left">
                                    <input id="<?php echo $resultRows['id']; ?>"
                                           name="<?php echo $resultRows['ime']; ?>" onclick="changeStatus(this.id)"
                                           type="checkbox" checked="checked"/>
                                    <label for="<?php echo $resultRows['id']; ?>" class="label-success"></label>
                                </div>
                            <?php } else if ($resultRows['status'] == "notActive") { ?>
                                <div class="material-switch pull-left">
                                    <input id="<?php echo $resultRows['id']; ?>"
                                           name="<?php echo $resultRows['ime']; ?>" onclick="changeStatus(this.id)"
                                           type="checkbox"/>
                                    <label for="<?php echo $resultRows['id']; ?>" class="label-success"></label>
                                </div>
                            <?php } ?>
                        </td>


                    </tr>
                <?php } ?>


            </table>

        </div>
    </div>

</div>

</div>

<script>
    function changeStatus(event) {
        var id = event;
        var active = "";

        if (document.getElementById(id).checked) {
            active = "Active";
        }
        else {
            active = "notActive";
        }


        $.ajax({
            type: "POST",
            url: "updateEventStatus.php",
            data: {id: id, status: active},
            success: function (data) {


            }

        });

    }
</script>

