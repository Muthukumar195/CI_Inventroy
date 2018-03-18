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
		
	jQuery("#employee_code").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a employee code"
	});
	jQuery("#emp_joining_date").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please select a joining date "
	});
	jQuery("#department_name").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please select department"
	});
	jQuery("#designation_name").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please select designation "
	});
	jQuery("#qualification").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter qualification "
	});
	jQuery("#experiences").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter experiences "
	});
	jQuery("#first_name").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a first name"
	});
    jQuery("#last_name").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a last name"
	});	
	jQuery("#dob").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please Select date of birth"
	});	
	jQuery("#gender_id").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please select a gender "
	});
	jQuery("#maritial_id").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please select a detail"
	});
	jQuery("#present_address").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a address"
	});
	
	jQuery("#con_mobile").validate({
	expression: "if (VAL.match(/^[1-9][0-9]{9}$/)) return true; else return false;",
	message: "Please enter Valid Mobile number"
	});
	jQuery("#con_email").validate({
	expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
	message: "Please enter Valid email id"
	});
	jQuery("#con_city").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a city"
	});
	jQuery("#con_pin").validate({
    expression: "if (VAL) return true; else return false;",
	 message: "Please enter a pin",
    });
	jQuery("#country").validate({
	 expression: "if (VAL) return true; else return false;",
	message: "Please select a country"
	});
	jQuery("#state").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please select a state "
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