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
	 
	 jQuery("#cus_type").validate({
     expression: "if (isChecked(SelfID)) return true; else return false;",
     message: "Please select a Customer type"
    });	
	jQuery("#cus_name").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a customer name"
	});
	jQuery("#company").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a Company name"
	});
	jQuery("#email").validate({
	expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
	message: "Please Enter Your Valid Email ID"
	});
	jQuery("#phone").validate({
     expression: "if (VAL.match(/^[1-9][0-9]{9}$/)) return true; else return false;",
	  message: "Please enter a Valid Mobile number",
    });
    jQuery("#address").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a address"
	});
	
	jQuery("#city").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a city"
	});
  
	jQuery("#pincode").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a pincode"
	});
		
	jQuery("#state").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a state"
	});	
	jQuery("#country").validate({
	expression: "if (VAL) return true; else return false;",
	message: "Please enter a country"
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