<div class="page-content-wrapper">
    <div class="page-content">
        
		<div class="row">
           <div class="col-md-12">
                <div class="card card-topline-aqua">
                    <div class="card-head">
                         <header>Add Lab</header>
                        <div class="tools">
                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                            <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                        </div>
                    </div>
                    <div class="card-body ">
                    <form action="<?php echo base_url()?>admins/dashboard/addLabDetails" method="POST" name="addPharmacy" id="addPharmacy">
                        <div class="container">
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
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label> Name of the Lab</label>
                                    <input type="text" class="form-control"  name="lab_name" id="lab_name" placeholder="Enter Name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Email Address </label>
                                    <input type="email" class="form-control"  name="lab_email" id="lab_email" placeholder="Enter Email" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Password </label>
                                    <input type="text" class="form-control"  name="lab_password" id="lab_password" placeholder="Enter Password" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Confirm Password </label>
                                    <input type="text" class="form-control"  name="lab_orginal_password" id="lab_orginal_password" placeholder="reEnter Password" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label >Mobile Number</label>
                                    <input type="text" class="form-control"  name="lab_phone" id="lab_phone" placeholder="Enter State" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Landline / Alternate Mobile No </label>
                                    <input type="text" class="form-control"  name="lab_alter_contact_no" id="lab_alter_contact_no" placeholder="" required>
                                </div> 
                                <div class="form-group col-md-6">
                                    <label> GSTIN </label>
                                    <input type="text" class="form-control"  name=" lab_gstin" id=" lab_gstin" placeholder="" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label >Address</label>
                                    <input type="text" class="form-control"  name="lab_address" id="lab_address" placeholder="Enter Address" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label >State</label>
                                    <select name="lab_state" id="lab_state" class="form-control" required>
                                        <?php $indianStates = ['AR' => 'Arunachal Pradesh',
                                        'AR' => 'Arunachal Pradesh',
                                        'AS' => 'Assam',
                                        'BR' => 'Bihar',
                                        'CT' => 'Chhattisgarh',
                                        'GA' => 'Goa',
                                        'GJ' => 'Gujarat',
                                        'HR' => 'Haryana',
                                        'HP' => 'Himachal Pradesh',
                                        'JK' => 'Jammu and Kashmir',
                                        'JH' => 'Jharkhand',
                                        'KA' => 'Karnataka',
                                        'KL' => 'Kerala',
                                        'MP' => 'Madhya Pradesh',
                                        'MH' => 'Maharashtra',
                                        'MN' => 'Manipur',
                                        'ML' => 'Meghalaya',
                                        'MZ' => 'Mizoram',
                                        'NL' => 'Nagaland',
                                        'OR' => 'Odisha',
                                        'PB' => 'Punjab',
                                        'RJ' => 'Rajasthan',
                                        'SK' => 'Sikkim',
                                        'TN' => 'Tamil Nadu',
                                        'TG' => 'Telangana',
                                        'TR' => 'Tripura',
                                        'UP' => 'Uttar Pradesh',
                                        'UT' => 'Uttarakhand',
                                        'WB' => 'West Bengal',
                                        'AN' => 'Andaman and Nicobar Islands',
                                        'CH' => 'Chandigarh',
                                        'DN' => 'Dadra and Nagar Haveli',
                                        'DD' => 'Daman and Diu',
                                        'LD' => 'Lakshadweep',
                                        'DL' => 'National Capital Territory of Delhi',
                                        'PY' => 'Puducherry'];?>
                                        <option value="">Select</option>
                                        <?php foreach ($indianStates as $key => $value) { ?>
                                            <option value="<?php echo $key;?>"><?php echo $value;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label >Country</label>
                                    <input type="text" class="form-control"  name="lab_country" id="lab_country" placeholder="Enter Country" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Pincode </label>
                                    <input type="text" class="form-control"  name="   lab_pin_code" id="lab_pin_code" placeholder="Enter PinCode" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Status </label>
                                    <select name="lab_status" id="lab_status" class="form-control" required>
                                        <option value="">Select</option>
                                        <option value="1">Publish</option>
                                        <option value="0">Not Publish</option>
                                    </select>
                                </div> 
                                <div class="clearfix">&nbsp;</div>
                                <div class="col-md-12 text-center">
                                        <input type="submit" value="Add Lab" class="btn btn-primary">
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
					<div class="clearfix">&nbsp;</div>
                </div>
            </div>
        </div>
	
    
    </div>
</div>