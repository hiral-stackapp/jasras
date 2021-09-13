(function($){
	$('.chosen-select').chosen({
		disable_search_threshold: 1,
		max_selected_options: 10,
		no_results_text: "Oops, nothing found!",
	});

	$('.form-add-job #submit').prop('disabled', true);

})(jQuery);

$(document).ready(function() {

	// Disable SAVE on change
	$(document.body).delegate('.form-add-job input[type=text], .form-add-job select', 'keyup blur update change', function(e) {
		$('.form-add-job #submit').prop('disabled', true);
	});

	$(document.body).delegate('.form-add-job #calculate', 'click', function(e) {
		e.preventDefault();

		// Update Print Size on Square Feet
		$value = '0';
		$value = ( $('#prnt_size_w_in').val() * $('#prnt_size_l_in').val() ) / 144 ;
		$('#prnt_size_sqft').val( $value.toFixed(2) );

		// Update Total Printable Sq. Ft.
		$value = '0';
		$value = ( $('#prnt_size_w_in').val() * $('#prnt_size_l_in').val() ) / 144 ;
		$('#total_print_sqft').val( ( $value * $('#no_copies').val() ).toFixed(2) );

		// Total Waste in Sq Ft
		$value = '0';
		// $value = ( ( $('#waste_size_w_in').val() / 25.4 ) * ( $('#waste_size_l_in').val() / 25.4 ) / 144 );
		$value = ( ( $('#waste_size_w_in').val() ) * ( $('#waste_size_l_in').val() ) / 144 );
		$('#total_waste_sqft').val( $value.toFixed(2) );

		// Set Total Media Used Length
		$value = "0";
		$value = ( ($('#prnt_size_l_in').val() * $('#no_copies').val() ) + 3 );

		/*$('#media_used_l_in').val( $value.toFixed(2) );*/

		// Convert Total Media Used inch to feet - Width
		$value = "0";
		$value = ( $('#media_used_w_in').val() / 12 );
		$('#total_media_w_ft').val( $value.toFixed(2) );

		// Total Media Used inch to feet - Length
		$value = "0";
		$value = ( $('#media_used_l_in').val() / 12 );
		$('#total_media_l_ft').val( $value.toFixed(2) );

		// Update MEDIA TOTAL USE SQ FT
		$value = "0";
		$value = ( ($('#media_used_w_in').val() * $('#media_used_l_in').val() ) / 144 );
		$('#total_media_used_sqft').val( $value.toFixed(2) );

		// Update Total media wastage Width (AH)
		$value = "0";
		$value = $('#media_used_w_in').val() - $('#prnt_size_w_in').val();
		$('#total_media_waste_w').val( $value.toFixed(2) );

		// Update Total media wastage Height (AI)
		$value = "0";
		$value = $('#prnt_size_l_in').val();
		$('#total_media_waste_h').val( parseFloat($value).toFixed(2) );

		// Update Total media wastage Bottom (AJ)
		$value = "0";
		$value = ( $('#media_used_l_in').val() - $('#prnt_size_l_in').val() ) * $('#media_used_w_in').val();
		$('#total_media_waste_b').val( $value.toFixed(2) );

		// Update MEDIA Total Wastage in SQ FT (AK)
		$value = "0";
		$value = ( (( parseFloat($('#total_media_waste_h').val()) * parseFloat($('#total_media_waste_w').val()) ) + parseFloat($('#total_media_waste_b').val())) / parseFloat(144) ) * parseFloat($('#no_copies').val() );
		$('#total_media_wastage_sqft').val( $value.toFixed(2) );

		// Total Ink used in ML
		$value = "0";
		$value = $('#ink_used_rtl').val() * $('#no_copies').val();
		$('#total_ink_used').val( $value.toFixed(2) );

		// Total Print Time (BD)
		$value = "0";
		$value = $('#prnt_time').val() * $('#no_copies').val();
		$('#total_prnt_time').val( $value );

		// TOTAL MEDIA USED FOR PRINTING (Length)
		$value = "0";
		$value = ( ( parseInt( $('#prnt_size_l_in').val()) + parseInt(2) ) * $('#no_copies').val() );
		console.log( $value );
		$('#media_used_l_in').val( $value );

		//$('.form-add-job #calculate').trigger('click');

		$('.form-add-job #submit').prop('disabled', false);
	});


	$('#job_date').datepicker({
		language: 'en',
		todayButton: true,
		clearButton: true,
		today: 'Today',
		clear: 'Clear',
		dateFormat: 'dd/mm/yyyy',
		firstDay: 0,
		position: 'bottom left',
	});

	$('#job_start_time').timepicker('showWidget');
	$('#job_end_time').timepicker();


	$(document.body).delegate('#export_view', 'click', function(e) {
		e.preventDefault();

		$client_id = $('#client_id option:selected').val();
		$machine_id = $('#machine_id option:selected').val();
		$year = $('#year option:selected').val();

		$action = 'view';

		console.log('client '+$client_id);
		console.log('machine '+$machine_id);
		console.log('year '+$year);
		console.log('action '+$action);

		window.open( '/export-view.php?action='+$action+'&client_id='+$client_id+'&machine_id='+$machine_id+'&year='+$year, '_blank');
	});

	$(document.body).delegate('#export_download', 'click', function(e) {
		e.preventDefault();
		console.log('click');

		$client_id = $('#client_id option:selected').val();
		$machine_id = $('#machine_id option:selected').val();
		$year = $('#year option:selected').val();

		$action = 'download';
		window.open( '/export-view.php?action='+$action+'&client_id='+$client_id+'&machine_id='+$machine_id+'&year='+$year, '_blank');
	});

	$(document.body).delegate('#deleteJob', 'click', function(e) {
		e.preventDefault();
		$data = $(this).attr('href');
		console.log( $data );
		$.confirm({
			title: 'Confirm',
			content: 'Do you really want to delete this job?',
			autoClose: 'cancel|10000',
			buttons: {
				confirm: function () {
					$.ajax({

						url: '/ajax.php'+$data,
						method: 'post',
						success: function(data) {
							$.alert('Job Deleted', function() {
								setTimeout(function(){
									window.location = '/view-jobs.php';
								}, 3000)
							});
						},
						error: function(data) {
							$.alert('Something went wrogn, please try again!')
						}
					});

				},
				cancel: function () {
					btnClass: 'btn-info'
				}
			}
		});
	});


	$(document.body).delegate('.deleteClient', 'click', function(e) {
		e.preventDefault();
		$data = $(this).attr('href');
		$clientName = $(this).attr('data-client-name');
		$rowID = $(this).attr('data-id');
		$.confirm({
			title: 'Do you really want to delete the client?',
			content: $clientName,
			autoClose: 'cancel|10000',
			buttons: {
				confirm: function () {
					$.ajax({

						url: '/ajax.php'+$data,
						method: 'post',
						success: function(data) {
							$.alert('Client Deleted', function() {
								$($rowID).remove();
							});
						},
						error: function(data) {
							$.alert('Something went wrogn, please try again!')
						}
					});

				},
				cancel: function () {
					btnClass: 'btn-info'
				}
			}
		});
	});

	$(document.body).delegate('.deleteBrand', 'click', function(e) {
		e.preventDefault();
		$data = $(this).attr('href');
		$brandName = $(this).attr('data-brand-name');
		$rowID = $(this).attr('data-id');
		$.confirm({
			title: 'Do you really want to delete the Brand?',
			content: $brandName,
			autoClose: 'cancel|10000',
			buttons: {
				confirm: function () {
					$.ajax({

						url: '/ajax.php'+$data,
						method: 'post',
						success: function(data) {
							$.alert( '<h3>Deleted</h3>' + $brandName, function() {
								$($rowID).remove();
							});
						},
						error: function(data) {
							$.alert('Something went wrogn, please try again!')
						}
					});

				},
				cancel: function () {
					btnClass: 'btn-info'
				}
			}
		});
	});









});