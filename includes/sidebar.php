
<div class="panel panel-default sidebar-menu" style="box-sizing: border-box;
    box-shadow: 0 1px 5px rgba(0,0,0,0.5);"><!--panel panel-default sidebar-menu start-->
    <div class="panel-heading"><!--panel heading start-->
        <h3 class="panel-title m-0 py-3">
            Product Categories
        </h3>
    </div><!--panel-heading end-->
    <div class="panel-body" style="height:315px; overflow-y: scroll;"><!--panel-body start-->
        <ul class="nav nav-pills nav-stacked category-menu mb-3">
            <?php 
                //function in functions.php -> getProCat
                getProCat();
            ?>
        </ul>
    </div><!--panel-body end-->
</div><!--panel panel-default sidebar-menu end-->

<div class="panel panel-default sidebar-menu" style="box-sizing: border-box;
    box-shadow: 0 1px 5px rgba(0,0,0,0.5);"><!--panel panel-default sidebar-menu start-->
    <div class="panel-heading"><!--panel heading start--->
        <h3 class="panel-title m-0 py-3">
            Categories
        </h3>
    </div><!--panel-heading end-->
    <div class="panel-body"><!--panel-body start-->
        <ul class="nav nav-pills nav-stacked category-menu">
            <?php 
                //function in functions.php -> getCat
                getCat();
            ?>        
        </ul>
    </div><!--panel-body end-->
</div><!--panel panel-default sidebar-menu end-->
