'use strict';
/* function for typehead */
(function($) {
	if($('#bst_demo_form1').length > 0){
		var form1 = $('#bst_demo_form1');
		var error1 = $('.alert-danger', form1);
		var success1 = $('.alert-success', form1);
		form1.validate({
			 errorElement: 'span', //default input error message container
			 errorClass: 'help-block help-block-error', // default input error message class
			 focusInvalid: false, // do not focus the last invalid input
			 ignore: "",  // validate all fields including form hidden input
			 messages: {
				  select_multi: {
						maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
						minlength: jQuery.validator.format("At least {0} items must be selected")
				  }
			 },
			 rules: {
				  name: {
						minlength: 2,
						required: true
				  },
				  input_group: {
						email: true,
						required: true
				  },
				  email: {
						required: true,
						email: true
				  },
				  url: {
						required: true,
						url: true
				  },
				  number: {
						required: true,
						number: true
				  },
				  digits: {
						required: true,
						digits: true
				  },
				  occupation: {
						minlength: 5,
				  },
				  select: {
						required: true
				  },
				  select_multi: {
						required: true,
						minlength: 1,
						maxlength: 3
				  }
			 },
			 invalidHandler: function (event, validator) { //display error alert on form submit              
				  success1.hide();
				  error1.show();
				  // App.scrollTo(error1, -200);
			 },
			 errorPlacement: function (error, element) { // render error placement for each input type
				  var cont = $(element).parent('.input-group');
				  if (cont) {
						cont.after(error);
				  } else {
						element.after(error);
				  }
			 },
			 highlight: function (element) { // hightlight error inputs
				  $(element)
						.closest('.form-group').addClass('has-danger'); // set error class to the control group
			 },
			 unhighlight: function (element) { // revert the change done by hightlight
				  $(element)
						.closest('.form-group').removeClass('has-danger'); // set error class to the control group
			 },
			 success: function (label) {
				  label
						.closest('.form-group').removeClass('has-danger'); // set success class to the control group
			 },
			 submitHandler: function (form) {
				  success1.show();
				  error1.hide();
			 }
		});
	}
})(jQuery);