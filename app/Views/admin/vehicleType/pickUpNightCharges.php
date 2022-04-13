<?php
$weekDaysArr = array(
    "Monday" => "Mon",
    "Tuesday" => "Tue",
    "Wednesday" => "Wed",
    "Thursday" => "Thu",
    "Friday" => "Fri",
    "Saturday" => "Sat",
    "Sunday" => "Sun"
); ?>
<div id="shownighttime" style="display:none;">
    <div class="row">
        <div class="col-lg-12">
            <div class="">
                <?php
                foreach ($weekDaysArr as $dayKey => $dayVal) {
                    $dayStartId = "t" . $dayVal . "NightStartTime";
                    $dayEndId = "t" . $dayVal . "NightEndTime";
                    $priceId = "f" . $dayVal . "NightPrice";
                ?>
                    <table class="table table-sm table-bordered day-table">
                        <tr>
                            <td><b><?= $dayKey; ?></b></td>
                        </tr>
                        <tr>
                            <td> Start Time</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="input-group clockpicker-with-callbacks">
                                    <input type="text" class="form-control" name="<?= $dayStartId; ?>" id="<?= $dayStartId; ?>" value="<?php echo (isset($nightSurgeDataArr[$dayStartId])) ? $nightSurgeDataArr[$dayStartId] : ""; ?>" placeholder="Start Time">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td> End Time</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="input-group clockpicker-with-callbacks">
                                    <input type="text" class="form-control" name="<?= $dayEndId; ?>" id="<?= $dayEndId; ?>" value="<?php echo (isset($nightSurgeDataArr[$dayEndId])) ? $nightSurgeDataArr[$dayEndId] : ""; ?>" placeholder="End Time">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td> Price</td>
                        </tr>
                        <tr>
                            <td> <input type="text" class="form-control" name="<?= $priceId; ?>" id="<?= $priceId; ?>" value="<?php echo (isset($nightSurgeDataArr[$priceId])) ? $nightSurgeDataArr[$priceId] : ""; ?>" placeholder="Enter Price"></td>
                        </tr>
                        <tr>
                            <td><input type="button" class="btn btn-sm btn-default" name="RNight<?= $dayKey ?>" id="RNight<?= $dayKey ?>" value="Reset" /></td>
                        </tr>
                    </table>
                <?php } ?>
            </div>
        </div>
    </div>
</div>