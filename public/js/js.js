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

	$('table').on('submit', '.confirm', function() {
		var r = confirm("Are you sure ?");
		if (r == true) {
		    return true;
		} else {
		    return false;
		}
	});

	$('#user_type_id').change(function(){
		if(this.value == 4) {
			$('#cats').show();
		} else {
			$('#cats').hide();
		}
	});

	$('#form-control').change(function(){
		if(this.value == 1) {
			$('#userr').hide();
		} else {
			$('#userr').show();
		}
	});


/*	$('#categories_table').dataTable({
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
*/

	$('#categories_table').dataTable({
		'ajax': 'ajax/get_categories',
		'columnDefs' : [
			{className: 'text-center', "targets": [ 0, 1, 2 ]}
		],
		"iDisplayLength" : 25,
		'columns' : [
			{'data' : 'name'},
			{'data' : 'technicians'},
			{'data' : 'quizzesCount'},
			{'data' : 'actions'},
		],
	});


	$('#quiz_questions_table').dataTable({
		"aaSorting": [],
		"iDisplayLength" : 30,
		"paging":   false,
		"info":     false,
	});
/*	$('#jobs_table').dataTable({
		"aaSorting": [],
		"iDisplayLength" : 30,
		"paging":   false,
		"info":     false,
		"searching": 	false,
	});
*/

	$('#jobs_table').dataTable({
			'ajax': 'ajax/get_jobs',
			'columnDefs' : [
				{className: 'text-center', "targets": [ 0, 1, 2, 3 ]}
			],
			"iDisplayLength" : 25,
			'columns' : [
				{'data' : 'title'},
				{'data' : 'candidates'},
				{'data' : 'status'},
				{'data' : 'actions'},
			],
	});

/*	$('#quiz_assignment_table').dataTable({
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
*/

	$('#quiz_assignment_table').dataTable({
            //'ajax': base_url+'/ajax/get_assigned_quizzes/'+pathArray[pathArray.length-1],
            // Show Assignments - Quizzes only for selected job
            'ajax': base_url+'/ajax/get_assigned_quizzes/'+pathArray[pathArray.length-2]+'/'+pathArray[pathArray.length-1],
            // Show Assignments - Quizzes only for selected job
            'columnDefs' : [
                {className: 'text-center', "targets": [ 0, 1, 2, 3 ]}
            ],
            "iDisplayLength" : 25,
            'columns' : [
                {'data' : 'jobTitle'},
                {'data' : 'QuizTitle'},
                {'data' : 'userName'},
                {'data' : 'started_at'},
                {'data' : 'goal'},
                {'data' : 'score'},
                {'data' : 'gata'}, // gata
                {'data' : 'quizShow'},
                {'data' : 'actions'},
            ],
    });


