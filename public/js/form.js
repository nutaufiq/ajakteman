$(document).ready(function(){

	$('.reminder').on('click', function(e){

		e.preventDefault();

		var $this = $(this);

		if(!$this.hasClass('disabled'))
		{
			$this.addClass('disabled');

			$this.html('<i class="fa fa-spinner fa-spin"></i> Tunggu..');

			var url = APP_URL+'/dashboard/reminder';
			var action = $this.attr('data-action');
			var id = $this.attr('data-id');

			$.post( url, { action: action, id: id })
				.done(function( data ) 
			    {
			    	if(data.st == 'success')
			    	{
			    		$('#modalNotif-reminder-success').modal('show');

			    		$this.html('<i class="fa fa-envelope-o"></i> Ingatkan');

			    		$this.removeClass('disabled');
			    	}
			    	else
			    	{
			    		$('#modalNotif-reminder-failed').modal('show');

			    		$this.html('<i class="fa fa-envelope-o"></i> Ingatkan');

			    		$this.removeClass('disabled');
			    	}
			    });
		}

		return false;
	});

	$('.form-ajax').on('submit', function(e){
		e.preventDefault();

		$('#button-submit').button('loading');

		$('.form-message').text('');

		var $this = $(this);
	    var action = $this.attr('action');
	    var redirect = $this.attr('redirect');

	    $.post( action, $this.serialize())
		    .done(function( data ) 
		    {
			    if(data.st == 'failed')
			    {
			    	$('#button-submit').button('reset');

			        $('#message').text(data.msg);
			    }
			    else
			    {
			    	if(redirect == 'undefined' || !redirect)
			    	{
			    		$('#button-submit').button('reset');

			    		$this[0].reset();
			    		
			    		$('#message').text(data.msg);
			    	}
			    	else
			    	{
			    		if(redirect == 'modal')
			    		{
			    			$('#button-submit').button('reset');

			    			$this[0].reset();

			    			$(data.modal).modal('show');
			    		}
			    		else
			    		{
			    			$('#button-submit').button('reset');

			    			$this[0].reset();

			    			$('#message').text(data.msg);

			    			window.location.replace(redirect);
			    		}
			    	}
			    }
		    })  
		    .fail(function( data ) 
		    {
		    	$('#button-submit').button('reset');

		      	var response = JSON.parse(data.responseText);

		      	$.each( response, function( key, value) 
		      	{
		      		key = key.replace(".", "\\.");
		      		
		          	$('.form-message#'+key).text(value);
		      	});
		    });

		return false;
	});

	$('.form-ajax-file').on('submit', function(event){
		var $this = $(this);
  		var action = $this.attr('action');
	    var redirect = $this.attr('redirect');

  		event.preventDefault();
  		var formData = new FormData(this);

		$('#button-submit-file').button('loading');

		$('.form-message-file').text('');

		$.ajax({
			type: "POST",
			url: action,
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			success: function(data)
			{
				if(data.st == 'success')
				{
					if(redirect == 'undefined' || !redirect)
			    	{
			    		$('#button-submit-file').button('reset');

			    		$this[0].reset();
			    		
			    		$('#message-file').text(data.msg);
			    	}
			    	else
			    	{
			    		if(redirect == 'modal')
			    		{
			    			$('#button-submit-file').button('reset');

			    			$this[0].reset();

			    			$(data.modal).modal('show');
			    		}
			    		else
			    		{
			    			$('#button-submit-file').button('reset');

			    			$this[0].reset();

			    			$('#message-file').text(data.msg);

			    			window.location.replace(redirect);
			    		}
			    	}

					readImg(image, count, data.slot);
				}
				else
				{
					$('#button-submit-file').button('reset');

				    $('#message-file').text(data.msg);
				}
			},
			error: function(data)
			{
				$('#button-submit-file').button('reset');

		      	var response = JSON.parse(data.responseText);

		      	$.each( response, function( key, value) 
		      	{
		          	$('.form-message-file#'+key).text(value);
		      	});
			}
	  	});

		return false;
	});

	$('.form-ajax-ads').on('submit', function(e){
		e.preventDefault();

		$('#button-submit').button('loading');

		$('.form-message').text('');

		var $this = $(this);
	    var action = $this.attr('action');
	    var redirect = $this.attr('redirect');

	    $.post( action, $this.serialize())
		    .done(function( data ) 
		    {
			    if(data.st == 'failed')
			    {
			    	$('#button-submit').button('reset');

			        $('#message').text(data.msg);
			    }
			    else
			    {
			    	if(redirect == 'undefined' || !redirect)
			    	{
			    		$('#button-submit').button('reset');

			    		$this[0].reset();
			    		
			    		$('#message').text(data.msg);
			    	}
			    	else
			    	{
			    		if(redirect == 'modal')
			    		{
			    			$('#button-submit').button('reset');

			    			// $this[0].reset();

			    			$(data.modal).modal('show');
			    		}
			    		else
			    		{
			    			$('#button-submit').button('reset');

			    			$this[0].reset();

			    			$('#message').text(data.msg);

			    			window.location.replace(redirect);
			    		}
			    	}
			    }
		    })  
		    .fail(function( data ) 
		    {
		    	$('#button-submit').button('reset');

		      	var response = JSON.parse(data.responseText);

		      	$.each( response, function( key, value) 
		      	{
		      		var ids = key.split(".");

              		var id = ids[ids.length - 1];

		          	$('.form-message#'+id).text(value);
		      	});
		    });

		return false;
	});



	$('#modalNotif-advert-success').on('hidden.bs.modal', function (e) {
		window.location.replace(APP_URL+'/dashboard/pasang-iklan');
	});

	return false;
});