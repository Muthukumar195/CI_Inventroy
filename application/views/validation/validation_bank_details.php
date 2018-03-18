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
	
	jQuery("#designation").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please select a employee designation"
	});
	jQuery("#emp_name").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please select a employee name"
	});
	jQuery("#bank_name").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please select a bank name"
	});
	
	jQuery("#branch").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter  a branch"
	});
	
	jQuery("#bank_address").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a bank address"
	});
	
	jQuery("#phone").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a phone numer"
	});
	
	jQuery("#ifsc_code").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a Ifsc code"
	});
	
	jQuery("#ac_no").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a account number"
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