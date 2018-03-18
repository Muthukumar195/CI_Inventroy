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
		
	jQuery("#cus_name").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a customer name"
	});
	jQuery("#email").validate({
	expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
	message: "Please Enter Your Valid Email ID"
	});
	jQuery("#phone").validate({
     expression: "if (VAL.match(/^[1-9][0-9]{9}$/)) return true; else return false;",
	  message: "Please enter a Valid Mobile number",
    });
	jQuery("#bill_ac_no").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a bii account no"
	});
    jQuery("#address").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a address"
	});
	jQuery("#cir_no").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a circuit no"
	});
	jQuery("#cir_name").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a circuit name"
	});	
	jQuery("#speed").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a speed"
	});
	jQuery("#city").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a city"
	});
    jQuery("#file_no").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please file number"
	});
	jQuery("#pincode").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a pincode"
	});
	jQuery("#ad_note_no").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a advice note number"
	});	
	jQuery("#state").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a state"
	});	
	jQuery("#group").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a group"
	});age: "Please Select user rights type"
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