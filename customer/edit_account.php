<div class="box" >
    <div class="box-header"><!--box header start-->
        <center>
            <h2>Edit Your Account</h2>
        </center>
    </div><!--box header end-->
    <form action="contact.php" method="post" enctype="multipart/form-data"
     class="form-horizontal" style="margin-top: 40px;">
        <div class="form-group">
            <label class="control-label col-sm-2"><h4 style="margin:0;">Name:</h4></label>
            <div class="col-sm-10">
                <input type="text" name="c_name" class="form-control" required>
            </div>
            
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2"><h4 style="margin:0;"> Email :</h4></label>
            <div class="col-sm-10">
                <input type="email" name="c_email" class="form-control" required>
            </div>
            
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2"><h4 style="margin:0;">Phone :</h4></label>
            <div class="col-sm-10">
                <input type="number" name="c_phone_number" class="form-control" required>
            </div>
            
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2"><h4 style="margin:0;"> UserName:</h4></label>
            <div class="col-sm-10">
                <input type="text" name="c_username" class="form-control" required>
            </div>
            
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2"><h4 style="margin:0;">Password:</h4></label>
            <div class="col-sm-10">
                <input type="password" name="c_password" class="form-control" required>
            </div>   
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2"><h4 style="margin:0;">Address :</h4></label>
            <div class="col-sm-10">
                <input type="text" name="c_address" class="form-control" required>
            </div>   
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2"><h4 style="margin:0;">Image :</h4></label>
            <div class="col-sm-10">
                <input type="file" name="c_image" class="form-control" required>
            </div>   
        </div>
        <img class="img-thumbnail " style="margin-left:130px; " src="customer_images/Ayan.jpg" class="img-responsive" height="100px" width="100px">
        <div class="text-center">
            <button type="submit" name="submit" class="btn btn-success btn-lg">
                <i class="fa fa-refresh"></i>&nbsp;Update
            </button>
        </div>
    </form>
</div>
