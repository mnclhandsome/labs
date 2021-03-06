<div class="page-content-wrapper">
    <div class="page-content">        
        <div class="row">
           <div class="col-md-12">
                <div class="card card-topline-aqua">
                    <div class="card-head">
                         <header>Add Pharmacy</header>
                        <div class="tools">
                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                            <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url()?>admins/dashboard/addPharmacyDetails" method="POST" name="addPharmacy" id="addPharmacy">
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
                                    <label> Name of the Pharmacy</label>
                                    <input type="text" class="form-control" name="pharmacy_name" id="pharmacy_name" placeholder="Enter Pharmacy Name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Email Address </label>
                                    <input type="email" class="form-control" name="pharmacy_email" id="pharmacy_email" placeholder="Enter Pharmacy Email" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Password </label>
                                    <input type="password" class="form-control" name="pharmacy_password" id="pharmacy_password" placeholder="Enter Password" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Confirm Password </label>
                                    <input type="password" class="form-control" name="pharmacy_orginal_pass" id="pharmacy_orginal_pass" placeholder="reEnter Password" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label >Mobile Number</label>
                                    <input type="text" class="form-control"  name="pharmacy_phone" id="pharmacy_phone" placeholder="Enter State" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Landline / Alternate Mobile No </label>
                                    <input type="text" class="form-control"  name="pharmacy_alter_contact_no" id="pharmacy_alter_contact_no" placeholder="" required>
                                </div> 
                                <div class="form-group col-md-6">
                                    <label> GSTIN </label>
                                    <input type="text" class="form-control"  name="pharmacy_gstin" id="pharmacy_gstin" placeholder="" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label >Address</label>
                                    <input type="text" class="form-control"  name="pharmacy_address" id="pharmacy_address" placeholder="Enter Address" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label >State</label>
                                    <select name ="pharmacy_state" id="pharmacy_state" class="form-control" required>
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
                                    <input type="text" class="form-control"  name="pharmacy_counry" id="pharmacy_counry" placeholder="Enter Country" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Pincode </label>
                                    <input type="number" class="form-control"  name="pharmacy_pin_code" id="pharmacy_pin_code" placeholder="Enter PinCode" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Status </label>
                                    <select name="pharmacy_status" id="pharmacy_status" class="form-control" required>
                                        <option value="">Select</option>
                                        <option value="1">Publish</option>
                                        <option value="0">Not Publish</option>
                                    </select>
                                </div>  
                                <div class="clearfix">&nbsp;</div>
                                <div class="col-md-12 text-center">
                                        <input type="submit" value="Add Pharmacy" class="btn btn-primary">
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
<style type="text/css">
    .help-block {
        color: red;
        font-size: 15px;
    }
    #errmsg
    {
    color: red;
    }
    #errmsgs
    {
    color: red;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
<!--     <script>
        jQuery(document).ready(function($) {

            // Initialize form validation on the registration form.
            // It has the name attribute "registration"
            $("form[name='addPharmacy']").validate({
                // Specify validation rules
                rules: {
                    // The key name on the left side is the name attribute
                    // of an input field. Validation rules are defined
                    // on the right side
                    //countrycode: "required",
                    //mobile: "required",

                    name:{
                        required: true,
                        minlength: 9,
                        maxlength: 15,
                        regex: /^[A-Za-z0-9_]$/
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    rePassword: {
                        required: true,
                        minlength: 5
                    },
                    gstin: {
                        required: true,
                        minlength: 5
                    },
                    address: {
                        required: true,
                        minlength: 5
                    },
                    rePassword: {
                        required: true,
                        minlength: 5
                    },
                    rePassword: {
                        required: true,
                        minlength: 5
                    },

                },
                // Specify validation error messages
                messages: {

                    name:{
                        required: 'Alphanumeric, _, min:9, max:15',
                        regex: "Please enter any alphaNumeric char of length between 6-15, ie, sbp_arun_2016"
                    },

                    email: "Please enter a valid email address",

                    password: {
                        required: "Please provide a Password",
                        minlength: "Your password must be at least 8 characters long"

                    },
                      
                },
                // Make sure the form is submitted to the destination defined
                // in the "action" attribute of the form when valid
                submitHandler: function(form) {
                    //alert('ok');
                    form.submit();
                }
            });
        });
    </script> -->