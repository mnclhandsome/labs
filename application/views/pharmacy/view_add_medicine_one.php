<div class="page-content-wrapper">
    <div class="page-content">        
    	<div class="row">
           <div class="col-md-12">
                <div class="card card-topline-aqua">
                    <div class="card-head">
                         <header>Upload Medicine</header>
                        <div class="tools">
                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                            <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                        </div>
                    </div>
                    <div class="card-body ">
                        <table id="saveStage" class="display" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>HSN</th>
                                    <th>MFR</th>
                                    <th>Batch No</th>
                                    <th>Medicine Name</th>
                                    <th>Medicine Type</th>
                                    <th>Exipry Date</th>
                                    <th>Medicine Dosage</th>
                                    <th>Qty</th>
                                    <th>Rate</th>
                                    <th>SGST</th>
                                    <th>CGST</th>
                                    <th>MRP</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form id="addmedicines" name="addmedicines" action="<?php echo base_url('medicine/addpost'); ?>" method="post" enctype="multipart/form-data">
                                <div class="input_fields_wrap">
                                <tr>
                                    <td><input type="text" class="form-control"  name="addmedicn[0][medicine_hsn]" id="hsn" placeholder="HSN" ></td>
                                    <td><input type="text" class="form-control"  name="addmedicn[0][medicine_mfr]" id="mfr" placeholder="MFR"></td>
                                    <td><input type="text" class="form-control"  name="addmedicn[0][medicine_batch_no]" id="batch_no" placeholder="Batch No" ></td>
                                    <td><input type="text" class="form-control"  name="addmedicn[0][medicine_name]" id="" placeholder="" ></td>
                                    <td><input type="text" class="form-control"  name="addmedicn[0][medicine_type]" id="medicine_type" placeholder="Medicine Type" ></td>
                                    <td><input type="text" class="form-control"  name="addmedicn[0][expiry_date]" id="expiry_date" placeholder="Expiry Date" ></td>
                                    <td><input type="text" class="form-control"  name="addmedicn[0][dosage]" id="dosage" placeholder="Dosage" ></td>
                                    <td><input type="text" class="form-control"  name="addmedicn[0][qty]" id="qty" placeholder="Quantity" ></td>
                                    <td><input type="text" class="form-control"  name="addmedicn[0][amount]" id="amount" placeholder="Price" ></td>
                                    <td><input type="text" class="form-control"  name="addmedicn[0][sgst]" id="sgst" placeholder="SGST" ></td>
                                    <td><input type="text" class="form-control"  name="addmedicn[0][cgst]" id="cgst" placeholder="CGST" ></td>
                                    <td><input type="text" class="form-control"  name="addmedicn[0][total]" id="total" placeholder="" ></td>
                                </tr>
                                </div>
                            </tbody>
                        </table>
                    </div>
    				<div class="clearfix">&nbsp;</div>
                    
                    <div class="text-center">
                        <div class="col-md-12">
                            <button id="add_field_button" class="add_field_button btn btn-primary">Add more Medicine</button>
                            <button class="btn btn-info">Submit</button>
                            <button class="btn btn-danger">Remove</button>
                        </div>
                        <div class="col-md-12">
                            <a href="#" class="btn btn-default">Upload Excel Sheet</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>        
    </div>
</div>
<script>
$(document).ready(function(){
    //alert('ok');

    load_data();

    function load_data()
    {
        $.ajax({
            url:"<?php echo base_url('medicine/fetch'); ?>",
            method:"POST",
            success:function(data){
                $('#customer_data').html(data);
            }
        })
    }

    $('#import_form').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url:"<?php echo base_url('medicine/import'); ?>",
            method:"POST",
            data:new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            success:function(data){
                $('#file').val('');
                load_data();
                alert(data);
            }
        })
    });
});
</script>

<script>    


