(function($) {
	'use strict';
	var bstComponent = {
		NotificationToaster:function(){
		    toastr.success('Page Loaded!');
		    toastr.options.fadeIn = 300,
		    toastr.options.fadeOut = 1000,
		    toastr.options.timeOut = 2000, // 1.5s
		    $('.toastrInfo').click(function() {
		    toastr.info('info messages');
		    });
		    $('.toastrWarning').click(function() {
		    toastr.warning('warning messages');
		    });
		    $('.toastrSuccess').click(function() {
		    toastr.success('Success messages');
		    });
		    $('.toastrError').click(function() {
		    toastr.error('Danger messages');
		    });

		    var i = -1;
		    var toastCount = 0;
		    var $toastlast;

		    var getMessage = function () {
		        var msgs = ['My name is Inigo Montoya. You killed my father. Prepare to die!',
		            '<div><input class="input-small" value="textbox"/>&nbsp;<a href="http://johnpapa.net" target="_blank">This is a hyperlink</a></div><div><button type="button" id="okBtn" class="btn btn-primary">Close me</button><button type="button" id="surpriseBtn" class="btn" style="margin: 0 8px 0 8px">Surprise me</button></div>',
		            'Are you the six fingered man?',
		            'Inconceivable!',
		            'I do not think that means what you think it means.',
		            'Have fun storming the castle!'
		        ];
		        i++;
		        if (i === msgs.length) {
		            i = 0;
		        }

		        return msgs[i];
		    };

		    var getMessageWithClearButton = function (msg) {
		        msg = msg ? msg : 'Clear itself?';
		        msg += '<br /><br /><button type="button" class="btn clear">Yes</button>';
		        return msg;
		    };

		    $('.showtoast').click(function () {
		        var shortCutFunction = $(".toastTypeGroup input:radio:checked").val();
		        var msg = $('.message').val();
		        var title = $('.title').val() || '';
		        var $showDuration = $('.showDuration');
		        var $hideDuration = $('.hideDuration');
		        var $timeOut = $('.timeOut');
		        var $extendedTimeOut = $('.extendedTimeOut');
		        var $showEasing = $('.showEasing');
		        var $hideEasing = $('.hideEasing');
		        var $showMethod = $('.showMethod');
		        var $hideMethod = $('.hideMethod');
		        var toastIndex = toastCount++;
		        var addClear = $('#addClear').prop('checked');

		        toastr.options = {
		            closeButton: $('.closeButton').prop('checked'),
		            debug: $('.debugInfo').prop('checked'),
		            newestOnTop: $('#newestOnTop').prop('checked'),
		            progressBar: $('#progressBar').prop('checked'),
		            positionClass: $('.positionGroup input:radio:checked').val() || 'toast-top-right',
		            preventDuplicates: $('#preventDuplicates').prop('checked'),
		            onclick: null
		        };

		        if ($('.addBehaviorOnToastClick').prop('checked')) {
		            toastr.options.onclick = function () {
		                alert('You can perform some custom action after a toast goes away');
		            };
		        }

		        if ($showDuration.val().length) {
		            toastr.options.showDuration = $showDuration.val();
		        }

		        if ($hideDuration.val().length) {
		            toastr.options.hideDuration = $hideDuration.val();
		        }

		        if ($timeOut.val().length) {
		            toastr.options.timeOut = addClear ? 0 : $timeOut.val();
		        }

		        if ($extendedTimeOut.val().length) {
		            toastr.options.extendedTimeOut = addClear ? 0 : $extendedTimeOut.val();
		        }

		        if ($showEasing.val().length) {
		            toastr.options.showEasing = $showEasing.val();
		        }

		        if ($hideEasing.val().length) {
		            toastr.options.hideEasing = $hideEasing.val();
		        }

		        if ($showMethod.val().length) {
		            toastr.options.showMethod = $showMethod.val();
		        }

		        if ($hideMethod.val().length) {
		            toastr.options.hideMethod = $hideMethod.val();
		        }

		        if (addClear) {
		            msg = getMessageWithClearButton(msg);
		            toastr.options.tapToDismiss = false;
		        }
		        if (!msg) {
		            msg = getMessage();
		        }

		        $('#toastrOptions').text('Command: toastr["'
		                + shortCutFunction
		                + '"]("'
		                + msg
		                + (title ? '", "' + title : '')
		                + '")\n\ntoastr.options = '
		                + JSON.stringify(toastr.options, null, 2)
		        );

		        var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
		        $toastlast = $toast;

		        if(typeof $toast === 'undefined'){
		            return;
		        }

		        if ($toast.find('#okBtn').length) {
		            $toast.delegate('#okBtn', 'click', function () {
		                alert('you clicked me. i was toast #' + toastIndex + '. goodbye!');
		                $toast.remove();
		            });
		        }
		        if ($toast.find('#surpriseBtn').length) {
		            $toast.delegate('#surpriseBtn', 'click', function () {
		                alert('Surprise! you clicked me. i was toast #' + toastIndex + '. You could perform an action here.');
		            });
		        }
		        if ($toast.find('.clear').length) {
		            $toast.delegate('.clear', 'click', function () {
		                toastr.clear($toast, { force: true });
		            });
		        }
		    });

		    function getLastToast(){
		        return $toastlast;
		    }
		    $('#clearlasttoast').click(function () {
		        toastr.clear(getLastToast());
		    });
		    $('.cleartoasts').click(function () {
		        toastr.clear();
		    });
		},
		SweetAlert:function(){
			/*------------------ Sweet Alerts ----------------*/
		    if($('.sweet-1').length > 0 ) {
		        document.querySelector('.sweet-1').onclick = function(){
		            swal({
		              title: "Are you sure?",
		              text: "this imaginary file!",
		              type: "info",
		              showCancelButton: true,
		              confirmButtonClass: 'btn-primary',
		              confirmButtonText: 'Primary!'
		            });
		        };
		    }
		    if($('.sweet-2').length > 0 ) {
		        document.querySelector('.sweet-2').onclick = function(){
		            swal({
		                title: "Good job!",
		                text: "You clicked the button!",
		                type: "success",
		                showCancelButton: true,
		                confirmButtonClass: 'btn-success',
		            });
		        };
		    }
		    if($('.sweet-3').length > 0 ) {
		        document.querySelector('.sweet-3').onclick = function(){
		            swal({
		              title: "Are you sure?",
		              text: "this imaginary file!",
		              type: "warning",
		              showCancelButton: true,
		              confirmButtonClass: 'btn-warning',
		              confirmButtonText: 'warning!'
		            });
		        };
		    }
		    if($('.sweet-4').length > 0 ) {
		        document.querySelector('.sweet-4').onclick = function(){
		            swal({
		              title: "Are you sure?",
		              text: "this imaginary file!",
		              type: "info",
		              showCancelButton: true,
		              confirmButtonClass: 'btn-info',
		              confirmButtonText: 'info!'
		            });
		        };
		    }
		    if($('.sweet-5').length > 0 ) {
		        document.querySelector('.sweet-5').onclick = function(){ 
		            swal({
		            title: "Are you sure?",
		            text: "Your will not be able to recover this imaginary file!",
		            type: "warning",
		            showCancelButton: true,
		            confirmButtonClass: "btn-warning",
		            confirmButtonText: "Yes, delete it!",
		            closeOnConfirm: false
		            },
		            function(){
		              swal("Deleted!", "Your imaginary file has been deleted.", "success");
		            });
		        };
		    }
		    if($('.sweet-6').length > 0 ) {
		        document.querySelector('.sweet-6').onclick = function(){
		            swal({
		                title: "An input!",
		                text: "Write something interesting:",
		                type: "input",
		                showCancelButton: true,
		                closeOnConfirm: false,
		                inputPlaceholder: "Write something"
		                }, function (inputValue) {
		                if (inputValue === false) return false;
		                if (inputValue === "") {
		                swal.showInputError("You need to write something!");
		                return false
		                }
		                swal("Nice!", "You wrote: " + inputValue, "success");
		            });   
		        };
		    } 
		},
		MultiSelect:function(){
			/*------------- Bootstrap multiselect -------------*/
			if($('.selectstyle').length > 0){
				$('.selectstyle').multiselect({
					buttonWidth: '100%',
					buttonClass: 'btn btn-outline-inverse',
				});
			}
			
			if($('.inverse').length > 0){
				$('.inverse').multiselect({
					buttonWidth: '100%',
					buttonClass: 'btn btn-inverse',
				});
			}
			
			if($('.primary').length > 0){
				$('.primary').multiselect({
					buttonWidth: '100%',
					buttonClass: 'btn btn-primary',
				});
			}
			
			if($('.success').length > 0){
				$('.success').multiselect({
					buttonWidth: '100%',
					buttonClass: 'btn btn-success',
				});
			}
			
			if($('.warning').length > 0){
				$('.warning').multiselect({
					buttonWidth: '100%',
					buttonClass: 'btn btn-warning',
				});
			}
			
			if($('.danger').length > 0){
				$('.danger').multiselect({
					buttonWidth: '100%',
					buttonClass: 'btn btn-danger',
				});
			}
			
			if($('.info').length > 0){
				$('.info').multiselect({
					buttonWidth: '100%',
					buttonClass: 'btn btn-info',
				});
			}
			
			if($('.inverse-outline').length > 0){
				$('.inverse-outline').multiselect({
					buttonWidth: '100%',
					buttonClass: 'btn btn-outline-inverse',
				});
			}
			
			if($('.primary-outline').length > 0){
				$('.primary-outline').multiselect({
					buttonWidth: '100%',
					buttonClass: 'btn btn-outline-primary',
				});
			}
			
			if($('.success-outline').length > 0){
				$('.success-outline').multiselect({
					buttonWidth: '100%',
					buttonClass: 'btn btn-outline-success',
				});
			}
			
			if($('.warning-outline').length > 0){
				$('.warning-outline').multiselect({
					buttonWidth: '100%',
					buttonClass: 'btn btn-outline-warning',
				});
			}
			
			if($('.danger-outline').length > 0){
				$('.danger-outline').multiselect({
					buttonWidth: '100%',
					buttonClass: 'btn btn-outline-danger',
				});
			}
			
			if($('.info-outline').length > 0){
				$('.info-outline').multiselect({
				   buttonClass: 'btn btn-outline-info',
				   buttonWidth: '100%',
				});
			}
			
			if($('.inverse-rounded').length > 0){
				$('.inverse-rounded').multiselect({
				   buttonClass: 'btn btn-inverse btn-rounded',
				   buttonWidth: '100%', 
				});
			}
			
			if($('.primary-rounded').length > 0){
				$('.primary-rounded').multiselect({
				   buttonClass: 'btn btn-primary btn-rounded',
				   buttonWidth: '100%', 
				});
			}
			
			if($('.success-rounded').length > 0){
				$('.success-rounded').multiselect({
				   buttonClass: 'btn btn-success btn-rounded',
				   buttonWidth: '100%', 
				});
			}
			
			if($('.warning-rounded').length > 0){
				$('.warning-rounded').multiselect({
				   buttonClass: 'btn btn-warning btn-rounded',
				   buttonWidth: '100%', 
				});
			}
			
			if($('.danger-rounded').length > 0){
				$('.danger-rounded').multiselect({
				   buttonClass: 'btn btn-danger btn-rounded',
				   buttonWidth: '100%', 
				});
			}
			
			if($('.info-rounded').length > 0){
				$('.info-rounded').multiselect({
				   buttonClass: 'btn btn-info btn-rounded',
				   buttonWidth: '100%', 
				});
			}
			
			if($('.filter-dropdown').length > 0){
				$('.filter-dropdown').multiselect({
					enableClickableOptGroups: true,
					enableCollapsibleOptGroups: true,
					enableFiltering: true,
					includeSelectAllOption: true,
					buttonWidth: '100%',
					buttonClass: 'btn btn-outline-inverse',
				});
			}
			
			if($('.select-group').length > 0){
				$('.select-group').multiselect({
					enableClickableOptGroups: true,
					buttonWidth: '100%',
					buttonClass: 'btn btn-outline-inverse',
				});
			}
			
			if($('.clickable-filter').length > 0){
				$('.clickable-filter').multiselect({
					buttonWidth: '100%',
					buttonClass: 'btn btn-outline-inverse',
					enableFiltering: true, 
				});
			}
			
			if($('.dropright').length > 0){
				$('.dropright').multiselect({
					dropRight: true,
					buttonWidth: '100%',
					buttonClass: 'btn btn-outline-inverse',
				});
			}
			
			if($('.fixedDropdown').length > 0){
				$('.fixedDropdown').multiselect({
					buttonWidth: '80%',
					buttonClass: 'btn btn-outline-inverse',
				});
			}
			
			if($('.fixedHight').length > 0){
				$('.fixedHight').multiselect({
					buttonWidth: '100%',
					buttonClass: 'btn btn-outline-inverse',
					maxHeight: 200,
				});
			}
			
			if($('.onDropdownShow').length > 0){
				$('.onDropdownShow').multiselect({
						onDropdownShow: function(event) {
						alert('Dropdown shown.');
					},
					buttonWidth: '100%',
					buttonClass: 'btn btn-outline-inverse',
					maxHeight: 200,
				});
			}
			
			if($('.onDropdownHide').length > 0){
				$('.onDropdownHide').multiselect({
						onDropdownHide: function(event) {
						alert('Dropdown closed.');
					},
					buttonWidth: '100%',
					buttonClass: 'btn btn-outline-inverse',
				});
			}
			
			if($('.onchange').length > 0){
				$('.onchange').multiselect({
					onChange: function(option, checked, select) {
					alert('Changed option ' + $(option).val() + '.');
					},
					buttonWidth: '100%',
					buttonClass: 'btn btn-outline-inverse',
				});
			}
		},
		
		/**
		  * Function written to load Datepickers.
		**/
		DatePickers:function(){
				$('.datepicker').datepicker();
		    var startDate = new Date(2012,1,20);
		    var endDate = new Date(2012,1,25);
		    $('.datepicker-start-date').datepicker()
		        .on('changeDate', function(ev){
		            if (ev.date.valueOf() > endDate.valueOf()){
		                $('#alert').show().find('strong').text('The start date can not be greater then the end date');
		            } else {
		                $('#alert').hide();
		                startDate = new Date(ev.date);
		                $('#startDate').text($('.datepicker-start-date').data('date'));
		            }
		            $('.datepicker-start-date').datepicker('hide');
		        });
		    $('.datepicker-end-date').datepicker()
		        .on('changeDate', function(ev){
		            if (ev.date.valueOf() < startDate.valueOf()){
		                $('#alert').show().find('strong').text('The end date can not be less then the start date');
		            } else {
		                $('#alert').hide();
		                endDate = new Date(ev.date);
		                $('#endDate').text($('.datepicker-end-date').data('date'));
		            }
		        $('.datepicker-end-date').datepicker('hide');
		    });

		    // Disabling dates
		    var nowTemp = new Date();
		    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

		    var checkin = $('.datepicker-disable-date').datepicker({
		      onRender: function(date) {
		        return date.valueOf() < now.valueOf() ? 'disabled' : '';
		    }
		    }).on('changeDate', function(ev) {
		      if (ev.date.valueOf() > checkout.date.valueOf()) {
		        var newDate = new Date(ev.date)
		        newDate.setDate(newDate.getDate() + 1);
		        checkout.setValue(newDate);
		      }
		      checkin.hide();
		    }).data('datepicker');
		},
		/**
		  * Function to load  Date and Time picker
		**/
		DateTimePickers:function(){
		    $('.datetimepicker').datetimepicker({
		        weekStart: 1,
		        todayBtn:  1,
		        autoclose: 1,
		        todayHighlight: 1,
		        startView: 2,
		        forceParse: 0,
		        showMeridian: 1
		    });
		    $('.datetimepicker-date').datetimepicker({
		        weekStart: 1,
		        todayBtn:  1,
		        autoclose: 1,
		        todayHighlight: 1,
		        startView: 2,
		        minView: 2,
		        forceParse: 0
		    });
		    $('.datetimepicker-time').datetimepicker({
		        weekStart: 1,
		        todayBtn:  1,
		        autoclose: 1,
		        todayHighlight: 1,
		        startView: 1,
		        minView: 0,
		        maxView: 1,
		        forceParse: 0
		    });
		},
		/**
		  * Function to load Timepickers
		**/
		TimePickers:function(){
		//-------------- Time picker -----------------*/
		$('.timepicker-default').timepicker({
		        showInputs: false,
		    });
		    $('.timepicker-seconds').timepicker({
		        disableFocus: true,
		        showInputs: false,
		        showSeconds: true,
		        defaultValue: '12:45:30'
		    });
		    $('.timepicker-24').timepicker({
		        maxHours: 24,
		        showInputs: false,
		        showMeridian: false,
		    });
		    $('.timepicker').parent('.input-group').on('click', '.input-group-addon', function(e){
		        e.preventDefault();
		        $(this).parent('.input-group').find('.timepicker').timepicker('showWidget');
		    });
		},
		/**
		  * Function to load  Datepicker between ranges
		**/
		DateRangePickers:function(){
			/*------------- Date range Picker ----------------*/
		$('input[name="daterange"]').daterangepicker();
		    $('.dateTimerange').daterangepicker({
		        timePicker: true,
		        timePickerIncrement: 30,
		        locale: {
		            format: 'MM/DD/YYYY h:mm A'
		        }
		    });
		    var start = moment().subtract(29, 'days');
		    var end = moment();

		    function cb(start, end) {
		        $('.reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
		    }

		    $('.reportrange').daterangepicker({
		        startDate: start,
		        endDate: end,
		        ranges: {
		           'Today': [moment(), moment()],
		           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
		           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
		           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
		           'This Month': [moment().startOf('month'), moment().endOf('month')],
		           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
		        }
		    }, cb);
		    cb(start, end);
		},
		/**
		  * Function to load  Clockface picker
		**/
		ClockFace:function(){
        $('.clockface-default').clockface();  
		    $('.clockface-toggle').clockface({
		        format: 'HH:mm',
		        trigger: 'manual'
		    });
		    $('#toggle-btn').on('click',function(e){   
		        e.stopPropagation();
		        $('.clockface-toggle').clockface('toggle');
		    }); 
		    $('.clockface-inline').clockface({
		        format: 'H:mm'
		    }).clockface('show', '14:30');
		},
		
		/**
		  * Function to load  Colorpicker
		**/
		ColorPicker:function(){
			/*-------------- Color Picker ---------------------*/
			if($('.colorpicker').length > 0){
				$('.colorpicker').each( function() {
					$(this).minicolors({
						control: $(this).attr('data-control') || 'hue',
						defaultValue: $(this).attr('data-defaultValue') || '',
						format: $(this).attr('data-format') || 'hex',
						keywords: $(this).attr('data-keywords') || '',
						inline: $(this).attr('data-inline') === 'true',
						letterCase: $(this).attr('data-letterCase') || 'lowercase',
						opacity: $(this).attr('data-opacity'),
						position: $(this).attr('data-position') || 'bottom left',
						swatches: $(this).attr('data-swatches') ? $(this).attr('data-swatches').split('|') : [],
						change: function(value, opacity) {
							if( !value ) return;
							if( opacity ) value += ', ' + opacity;
							if( typeof console === 'object' ) {
								//console.log(value);
							}
						},
						theme: 'bootstrap'
					});
				});
			}
		},
		
		Init:function(){
			this.NotificationToaster();
			this.SweetAlert();
			this.MultiSelect();
			this.DatePickers();
			this.DateTimePickers();
			this.TimePickers();
			this.DateRangePickers();
			this.ClockFace();
			this.ColorPicker();
		},
	};
	bstComponent.Init();
	if($('#fileupload').length > 0){
		$('#fileupload').fileupload({
			// Uncomment the following to send cross-domain cookies:
			//xhrFields: {withCredentials: true},
			url: 'server/php/'
		});
	}
})(jQuery);