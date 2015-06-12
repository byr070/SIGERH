function outputUpdateTrabajo(number) {
    document.querySelector('#daysTrabajo').value = number;
}

function outputUpdateDescanso(number) {
    document.querySelector('#daysDescanso').value = number;
}

function outputUpdateSueldo(number) {
    document.querySelector('#sueldoInput').value = number;
}

function outputUpdateExtrasCincuenta(number){
	document.querySelector('#horasCincuenta').value = number;
}

function outputUpdateExtrasCien(number){
	document.querySelector('#horasCien').value = number;
}

function outputUpdateExtrasCien(number){
	document.querySelector('#horasCien').value = number;
}

function outputUpdateComision(number){
	document.querySelector('#comision').value = number;
}

function outputUpdateQuirografario(number){
	document.querySelector('#quirografario').value = number;
}

function outputUpdateAnticipo(number){
	document.querySelector('#anticipo').value = number;
}

$(function () {

    var save_and_close = false;

    $('#save-and-go-back-button').click(function(){
        save_and_close = true;

        $('#crudForm').trigger('submit');
    });

    $('#crudForm').submit(function(){
        var my_crud_form = $(this);

        $(this).ajaxSubmit({
            url: validation_url,
            dataType: 'json',
            cache: 'false',
            beforeSend: function(){
                $("#FormLoading").show();
            },
            success: function(data){
                $("#FormLoading").hide();
                if(data.success)
                {
                    $('#crudForm').ajaxSubmit({
                        dataType: 'text',
                        cache: 'false',
                        beforeSend: function(){
                            $("#FormLoading").show();
                        },
						success: function(result){

							$("#FormLoading").fadeOut("slow");
							data = $.parseJSON( result );
							if(data.success)
							{
								var data_unique_hash = my_crud_form.closest(".flexigrid").attr("data-unique-hash");

								$('.flexigrid[data-unique-hash='+data_unique_hash+']').find('.ajax_refresh_and_loading').trigger('click');

								if(save_and_close)
								{
									if ($('#save-and-go-back-button').closest('.ui-dialog').length === 0) {
										window.location = data.success_list_url;
									} else {
										$(".ui-dialog-content").dialog("close");
										success_message(data.success_message);
									}

									return true;
								}

								form_success_message(data.success_message);
							}
							else
							{
								form_error_message(message_update_error);
							}
						},
						error: function(){
							form_error_message( message_update_error );
						}
					});
				}
				else
				{
                    $('.has-error').removeClass('has-error');

					$('#report-error').slideUp('fast');
					$('#report-error').html(data.error_message);
					$.each(data.error_fields, function(index,value){
						$('input[name='+index+']').closest('.form-group').addClass('has-error');
					});

					$('#report-error').slideDown('normal');
					$('#report-success').slideUp('fast').html('');

				}
			},
			error: function(){
				alert( message_update_error );
				$("#FormLoading").hide();

			}
		});
		return false;
	});

	if( $('#cancel-button').closest('.ui-dialog').length === 0 ) {

		$('#cancel-button').click(function(){

			window.location = list_url;

			return false;
		});

	}
});