function  amount_count(id,val){
    
    var amount=$('#amount'+id).val();
    var cgst=$('#sgst'+id).val();
    var sgst=$('#cgst'+id).val();
    if(amount!='' && cgst!='' && sgst!=''){
        
        var perc= (parseInt(cgst)+parseInt(sgst));
        var percent_amount= ((amount)*(perc))/100;
        var amt= (parseInt(percent_amount)+parseInt(amount));
        $('#total'+id).val(amt);
        
    }else{
        $('#total'+id).val('');
    }
    
    //alert(val);
}

   $(document).ready(function() {
     //alert('ok');
    var max_fields      = 15; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $("#add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    //var availableAttributes = [<?php //echo $medicine_lists; ?>]; 
    
    $(add_button).click(function(e){ //on add input button click
        //alert('ok');
        e.preventDefault();
        //alert('ok');
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
           $(wrapper).append("<div id='addr"+x+"'><td><input type='text' id='hsn[]' name='addmedicn["+x+"][medicine_hsn]' class='form-control'  placeholder='HSN'></td><td><input type='text' id='batch_no' name='addmedicn["+x+"][medicine_batch_no]' class='form-control'  placeholder='Batch No'></td><td><input type='text' id='medicine_othercode' name='addmedicn["+x+"][medicine_othercode]' class='form-control'  placeholder='MFR'></td><td><input type='text' id='autocomplete' name='addmedicn["+x+"][medicine_name]' class='form-control searchng'  placeholder='Medicine Name'></td><td><input type='text' id='autocomplete' name='addmedicn["+x+"][medicine_type]' class='form-control searchng'  placeholder='Medicine Type'></td><td><input type='text' id='autocomplete' name='addmedicn["+x+"][expiry_date]' class='form-control searchng'  placeholder='Expiry Date'></td><td><input type='text' id='autocomplete' name='addmedicn["+x+"][dosage]' class='form-control searchng'  placeholder='Medicine dosage'></td><td><input type='text' pattern='[0-9]' id='qty' name='addmedicn["+x+"][qty]' class='form-control'  placeholder='QTY' required></td><td><input type='text' onkeyup=amount_count("+x+",this.value);  id='amount"+x+"' pattern='[0-9]' name='addmedicn["+x+"][amount]' class='form-control'  placeholder='Amount'></td><td><input type='text' onkeyup=amount_count("+x+",this.value);  id='sgst"+x+"' name='addmedicn["+x+"][sgst]' class='form-control hero-demo'  placeholder='SGST'></td><td><input type='text' onkeyup=amount_count("+x+",this.value); id='cgst"+x+"' name='addmedicn["+x+"][cgst]' class='form-control' placeholder='CGST'></td><td><input type='text' id='total"+x+"' name='addmedicn["+x+"][total]' value='' class='form-control '  placeholder='total'></td></tr>"); 
            
            $(wrapper).find('.searchng').autocomplete({
                source: availableAttributes
            }); 
        }
    });
     $('#remobing').click(function(e){
        e.preventDefault();
        $('div#addr'+x).remove(); x--;
        })
  
    $(".searchingmedicine").autocomplete({
        source: availableAttributes
    }); 
    
});

$(document).ready(function() {
 
    $('#addmedicines').bootstrapValidator({
         framework: 'bootstrap',
        fields: {
          
             'addmedicn[0][hsn]': {
                 validators: {
                    notEmpty: {
                        message: 'Hsn is required'
                    },
                    regexp: {
                    regexp: /^[a-zA-Z0-9. ]+$/,
                    message: 'Hsn can only consist of alphanumeric, space and dot'
                    }
                }
            },
            'addmedicn[0][othercode]': {
                 validators: {
                    notEmpty: {
                        message: 'Othercode is required'
                    },
                    regexp: {
                    regexp: /^[a-zA-Z0-9. ]+$/,
                    message: 'Othercode can only consist of alphanumeric, space and dot'
                    }
                }
            },
            'addmedicn[0][medicine]': {
                 validators: {
                    notEmpty: {
                        message: 'Medicine Name is required'
                    },
                    regexp: {
                    regexp: /^[a-zA-Z0-9. ]+$/,
                    message: 'Medicine Name can only consist of alphanumeric, space and dot'
                    }
                }
            },
            'addmedicn[0][dosage]': {
                 validators: {
                    regexp: {
                    regexp: /^[a-zA-Z0-9. ]+$/,
                    message: 'Medicine dosage can only consist of alphanumeric, space and dot'
                    }
                }
            },
            'addmedicn[0][qty]': {
                 validators: {
                    notEmpty: {
                        message: 'Qty is required'
                    },
                    regexp: {
                    regexp: /^[0-9]*$/,
                    message: 'Qty can only consist digits'
                    }
                }
            },
            'addmedicn[0][amount]': {
                 validators: {
                    notEmpty: {
                        message: 'Amount is required'
                    },
                    regexp: {
                    regexp: /^[0-9]*$/,
                    message: 'Amount can only consist digits'
                    }
                }
            },
            'addmedicn[0][sgst]': {
                 validators: {
                    notEmpty: {
                        message: 'sgst is required'
                    },
                      between: {
                            min: 0,
                            max: 100,
                            message: 'The percentage of sgst must be between 0 and 100'
                        }
                }
            },
            'addmedicn[0][cgst]': {
                 validators: {
                    notEmpty: {
                        message: 'cgst is required'
                    },
                     between: {
                            min: 0,
                            max: 100,
                            message: 'The percentage of cst must be between 0 and 100'
                        }
                }
            },
           'addmedicn[0][other]': {
                validators: {
                    notEmpty: {
                        message: 'Other is required'
                    },
                    regexp: {
                    regexp: /^[a-zA-Z0-9. ]+$/,
                    message: 'Others can only consist of alphanumeric, space and dot'
                    }
                }
            }
            }
        
    })
     
});
   </script> 