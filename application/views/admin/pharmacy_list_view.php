<div class="page-content-wrapper">
    <div class="page-content">
        
		<div class="row">
           <div class="col-md-12">
                <div class="card card-topline-aqua">
                    <div class="card-head">
                         <header>Pharmacy List</header>
                        <div class="tools">
                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                            <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                        </div>
                    </div>
                        <?php
                                    if($this->session->flashdata('message')){
                                ?>
                                        <div class="alert alert-success alert-dismissible">
                                            <strong>Success!</strong> <?php echo $this->session->flashdata('message'); ?>
                                        </div>
                                <?php
                                    }
                                ?>

                        <?php
                                    if($this->session->flashdata('error')){
                                ?>
                                <div class="alert alert-danger">
                                    <b><?php echo $this->session->flashdata('error'); ?></b>
                                </div>
                                <?php
                                    }
                                ?>
                    <div class="card-body ">
                        <table id="saveStage" class="display" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>S.No</th>
									<th>Name of the Pharmacy</th>
                                    <th>Email</th>
                                    <th>Mobile No </th>
                                    <th>Reg Date & Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i = 1;
                                    foreach ($pharmacyList as $row) {                                    
                                ?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $row['pharmacy_name'];?></td>
                                    <td><?php echo $row['pharmacy_email'];?></td>
                                    <td><?php echo $row['pharmacy_phone'];?></td>
                                    <td><?php echo $row['pharmacy_created_date'];?></td>
                                    <td><?php if($row['pharmacy_status'] == 1){
                                            echo "Active";
                                        }else{

                                            echo "Deactive";
                                        };?></td>
                                    <td class="valigntop">
                                        <div class="btn-group">
                                            <a href="<?php echo base_url().'admins/dashboard/getPharmacyDetails/'.$row['pharmacy_id'];?>"><button class="btn btn-xs btn-primary">Edit</button></a>&nbsp;
                                            <?php if($row['pharmacy_status'] == 1){ ?>

                                                <a href="<?php echo base_url().'admins/dashboard/deactivatePharmacy/'.$row['pharmacy_id'];?>" onclick="return confirm('Are you want to Deactivate?');"><button class="btn btn-xs btn-info">Deactive</button></a>&nbsp;

                                            <?php }else{ ?>

                                                <a href="<?php echo base_url().'admins/dashboard/activatePharmacy/'.$row['pharmacy_id'];?>" onclick="return confirm('Are you want to Activate?');"><button class="btn btn-xs btn-info">Active&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></a>&nbsp;

                                            <?php }?>
                                            
                                            <a href="<?php echo base_url().'admins/dashboard/deletePharmacy/'.$row['pharmacy_id'];?>" onclick="return confirm('Are you want to delete?');"><button class="btn btn-xs btn-danger">Delete</button></a>
                                        </div>
                                    </td>
                                </tr>

                                <?php
                                    $i++; 
                                    } 
                                ?>
                            </tbody>
                        </table>
                    </div>
					<div class="clearfix">&nbsp;</div>
                </div>
            </div>
        </div>    
    </div>
</div>