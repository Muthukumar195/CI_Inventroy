<!-- start jquery validation -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.validate.css" />

<script src="<?php echo base_url(); ?>assets/js/jquery_validation/jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery_validation/jquery.validate.js" type="text/javascript">
</script>
<script src="<?php echo base_url(); ?>assets/js/jquery_validation/jquery.validation.functions.js" type="text/javascript">
</script>

<script type="text/javascript">
/* <![CDATA[ */
jQuery(function(){
	
	//jQuery("#cus_type").validate({
    //expression: "if (isChecked(SelfID)) return true; else return false;",
    // message: "Please select a radio button"
     // });	
	jQuery("#pro_name").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a Product name"
	});
	jQuery("#company").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a Company name"
	});
    jQuery("#b_price").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter Base Price"
	});
	
	jQuery("#o_price").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter Our Price"
	});
  
	jQuery("#vat").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a TAX"
	});
		
	jQuery("#desc").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a Product Description"
	});
	 	
			
});
            /* ]]> */		
			
function checkInt(obj)
{
	if(obj.value*1 - obj.value*1!=0)
		{obj.value="";}
	
	if(obj.value.indexOf(" ",0)!=-1)
		{
		obj.value="";
		alert ("No Spaces Allowed");	
		obj.focus();
		obj.value="";
		}
}


</script>        
<!-- end jquery validation -->