/*	$('#assignment_table').dataTable({
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
*/
	$('#assignment_table').dataTable({
		'ajax': 'ajax/get_assignments',
		'columnDefs' : [
			{className: 'text-center', "targets": [ 0, 1, 2]},
			{
				"targets": [ 3 ],
				"visible": false,
				"searchable": true
			},


		],
//		"processing": true,
//        "serverSide": true,
		"iDisplayLength" : 25,
		'columns' : [
			{'data' : 'jobTitle'},
			{'data' : 'period'},
			{'data' : 'jobQuizzes'},
			{'data' : 'candidates'}
//			{'data' : 'actions'},
		],
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

/*	$('#quizzes_table').dataTable({
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
*/
	$('#quizzes_table').dataTable({
		'ajax': 'ajax/get_quizzes',
		'columnDefs' : [
			{className: 'text-center', "targets": [ 0, 1, 2, 3, 4 ]}
		],
		"iDisplayLength" : 25,
		'columns' : [
			{'data' : 'categoryName'},
			{'data' : 'name'},
			{'data' : 'updated_at'},
			{'data' : 'privileges'},
			{'data' : 'status'},
			{'data' : 'actions'}
		],
	});


/*	$('#users_table').dataTable({
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
*/

	$('#users_table').dataTable({
		'ajax': 'ajax/get_users',
		'columnDefs' : [
			{className: 'text-center', "targets": [ 0, 1, 2, 3, 4]}
		],
		"oLanguage": {
         "sSearch": "Global Search:"
       },		
		"iDisplayLength" : 25,
		'columns' : [
			{'data' : 'uType'},
			{'data' : 'fullName'},
			{'data' : 'login'},
			{'data' : 'email'},
			{'data' : 'status'},
			{'data' : 'actions'}
		],
	});


// USER SORT 
	function filterColumn ( i ) {
	    $('#users_table').DataTable().column( i ).search(
	        $('#col'+i+'_filter').val(),
	        $('#col'+i+'_regex').prop('checked'),
	        $('#col'+i+'_smart').prop('checked')
	    ).draw();
	}

    $('#users_table').dataTable();
 
    $('input.global_filter').on( 'keyup click', function () {
        filterGlobal();
    } );
 	
    $('input.column_filter').on( 'click', function (e) {
    	return false;
    } );

    $('input.column_filter').on( 'keyup ', function (e) {
    	e.preventDefault();
        filterColumn( $(this).parents('th').attr('data-column') );
    } );
// USER SORT 


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

	 function compare(a,b) {
	  if (a.label < b.label)
	    return -1;
	  if (a.label > b.label)
	    return 1;
	  return 0;
	}

	 $('#assigned_job').multiselect({
	 	maxHeight: 200,
	 	checkboxName: 'assigned_job',
	 	includeSelectAllOption: true,
	 	enableFiltering: true,
	 	buttonWidth: '100%',
	 	onChange: function(element, checked) {
			var users = $('#assigned_users');
			users.empty();
			var brands = $('#assigned_job option:selected');
	        var selected = [];
	        $(brands).each(function(index, brand){
				if($(this).val() == 1) {				
					$('#userr').hide();
					au.multiselect('refresh');
					au.val('').trigger('liszt:updated');
				} else {
					$('#userr').show();
					au.multiselect('refresh');
					au.val('').trigger('liszt:updated');
				}
	            selected.push($(this).val());
	        });

	        var assigned_users = $('#assigned_job').attr('data-users');


			$.get(assigned_users, 
				{ option : selected }, 
				function(data) {
						//console.log(data);
						//var $select = $('#down'); 
					var vData = [];
					$.each(data,function(key, v) 
					{
//						console.log(v);

						vData.push({label:v, value: key});
						users.append('<option value=' + key + '>' + v + '</option>');
					});
						vData.sort(compare);
						console.log(vData);
						au.multiselect('dataprovider', vData);
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

	 var au = $('#assigned_users').multiselect({
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
		    	
		    	$('#answers').empty();
				answer_counter = 2;//-1;

		    	$('#answers').html('<label>Answers</label>\
		    		<span class="btn btn-default label label-success" id="add_multi">Add</span>\
		    		<span class="btn btn-default label label-danger" id="sub_multi">Subtract</span>\
		    		<div id="dynamic_multi">\
		    			<div id="multi_0" data-id="0">\
							<input class="form-inline" placeholder="Answer" name="multi_text[]" type="text">\
							<label for="multi_value[]">Correct</label>\
							<input name="multi_value[0]" type="hidden" value="0">\
							<input class="form-inline" name="multi_value[0]" type="checkbox" value="1">\
						<br><br>\
						</div>\
						<div id="multi_1" data-id="1">\
							<input class="form-inline" placeholder="Answer" name="multi_text[]" type="text">\
							<label for="multi_value[]">Correct</label>\
							<input name="multi_value[1]" type="hidden" value="0">\
							<input class="form-inline" name="multi_value[1]" type="checkbox" value="1">\
						<br><br>\
						</div>\
						<div id="multi_2" data-id="2">\
							<input class="form-inline" placeholder="Answer" name="multi_text[]" type="text">\
							<label for="multi_value[]">Correct</label>\
							<input name="multi_value[2]" type="hidden" value="0">\
							<input class="form-inline" name="multi_value[2]" type="checkbox" value="1">\
						<br><br>\
						</div>\
					</div>\
		    	');
		        break;
		    }
		    case 2: {
		    	answer_counter = 1;//-1;
		    	$('#answers').empty();
		    	$('#answers').html('<label>Answers</label>\
		    		<span class="btn btn-default label label-success" id="add_single">Add</span>\
		    		<span class="btn btn-default label label-danger" id="sub_single">Subtract</span>\
		    		<div id="dynamic_multi">\
			    		<div data-id="0" id="single_0">\
			    			<input type="text" name="single_text[]" placeholder="Answer" class="form-inline">\
			    			<label for="single_value">Correct</label>\
			    			<input type="radio" value="0" name="single_value" class="form-inline">\
			    			<br><br>\
			    		</div>\
			    		<div data-id="1" id="single_1">\
			    			<input type="text" name="single_text[]" placeholder="Answer" class="form-inline">\
			    			<label for="single_value">Correct</label>\
			    			<input type="radio" value="1" name="single_value" class="form-inline">\
			    			<br><br>\
			    		</div>\
		    		</div>\
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
		    	answer_counter = 0;//-1;
		    	$('#answers').empty();
		    	$('#answers').html('<label>Answers</label>\
		    		<span class="btn btn-default label label-success" id="add_multi_free">Add</span>\
		    		<span class="btn btn-default label label-danger" id="sub_multi_free">Subtract</span>\
		    		<div id="dynamic_multi">\
		    			<div data-id="0" id="single_0">\
		    				<input type="text" name="multi_free_text[]" placeholder="Answer" class="form-inline">\
		    				<label for="single_value">Correct</label>\
		    				<input type="text" value="" name="multi_free_value[]" class="form-inline">\
		    				<br><br>\
		    			</div>\
		    		</div>\
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
		if(answer_counter>2){
			$('#multi_'+answer_counter).remove();	
			--answer_counter;
		}
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
		if(answer_counter>1){
			$('#single_'+answer_counter).remove();	
			--answer_counter;
		}
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
		if(answer_counter>0){
			$('#single_'+answer_counter).remove();	
			--answer_counter;
		}
	});
	
	$('.select').click(function(event) {
        if(this.checked) { // check select status
            $('.permission').each(function() {
                this.checked = true;  //select all
            });
        }else{
            $('.permission').each(function() {
                this.checked = false; //deselect all            
            });        
        }
    });

});