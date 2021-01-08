<?php
    if(!$_SESSION['admin_email']){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{
?>

<div class="row">
    <div class="col-md-12">
        <h2 class="text-center">Insert Product Description</h2>
        <hr class="dotted">
        <div class="breadcrumb">
            <i class="fa fa-dashboard"></i> Dashboard >> Insert Product Description
        </div>
    </div>
</div>
<div class="box">
    <form action="" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <label class="control-label"><h4 style="margin:3px;"> Phone Title / Name : </h4></label>
            <input type="text" name="p_title" class="form-control">
        </div>
        <h3 class="text-center mt-2">Launch : </h3>
        <div class="form-group" style="margin-bottom:10px;">
            <div class="col-md-6">
                <label class="control-label"><h4 style="margin:3px;">Announced : </h4></label>
                <input type="text" name="ph_l_announced" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="control-label"><h4 style="margin:3px;">Status : </h4> </label>
                <input type="text" name="ph_l_status" class="form-control">
            </div>
        </div>
        <br><br><br>
        <h3 class="text-center" style="margin-top: 10px;">Network : </h3>
        <div class="form-group">
            <div class="col-md-3">
                <label class="control-label"><h4 style="margin:3px;">Technology : </h4></label>
                <input type="text" name="ph_n_technology" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="control-label"><h4 style="margin:3px;">2G Bands : </h4> </label>
                <input type="text" name="ph_n_2g_bands" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="control-label"><h4 style="margin:3px;">3G Bands : </h4></label>
                <input type="text" name="ph_n_3g_bands" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="control-label"><h4 style="margin:3px;">4G Bands : </h4> </label>
                <input type="text" name="ph_n_4g_bands" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3">
                <label class="control-label"><h4 style="margin:3px;">5G Bands : </h4></label>
                <input type="text" name="ph_n_5g_bands" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="control-label"><h4 style="margin:3px;">Speed : </h4> </label>
                <input type="text" name="ph_n_speed" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="control-label"><h4 style="margin:3px;">GPRS : </h4></label>
                <select name="ph_n_gprs" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="control-label"><h4 style="margin:3px;">EDGE : </h4> </label>
                <select name="ph_n_edge" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
        </div>
        <h3 class="text-center" style="margin-top: 10px;">Body : </h3>
        <div class="form-group">
            <div class="col-md-3">
                <label class="control-label"><h4 style="margin:3px;">Dimensions : </h4></label>
                <input type="text" name="ph_b_dimensions" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="control-label"><h4 style="margin:3px;">Weight : </h4> </label>
                <input type="text" name="ph_b_weight" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="control-label"><h4 style="margin:3px;">Build : </h4></label>
                <input type="text" name="ph_b_build" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="control-label"><h4 style="margin:3px;">SIM : </h4> </label>
                <input type="text" name="ph_b_sim" class="form-control">
            </div>
        </div>
        <br><br><br>
        <h3 class="text-center" style="margin-top: 10px;">Display : </h3>
        <div class="form-group">
            <div class="col-md-2">
                <label class="control-label"><h4 style="margin:3px;">Type : </h4></label>
                <input type="text" name="ph_d_type" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="control-label"><h4 style="margin:3px;">Size : </h4> </label>
                <input type="text" name="ph_d_size" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="control-label"><h4 style="margin:3px;">Resolution : </h4></label>
                <input type="text" name="ph_d_resolution" class="form-control">
            </div>
            <div class="col-md-2">
                <label class="control-label"><h4 style="margin:3px;">Multitouch : </h4> </label>
                <select name="ph_d_multitouch" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="control-label"><h4 style="margin:3px;">Protection : </h4> </label>
                <input type="text" name="ph_d_protection" class="form-control">
            </div>
        </div>
        <br><br><br>
        <h3 class="text-center" style="margin-top: 10px;">Platform : </h3>
        <div class="form-group">
            <div class="col-md-3">
                <label class="control-label"><h4 style="margin:3px;">OS : </h4></label>
                <input type="text" name="ph_p_os" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="control-label"><h4 style="margin:3px;">Chipset : </h4> </label>
                <input type="text" name="ph_p_chipset" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="control-label"><h4 style="margin:3px;">CPU : </h4></label>
                <input type="text" name="ph_p_cpu" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="control-label"><h4 style="margin:3px;">GPU : </h4> </label>
                <input type="text" name="ph_p_gpu" class="form-control">
            </div>
        </div>
        <br><br><br>
        <h3 class="text-center" style="margin-top: 10px;">Memory : </h3>
        <div class="form-group">
            <div class="col-md-4">
                <label class="control-label"><h4 style="margin:3px;">Card Slot : </h4></label>
                <input type="text" name="ph_m_card_slot" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="control-label"><h4 style="margin:3px;">Internal : </h4> </label>
                <input type="text" name="ph_m_internal" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="control-label"><h4 style="margin:3px;">RAM : </h4></label>
                <input type="text" name="ph_m_ram" class="form-control">
            </div>
        </div>
        <br><br><br>
        <h3 class="text-center" style="margin-top: 10px;">Camera : </h3>
        <div class="form-group">
            <div class="col-md-3">
                <label class="control-label"><h4 style="margin:3px;">Primary : </h4></label>
                <input type="text" name="ph_c_primary_cam" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="control-label"><h4 style="margin:3px;">Secondary : </h4> </label>
                <input type="text" name="ph_c_secondary_cam" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="control-label"><h4 style="margin:3px;">Features : </h4></label>
                <input type="text" name="ph_c_features" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="control-label"><h4 style="margin:3px;">Video : </h4> </label>
                <input type="text" name="ph_c_video" class="form-control">
            </div>
        </div>
        <br><br><br>
        <h3 class="text-center" style="margin-top: 10px;">Sound : </h3>
        <div class="form-group">
            <div class="col-md-4">
                <label class="control-label"><h4 style="margin:3px;">Alert Type : </h4></label>
                <input type="text" name="ph_s_alert_type" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="control-label"><h4 style="margin:3px;">Loudspeaker : </h4> </label>
                <input type="text" name="ph_s_loudspeaker" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="control-label"><h4 style="margin:3px;">3.5 mm Jak : </h4></label>
                <select name="ph_s_35mm_jak" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
        </div>
        <br><br><br>
        <h3 class="text-center" style="margin-top: 10px;">Connectivity : </h3>
        <div class="form-group">
            <div class="col-md-2">
                <label class="control-label"><h4 style="margin:3px;">WLAN : </h4></label>
                <input type="text" name="ph_c_wlan" class="form-control">
            </div>
            <div class="col-md-2">
                <label class="control-label"><h4 style="margin:3px;">Bluetooth : </h4> </label>
                <input type="text" name="ph_c_bluetooth" class="form-control">
            </div>
            <div class="col-md-2">
                <label class="control-label"><h4 style="margin:3px;">GPS : </h4></label>
                <input type="text" name="ph_c_gps" class="form-control">
            </div>
            <div class="col-md-1">
                <label class="control-label"><h4 style="margin:3px;">NFC : </h4> </label>
                <select name="ph_c_nfc" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
            <div class="col-md-1">
                <label class="control-label"><h4 style="margin:3px;">FM : </h4> </label>
                <select name="ph_c_fm_radio" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="control-label"><h4 style="margin:3px;">USB : </h4></label>
                <input type="text" name="ph_c_usb" class="form-control">
            </div>
            <div class="col-md-2">
                <label class="control-label"><h4 style="margin:3px;">Infrared Port : </h4> </label>
                <select name="ph_c_infrared_port" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
        </div>
        <br><br><br>
        <h3 class="text-center" style="margin-top: 10px;">Features : </h3>
        <div class="form-group">
            <div class="col-md-3">
                <label class="control-label"><h4 style="margin:3px;">Sensors : </h4></label>
                <input type="text" name="ph_f_sensors" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="control-label"><h4 style="margin:3px;">Messaging : </h4> </label>
                <input type="text" name="ph_f_messaging" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="control-label"><h4 style="margin:3px;">Browser : </h4></label>
                <input type="text" name="ph_f_browser" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="control-label"><h4 style="margin:3px;">Java : </h4> </label>
                <select name="ph_f_java" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
        </div>
        <br><br><br>
        <h3 class="text-center" style="margin-top: 10px;">Battery : </h3>
        <div class="form-group">
            <div class="col-md-6">
                <label class="control-label"><h4 style="margin:3px;">Battery Type : </h4></label>
                <input type="text" name="ph_b_type" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="control-label"><h4 style="margin:3px;">Battery Capacity : </h4> </label>
                <input type="text" name="ph_b_capacity" class="form-control">
            </div>
        </div>
        <br><br><br>
        <h3 class="text-center" style="margin-top: 10px;">More : </h3>
        <div class="form-group">
            <div class="col-md-4">
                <label class="control-label"><h4 style="margin:3px;">Made By : </h4></label>
                <input type="text" name="ph_m_made_by" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="control-label"><h4 style="margin:3px;">Color : </h4> </label>
                <input type="text" name="ph_m_color" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="control-label"><h4 style="margin:3px;">Other Features : </h4></label>
                <input type="text" name="ph_m_other_features" class="form-control">
            </div>
        </div>
        <br><br><br><br>
        <center>
            <button class="btn btn-success btn-lg" name="insert_p_description" type="submit">Insert Product Description</button>
        </center>
        <br>
    </form>
</div>

<?php insert_product_description(); ?>

    <?php }?>