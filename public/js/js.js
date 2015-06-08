$(function() {

	$('.my-show').magnificPopup({
		type : 'image',
		closeOnContentClick : true,
	});

	$(window).blur(function(e) {
		//alert('change ?');
	});
	$(window).focus(function(e) {
	    // Do Focus Actions Here
	});

	$('.confirm').submit(function() {
		var r = confirm("Are you sure ?");
		if (r == true) {
		    return true;
		} else {
		    return false;
		}

	})

	$('#user_type_id').change(function(){
		if(this.value == 4) {
			$('#cats').show();
		} else {
			$('#cats').hide();
		}
	});

	$('#categories_table').dataTable({
		"aaSorting": [],
		"iDisplayLength" : 30,
		"paging":   true,
		"info":     false,
		"bLengthChange": false,
		"searching": 	false,
		"columnDefs": [{
	        "orderable": false,
	        "targets": -1
    	}]	
	});

	$('#quiz_questions_table').dataTable({
		"aaSorting": [],
		"iDisplayLength" : 30,
		"paging":   false,
		"info":     false,
	});
	$('#jobs_table').dataTable({
		"aaSorting": [],
		"iDisplayLength" : 30,
		"paging":   false,
		"info":     false,
		"searching": 	false,
	});

	var qat = $('#quiz_assignment_table').dataTable({
		"aaSorting": [[0, 'asc'], [5, 'desc']],
		"iDisplayLength" : 30,
		"bLengthChange": false,
		"paging":   true,
		"info":     false,
		"searching": 	false,
		"columnDefs": [{
	        "orderable": false,
	        "targets": [-1,-2]
    	}]	
	});

	$('#assignment_table').dataTable({
		"aaSorting": [],
		"iDisplayLength" : 30,
		"bLengthChange": false,
		"paging":   true,
		"info":     false,
		"searching": 	false,
		"columnDefs": [{
	        "orderable": false,
	        "targets": [-1]
    	}]	
	});

	$('#questions_table').dataTable({
		"aaSorting": [],
		"iDisplayLength" : 10,
		"bLengthChange": false,
		"paging":   true,
		"info":     false,
		"searching": 	false,
		"columnDefs": [{
	        "orderable": false,
	        "targets": -1
    	}]	
	});

	$('#quizzes_table').dataTable({
		"aaSorting": [],
		"bLengthChange": false,
		"iDisplayLength" : 30,
		"paging":   true,
		"info":     false,
		"searching": 	false,
		"columnDefs": [{
	        "orderable": false,
	        "targets": [-1,-2]
    	}]	
	});

	$('#users_table').dataTable({
		"aaSorting": [],
		"iDisplayLength" : 30,
		"paging":   false,
		"info":     false,
		"searching": 	false,
		"columnDefs": [{
	        "orderable": false,
	        "targets": [-1]
    	}]	
	});
	$('#new_intern_quiz').hide();
	$('#category_id').change(function(){
		if(this.value == 1) {
			$('#intern_quiz').show();
			$('#new_intern_quiz').show();
		} else {
			$('#intern_quiz').hide();			
			$('#new_intern_quiz').hide();
		}
	});

	$('#start_at').datepick({
		dateFormat: 'yyyy-mm-dd',
	});

	$('#end_at').datepick({
		dateFormat: 'yyyy-mm-dd',
	});

	$('#from').datepick({
		dateFormat: 'yyyy-mm-dd',
	});
	$('#to').datepick({
		dateFormat: 'yyyy-mm-dd'		
	});

	$('#test_form').on("keypress", function(e) {
	  var code = e.keyCode || e.which; 
	  if (code  == 13) {
	    e.preventDefault();
	  	var button = $(this).find('button');
	  	button.trigger('click');
	    return false;
	  }
	});

	$('.save_points').click(function() {
		var form = $(this).closest('form');
		var message = $(this).next('span');
		$.post( form.attr('action'), form.serialize())
  		.done(function( data ) {
  			if (!data[0]) {
  				message.removeClass('label-danger');	
  				message.removeClass('label-success');	
  				message.addClass('label-danger');	
  			} else {
  				message.removeClass('label-danger');	
  				message.removeClass('label-success');	
  				message.addClass('label-success');	  				
  			}
  			message.html(data[1]);
			message.fadeOut( 3000, function() {
				message.empty();
				message.removeClass('label-danger');
				message.removeClass('label-success');
				message.show();
			});
		});	
	})

	$('#countdown').countdown({
		until: $('#countdown').attr('data-time'), 
		format: 'HMS',
		onExpiry: function() {
			$('#test_form').submit();
//			window.location.replace(base_url+'/test/submit');
		}
	});
	 $('#quizzes').multiselect({
	 	maxHeight: 200,
	 	checkboxName: 'quizzes[]',
	 	includeSelectAllOption: true,
	 	enableFiltering: true,
	 	buttonWidth: '100%',
	 });

	 $('#job_officer').multiselect({
	 	maxHeight: 200,
	 	checkboxName: 'job_officer[]',
	 	includeSelectAllOption: true,
	 	enableFiltering: true,
	 	buttonWidth: '100%',
	 });

	 $('#assigned_job').multiselect({
	 	maxHeight: 200,
	 	checkboxName: 'assigned_job',
	 	includeSelectAllOption: true,
	 	enableFiltering: true,
	 	buttonWidth: '100%',
	 	onChange: function(element, checked) {
			var brands = $('#assigned_job option:selected');
	        var selected = [];
	        $(brands).each(function(index, brand){
	            selected.push([$(this).val()]);
	        });
	 	}
	 });

	 $('#category').multiselect({
	 	maxHeight: 200,
	 	checkboxName: 'categories[]',
	 	includeSelectAllOption: true,
	 	enableFiltering: true,
	 	buttonWidth: '100%',
	 });

	 $('#assigned_users').multiselect({
	 	maxHeight: 200,
	 	checkboxName: 'assigned_users[]',
	 	includeSelectAllOption: true,
	 	enableFiltering: true,
	 	buttonWidth: '100%',
	 });
	var answer_counter;
	answer_counter = parseInt($('#counter').attr('data-value'))-1;

	$('#question_type_id').change(function() {
		var str = '';
		var val;
		$( "select option:selected" ).each(function() {
			str += $(this).text() + " ";
			val = parseInt($(this).val());
	    });
		switch(val) {
		    case 1: {
		    	answer_counter = -1;
		    	$('#answers').empty();
		    	$('#answers').html('<label>Answers</label>\
		    		<span class="btn btn-default label label-success" id="add_multi">Add</span>\
		    		<span class="btn btn-default label label-danger" id="sub_multi">Subtract</span>\
		    		<div id="dynamic_multi"></div>\
		    	');
		        break;
		    }
		    case 2: {
		    	answer_counter = -1;
		    	$('#answers').empty();
		    	$('#answers').html('<label>Answers</label>\
		    		<span class="btn btn-default label label-success" id="add_single">Add</span>\
		    		<span class="btn btn-default label label-danger" id="sub_single">Subtract</span>\
		    		<div id="dynamic_multi"></div>\
		    	');		    	
		        break;
		    }
		    case 3: {
		    	answer_counter = -1;
		    	$('#answers').empty();
		    	$('#answers').html('<label>Answer</label>\
		    		<div id="dynamic_multi">\
		    		<textarea class="form-control" name="single_text"></textarea>\
		    		</div>\
		    	');
		        break;
		    }
		    case 4: {
		    	answer_counter = -1;
		    	$('#answers').empty();
		    	$('#answers').html('<label>Answers</label>\
		    		<span class="btn btn-default label label-success" id="add_multi_free">Add</span>\
		    		<span class="btn btn-default label label-danger" id="sub_multi_free">Subtract</span>\
		    		<div id="dynamic_multi"></div>\
		    	');		    	

		        break;
		    }
		    default: {
		    	alert('Unknown Answer Type');
			    break;

		    }
		}
	})
	$('#answers').on('click', '#add_multi', function() {
		++answer_counter;
		$('#dynamic_multi').append('<div id="multi_'+answer_counter+'" data-id="'+answer_counter+'">\
		<input class="form-inline" placeholder="Answer" name="multi_text[]" type="text">\
		<label for="multi_value">Correct</label>\
		<input name="multi_value['+answer_counter+']" type="hidden" value="0" id="multi_value">\
		<input class="form-inline" name="multi_value['+answer_counter+']" type="checkbox" value="1">\
		<br><br></div>\
	');
	});

	$('#answers').on('click', '#sub_multi', function() {
		$('#multi_'+answer_counter).remove();	
		--answer_counter;
	});

	$('#answers').on('click', '#add_single', function() {
		++answer_counter;
		$('#dynamic_multi').append('<div id="single_'+answer_counter+'" data-id="'+answer_counter+'">\
		<input class="form-inline" placeholder="Answer" name="single_text[]" type="text">\
		<label for="single_value">Correct</label>\
		<input class="form-inline" name="single_value" type="radio" value="'+answer_counter+'">\
		<br><br></div>\
	');
	});

	$('#answers').on('click', '#sub_single', function() {
		$('#single_'+answer_counter).remove();	
		--answer_counter;
	});

	$('#answers').on('click', '#add_multi_free', function() {
		++answer_counter;
		$('#dynamic_multi').append('<div id="single_'+answer_counter+'" data-id="'+answer_counter+'">\
		<input class="form-inline" placeholder="Answer" name="multi_free_text[]" type="text">\
		<label for="single_value">Correct</label>\
		<input class="form-inline" name="multi_free_value[]" type="text" value="">\
		<br><br></div>\
	');
	});

	$('#answers').on('click', '#sub_multi_free', function() {
		$('#single_'+answer_counter).remove();	
		--answer_counter;
	});
});