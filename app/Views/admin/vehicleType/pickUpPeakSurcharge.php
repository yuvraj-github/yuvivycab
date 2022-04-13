<div class="row" id="showpickuptime" style="display:none;">
    <div class="row">
        <div class="col-lg-12">
            <div class="">
                <table class="table table-sm table-bordered day-table">
                    <tr>
                        <td><b>Monday</b></td>
                    </tr>
                    <tr>
                        <td> Start Time</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group clockpicker-with-callbacks">
                                <input type="text" class="form-control" name="tMonPickStartTime" id="tMonPickStartTime" value="<?php echo ($tMonPickStartTime != "00:00:00") ? $tMonPickStartTime : ""; ?>" placeholder="Start Time" readonly>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td> End Time</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group clockpicker-with-callbacks">
                                <input type="text" class="form-control" name="tMonPickEndTime" id="tMonPickEndTime" value="<?php echo ($tMonPickEndTime != "00:00:00") ? $tMonPickEndTime : ""; ?>" placeholder="End Time" readonly>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td> Price</td>
                    </tr>
                    <tr>
                        <td> <input type="text" class="form-control" name="fMonPickUpPrice" id="fMonPickUpPrice" value="<?php echo  $fMonPickUpPrice; ?>" placeholder="Enter Price"></td>
                    </tr>
                    <tr>
                        <td><input type="button" class="btn btn-sm btn-default" name="RMonday" id="RMonday" value="Reset" /></td>
                    </tr>
                </table>
                <table class="table table-sm table-bordered day-table">
                    <tr>
                        <td><b>Tuesday</b></td>
                    </tr>
                    <tr>
                        <td> Start Time</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group clockpicker-with-callbacks">
                                <input type="text" class="form-control" name="tTuePickStartTime" id="tTuePickStartTime" value="<?php echo ($tTuePickStartTime != "00:00:00") ? $tTuePickStartTime: ""; ?>" placeholder="Start Time" readonly>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td> End Time</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group clockpicker-with-callbacks">
                                <input type="text" class="form-control" name="tTuePickEndTime" id="tTuePickEndTime" value="<?php echo ($tTuePickEndTime != "00:00:00") ? $tTuePickEndTime : ""; ?>" placeholder="End Time" readonly>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td> Price</td>
                    </tr>
                    <tr>
                        <td> <input type="text" class="form-control" name="fTuePickUpPrice" id="fTuePickUpPrice" value="<?php echo $fTuePickUpPrice; ?>" placeholder="Enter Price"></td>
                    </tr>
                    <tr>
                        <td><input type="button" class="btn btn-sm btn-default" name="RTuesday" id="RTuesday" value="Reset" /></td>
                    </tr>
                </table>
                <table class="table table-sm table-bordered day-table">
                    <tr>
                        <td><b>Wednesday</b></td>
                    </tr>
                    <tr>
                        <td> Start Time</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group clockpicker-with-callbacks">
                                <input type="text" class="form-control" name="tWedPickStartTime" id="tWedPickStartTime" value="<?php echo ($tWedPickStartTime != "00:00:00") ? $tWedPickStartTime : ""; ?>" placeholder="Start Time" readonly>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td> End Time</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group clockpicker-with-callbacks">
                                <input type="text" class="form-control" name="tWedPickEndTime" id="tWedPickEndTime" value="<?php echo ($tWedPickEndTime != "00:00:00") ? $tWedPickEndTime : ""; ?>" placeholder="End Time" readonly>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td> Price</td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" name="fWedPickUpPrice" id="fWedPickUpPrice" value="<?php echo $fWedPickUpPrice; ?>" placeholder="Enter Price"></td>
                    </tr>
                    <tr>
                        <td><input type="button" class="btn btn-sm btn-default" name="RWednesday" id="RWednesday" value="Reset" /></td>
                    </tr>
                </table>
                <table class="table table-sm table-bordered day-table">
                    <tr>
                        <td><b>Thursday</b></td>
                    </tr>
                    <tr>
                        <td>Start Time</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group clockpicker-with-callbacks">
                                <input type="text" class="form-control" name="tThuPickStartTime" id="tThuPickStartTime" value="<?php echo ($tThuPickStartTime != "00:00:00") ? $tThuPickStartTime : ""; ?>" placeholder="Start Time" readonly>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td> End Time</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group clockpicker-with-callbacks">
                                <input type="text" class="form-control" name="tThuPickEndTime" id="tThuPickEndTime" value="<?php echo ($tThuPickEndTime != "00:00:00") ? $tThuPickEndTime : ""; ?>" placeholder="End Time" readonly>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td> Price</td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" name="fThuPickUpPrice" id="fThuPickUpPrice" value="<?php echo $fThuPickUpPrice; ?>" placeholder="Enter Price"></td>
                    </tr>
                    <tr>
                        <td><input type="button" class="btn btn-sm btn-default" name="RThursday" id="RThursday" value="Reset" /></td>
                    </tr>
                </table>
                <table class="table table-sm table-bordered day-table">
                    <tr>
                        <td><b>Friday</b></td>
                    </tr>
                    <tr>
                        <td> Start Time</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group clockpicker-with-callbacks">
                                <input type="text" class="form-control" name="tFriPickStartTime" id="tFriPickStartTime" value="<?php echo ($tFriPickStartTime != "00:00:00") ? $tFriPickStartTime : ""; ?>" placeholder="Start Time" readonly>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td> End Time</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group clockpicker-with-callbacks">
                                <input type="text" class="form-control" name="tFriPickEndTime" id="tFriPickEndTime" value="<?php echo ($tFriPickEndTime != "00:00:00") ? $tFriPickEndTime : ""; ?>" placeholder="End Time" readonly>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td> Price</td>
                    </tr>
                    <tr>
                        <td> <input type="text" class="form-control" name="fFriPickUpPrice" id="fFriPickUpPrice" value="<?php echo $fFriPickUpPrice; ?>" placeholder="Enter Price"></td>
                    </tr>
                    <tr>
                        <td><input type="button" class="btn btn-sm btn-default" name="RFriday" id="RFriday" value="Reset" /></td>
                    </tr>
                </table>
                <table class="table table-sm table-bordered day-table">
                    <tr>
                        <td><b>Saturday</b></td>
                    </tr>
                    <tr>
                        <td> Start Time</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group clockpicker-with-callbacks">
                                <input type="text" class="form-control" name="tSatPickStartTime" id="tSatPickStartTime" value="<?php echo ($tSatPickStartTime != "00:00:00") ? $tSatPickStartTime : ""; ?>" placeholder="Start Time" readonly>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td> End Time</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group clockpicker-with-callbacks">
                                <input type="text" class="form-control" name="tSatPickEndTime" id="tSatPickEndTime" value="<?php echo ($tSatPickEndTime != "00:00:00") ? $tSatPickEndTime : ""; ?>" placeholder="End Time" readonly>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td> Price</td>
                    </tr>
                    <tr>
                        <td> <input type="text" class="form-control" name="fSatPickUpPrice" id="fSatPickUpPrice" value="<?php echo $fSatPickUpPrice; ?>" placeholder="Enter Price"></td>
                    </tr>
                    <tr>
                        <td><input type="button" class="btn btn-sm btn-default" name="RSaturday" id="RSaturday" value="Reset" /></td>
                    </tr>
                </table>
                <table class="table table-sm table-bordered day-table">
                    <tr>
                        <td><b>Sunday</b></td>
                    </tr>
                    <tr>
                        <td> Start Time</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group clockpicker-with-callbacks">
                                <input type="text" class="form-control" name="tSunPickStartTime" id="tSunPickStartTime" value="<?php echo ($tSunPickStartTime != "00:00:00") ? $tSunPickStartTime : ""; ?>" placeholder="Start Time" readonly>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td> End Time</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group clockpicker-with-callbacks">
                                <input type="text" class="form-control" name="tSunPickEndTime" id="tSunPickEndTime" value="<?php echo $tSunPickEndTime; ?>" placeholder="End Time" readonly>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td> Price</td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" name="fSunPickUpPrice" id="fSunPickUpPrice" value="<?php echo $fSunPickUpPrice; ?>" placeholder="Enter Price"></td>
                    </tr>
                    <tr>
                        <td><input type="button" class="btn btn-sm btn-default" class="btn btn-default" name="RSunday" id="RSunday" value="Reset" /></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>