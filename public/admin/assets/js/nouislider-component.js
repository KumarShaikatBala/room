'use strict';
(function($) {
	var NoUiSliders = {
		noUiDemo1 : function(){
			if ($("#input-select"). length  > 0){
				var select = document.getElementById('input-select');
				// Append the option elements
				for ( var i = -20; i <= 40; i++ ){
	
					var option = document.createElement("option");
						option.text = i;
						option.value = i;
	
					select.appendChild(option);
				}
	
				var html5Slider = document.getElementById('nouislider');
				noUiSlider.create(html5Slider, {
					start: [ 10, 30 ],
					connect: true,
					step: 1,
					range: {
						'min': -20,
						'max': 40
					}
				});
	
				var inputNumber = document.getElementById('input-number');
				html5Slider.noUiSlider.on('update', function( values, handle ) {
	
					var value = values[handle];
	
					if ( handle ) {
						inputNumber.value = value;
					} else {
						select.value = Math.round(value);
					}
				});
	
				select.addEventListener('change', function(){
					html5Slider.noUiSlider.set([this.value, null]);
				});
	
				inputNumber.addEventListener('change', function(){
					html5Slider.noUiSlider.set([null, this.value]);
				});
			}
		},
		

		noUiDemo2 : function(){
			if($('#nouislider1').length > 0){
				// Store the locked state and slider values.
				var lockedState = false,
					lockedSlider = false,
					lockedValues = [60, 80],
					slider1 = document.getElementById('nouislider1'),
					slider2 = document.getElementById('nouislider2'),
					lockButton = document.getElementById('lockbutton'),
					slider1Value = document.getElementById('nouislider1-span'),
					slider2Value = document.getElementById('nouislider2-span');
	
				// When the button is clicked, the locked
				// state is inverted.
				lockButton.addEventListener('click', function(){
					lockedState = !lockedState;
					this.textContent = lockedState ? 'unlock' : 'lock';
				});
				noUiSlider.create(slider1, {
					start: 60,
					// Disable animation on value-setting,
					// so the sliders respond immediately.
					animate: false,
					range: {
						min: 50,
						max: 100
					}
				});
	
				noUiSlider.create(slider2, {
					start: 80,
					animate: false,
					range: {
						min: 50,
						max: 100
					}
				});
	
				slider1.noUiSlider.on('update', function( values, handle ){
					slider1Value.innerHTML = values[handle];
				});
	
				slider2.noUiSlider.on('update', function( values, handle ){
					slider2Value.innerHTML = values[handle];
				});
	
				function setLockedValues ( ) {
					lockedValues = [
						Number(slider1.noUiSlider.get()),
						Number(slider2.noUiSlider.get())
					];
				}
	
				slider1.noUiSlider.on('change', setLockedValues);
				slider2.noUiSlider.on('change', setLockedValues);
	
				// The value will be send to the other slider,
				// using a custom function as the serialization
				// method. The function uses the global 'lockedState'
				// variable to decide whether the other slider is updated.
				slider1.noUiSlider.on('slide', function( values, handle ){
					crossUpdate(values[handle], slider2);
				});
	
				slider2.noUiSlider.on('slide', function( values, handle ){
					crossUpdate(values[handle], slider1);
				});
	
				function crossUpdate ( value, slider ) {
	
					// If the sliders aren't interlocked, don't
					// cross-update.
					if ( !lockedState ) return;
	
					// Select whether to increase or decrease
					// the other slider value.
					var a = slider1 === slider ? 0 : 1, b = a ? 0 : 1;
	
					// Offset the slider value.
					value -= lockedValues[b] - lockedValues[a];
	
					// Set the value
					slider.noUiSlider.set(value);
				}
			}
		},

		noUiDemo3: function(){
			if($('#nouislider3').length > 0){
				var nonLinearSlider = document.getElementById('nouislider3');
	
				noUiSlider.create(nonLinearSlider, {
					connect: true,
					behaviour: 'tap',
					start: [ 500, 4000 ],
					range: {
						// Starting at 500, step the value by 500,
						// until 4000 is reached. From there, step by 1000.
						'min': [ 0 ],
						'10%': [ 500, 500 ],
						'50%': [ 4000, 1000 ],
						'max': [ 10000 ]
					}
				});
	
				var nodes = [
					document.getElementById('lower-value'), // 0
					document.getElementById('upper-value')  // 1
				];
	
				// Display the slider value and how far the handle moved
				// from the left edge of the slider.
				nonLinearSlider.noUiSlider.on('update', function ( values, handle, unencoded, isTap, positions ) {
					nodes[handle].innerHTML = values[handle] + ', ' + positions[handle].toFixed(2) + '%';
				});
			}
		},

		noUiDemo4: function(){
			if($('#nouislider4').length > 0){
				var keypressSlider = document.getElementById('nouislider4');
				var input0 = document.getElementById('input-with-keypress-0');
				var input1 = document.getElementById('input-with-keypress-1');
				var inputs = [input0, input1];
	
				noUiSlider.create(keypressSlider, {
					start: [20, 80],
					connect: true,
					direction: 'rtl',
					range: {
						'min': [0],
						'10%': [10, 10],
						'50%': [80, 50],
						'80%': 150,
						'max': 200
					}
				});
	
				keypressSlider.noUiSlider.on('update', function( values, handle ) {
					inputs[handle].value = values[handle];
				});
	
				function setSliderHandle(i, value) {
					var r = [null,null];
					r[i] = value;
					keypressSlider.noUiSlider.set(r);
				}
	
				// Listen to keydown events on the input field.
				inputs.forEach(function(input, handle) {
	
					input.addEventListener('change', function(){
						setSliderHandle(handle, this.value);
					});
	
					input.addEventListener('keydown', function( e ) {
	
						var values = keypressSlider.noUiSlider.get();
						var value = Number(values[handle]);
	
						// [[handle0_down, handle0_up], [handle1_down, handle1_up]]
						var steps = keypressSlider.noUiSlider.steps();
	
						// [down, up]
						var step = steps[handle];
	
						var position;
	
						// 13 is enter,
						// 38 is key up,
						// 40 is key down.
						switch ( e.which ) {
	
							case 13:
								setSliderHandle(handle, this.value);
								break;
	
							case 38:
	
								// Get step to go increase slider value (up)
								position = step[1];
	
								// false = no step is set
								if ( position === false ) {
									position = 1;
								}
	
								// null = edge of slider
								if ( position !== null ) {
									setSliderHandle(handle, value + position);
								}
	
								break;
	
							case 40:
	
								position = step[0];
	
								if ( position === false ) {
									position = 1;
								}
	
								if ( position !== null ) {
									setSliderHandle(handle, value - position);
								}
	
								break;
						}
					});
				});
			}
		},
		Init:function(){
			this.noUiDemo1();
			this.noUiDemo2();
			this.noUiDemo3();
			this.noUiDemo4();
		},
	};
	NoUiSliders.Init();
})(jQuery);