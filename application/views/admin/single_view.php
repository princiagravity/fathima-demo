                        <!-- Page Content  -->
                        <div id="content-page" class="content-page">
                        <div class="container-fluid">
                        <div class="row">
                        <?php //print_r($image_url); exit;?>
                        <div class="col-lg-12">
                        <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                        <h4 class="card-title"><?php echo $type;?></h4>
                        </div>
                        </div>
                        <div class="iq-card-body">

                        <form id="" method="POST" action="" data-form="ajaxform" enctype="multipart/form-data">

                        <?php foreach($data[0] as $index=>$value)
                        {
                        ?>
                        <div class="form-row">
                        <div class="col">
                       <?php echo $index;?>
                        </div>
                        <div class="col">
                       <?php if($index=="image_url")
                       {
                        ?>
                        <img src="<?php echo $image.$value;?>" width="150px" height="150px">
                        <?php
                       }
                       else
                       {
                       echo $value;
                       }?>
                        </div>
                        </div>
                        <?php
                        }

                        if($type=="products")
                        {
                            ?>
                            <h4 class="card-title">Variant Details</h4>
                            <div class="form-row">
                        <div class="col">
                        id
                        </div>
                        <div class="col">
                        variants
                        </div>
                        <div class="col">
                        mrp
                        </div>
                        <div class="col">
                        price
                        </div>
                        <div class="col">
                        max_sale
                        </div>
                       
                        </div>
                        <?php
                        for($i=0;$i< count($data2);$i++)
                        {
                        ?>
                        <div class="form-row">
                        <?php
                        foreach($data2[$i] as $index=>$value)
                        {
                        ?>
                        <div class="col">
                        <?php echo $value;?>
                        </div>

                        <?php
                        }
                        ?>
                        </div>
                        <?php
                        }
                        ?>

                        <?php
                        }

                        ?>

                        <div class="form-row" style="padding-top:50px;">
                        <div class="col">
                        <input type="hidden" name="deltype" class="deltype" value="<?php echo $type?>">
                        <input type="hidden" name="delid" class="delid" value="<?php echo $data[0]->id;?>">
                        <button type="submit" class="btn btn-primary"><a href="<?php echo site_url($page_name.'/'.$data[0]->id);?>">Update</a></button>
                        <button type="button" class="btn btn-primary delete_item">Delete</button>

                        </div>


                        </div>
                        </form>
                        </div>
                        </div></div>
                        </div>

                        </div>
                        </div>