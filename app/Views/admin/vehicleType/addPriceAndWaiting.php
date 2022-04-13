<div class="card card-primary">
    <div class="card-header">
        <h4 class="card-title w-100">
            <a class="d-block w-100" data-toggle="collapse-no" href="#priceAndWaiting" aria-expanded="true">
                Price and Waiting Section
            </a>
        </h4>
    </div>
    <!-- /.card-header -->
    <div id="priceAndWaiting" class="collapse-no" data-parent="#accordion">
        <div class="card-body table-responsive">
            <section class="primary">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Price Per KMs (Price In EUR):</label>
                            <input type="text" class="form-control" name="fPricePerKM" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->fPricePerKM : "";  ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Price Per KMs (Price In EUR) (Ride Later):</label>
                            <input type="button" class="form-control" name="fPricePerKM_Button" id="fPricePerKM_Button" value="Click here to add Slab">
                            <table class="table slide_table">
                                <tr class="range">
                                    <td>
                                        <input type="text" name="from[]" class="form-control" placeholder="from" value="0" readonly>
                                    </td>
                                    <td class="pluss">
                                        <input type="text" name="to[]" class="form-control" placeholder="to" value="10" readonly>
                                    </td>
                                    <td class="pluss">
                                        <span>€</span>
                                        <input type="text" name="price[]" class="form-control validate[required,custom[number]]" placeholder="price" value="<?= $price_slab_arr[0]->price; ?>">
                                    </td>
                                </tr>
                                <tr class="range">
                                    <td>
                                        <input type="text" name="from[]" class="form-control" placeholder="from" value="11" readonly>
                                    </td>
                                    <td class="pluss">
                                        <input type="text" name="to[]" class="form-control" placeholder="to" value="100" readonly>
                                    </td>
                                    <td class="pluss">
                                        <span>€</span>
                                        <input type="text" name="price[]" class="form-control validate[required,custom[number]]" placeholder="price" value="<?= $price_slab_arr[1]->price; ?>" >
                                    </td>
                                </tr>
                                <tr class="range">
                                    <td>
                                        <input type="text" name="from[]" class="form-control" placeholder="from" value="101" readonly>
                                    </td>
                                    <td class="pluss">
                                        <input type="text" name="to[]" class="form-control" placeholder="to" value="200" readonly>
                                    </td>
                                    <td class="pluss">
                                        <span>€</span>
                                        <input type="text" name="price[]" class="form-control validate[required,custom[number]]" placeholder="price" value="<?= $price_slab_arr[2]->price; ?>" >
                                    </td>
                                </tr>
                                <tr class="range">
                                    <td>
                                        <input type="text" name="from[]" class="form-control" placeholder="from" value="201" readonly>
                                    </td>
                                    <td class="pluss">
                                        <input type="text" name="to[]" class="form-control" placeholder="to" value="more" readonly>
                                    </td>
                                    <td class="pluss">
                                        <span>€</span>
                                        <input type="text" name="price[]" class="form-control validate[required,custom[number]]" placeholder="price" value="<?= $price_slab_arr[3]->price; ?>" >
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Price Per Min (Price In EUR):</label>
                            <input type="text" class="form-control validate[required,custom[number]]" name="fPricePerMin" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->fPricePerMin : "";  ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Price Per Min (Price In EUR) (Ride Later):</label>
                            <input type="text" class="form-control validate[required,custom[number]]" name="fPricePerMin_rl" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->fPricePerMin_rl : "";  ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Minimum Fare (Price In EUR):</label>
                            <input type="text" class="form-control validate[required,custom[number]]" name="iMinFare" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->iMinFare : "";  ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Minimum Fare (Price In EUR) (Ride Later):</label>
                            <input type="text" class="form-control validate[required,custom[number]]" name="iMinFare_rl" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->iMinFare_rl : "";  ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Base Fare (Price In EUR) :</label>
                            <input type="text" class="form-control validate[required,custom[number]]" name="iBaseFare" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->iBaseFare : "";  ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Base Fare (Price In EUR) (Ride Later):</label>
                            <input type="text" class="form-control validate[required,custom[number]]" name="iBaseFare_rl" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->iBaseFare_rl : "";  ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Rider Cancellation Time Limit ( in minute ) :</label>
                            <input type="text" class="form-control validate[required,custom[number]]" name="iCancellationTimeLimit" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->iCancellationTimeLimit : "";  ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Rider Cancellation Time Limit ( in Hour ) (Ride Later):</label>
                            <input type="button" class="form-control" name="iCancellationTimeLimit_Button" id="iCancellationTimeLimit_Button" value="Click here to add Slab">
                            <table class="table slide_table_cancel">
                                <?php
                                $price_slab_arr_cancel = json_decode($price_slab_cancel);
                                if (!empty($price_slab_arr_cancel)) {
                                    foreach ($price_slab_arr_cancel as $price_slab_cancel) { ?>
                                        <tr class="range">
                                            <td>
                                                <input type="text" name="from_charges[]" class="form-control validate[required,custom[number]]" placeholder="from" value="<?= $price_slab_cancel->from ?>">
                                            </td>
                                            <td class="pluss">
                                                <input type="text" name="to_charges[]" class="form-control validate[required,custom[number]]" placeholder="to" value="<?= $price_slab_cancel->to ?>">
                                            </td>
                                            <td class="pluss">
                                                <span>%</span>
                                                <input type="text" name="charges[]" class="form-control validate[required,custom[number]]" placeholder="charges(%)" value="<?= $price_slab_cancel->charges; ?>">
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-danger delete">Delete</button>
                                            </td>
                                        </tr>
                                <?php }
                                }
                                ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="javascript:void(0)" class="btn btn-success add_new">Add</a></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Waiting Time Limit ( in minute ) :</label>
                            <input type="text" class="form-control validate[required,custom[number]]" name="iWaitingFeeTimeLimit" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->iWaitingFeeTimeLimit : "";  ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Waiting Time Limit ( in minute ) (Ride Later):</label>
                            <input type="text" class="form-control validate[required,custom[number]]" name="iWaitingFeeTimeLimit_rl" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->iWaitingFeeTimeLimit_rl : "";  ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Waiting Charges (Price In EUR):</label>
                            <input type="text" class="form-control validate[required,custom[number]]" name="fWaitingFees" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->fWaitingFees : "";  ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Waiting Charges (Price In EUR) (Ride Later):</label>
                            <input type="text" class="form-control validate[required,custom[number]]" name="fWaitingFees_rl" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->fWaitingFees_rl : "";  ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">

                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Airport Waiting Time Limit ( in minute ) (Ride Later):</label>
                            <input type="text" class="form-control validate[required,custom[number]]" name="iWaitingFeeTimeLimitAirport" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->iWaitingFeeTimeLimitAirport : "";  ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">

                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Airport Waiting Charges (Price In EUR) (Ride Later):</label>
                            <input type="text" class="form-control validate[required,custom[number]]" name="fWaitingFeesAirport" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->fWaitingFeesAirport : "";  ?>">
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.card-body -->
    </div>
</div>