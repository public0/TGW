@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"><h4 class="pull-left">{{ Lang::get('links.users') }}</h4>
				<br>
				<br>
				</div>

				<div class="panel-body table-responsive">

					<table id="users_table" class="table table-striped">
					    <thead>
					        <tr>
					            <th id="filter_col1" data-column="0" class="text-center">
					            	{{ Lang::get('messages.type') }}<br />					            
					                <input class="column_filter col-md-10 big" id="col0_filter" type="text">
					                <span><div class="square"><input class="column_filter no" id="col0_regex" type="checkbox"></div>
					                <div class="square"><input class="column_filter no" id="col0_smart" checked="checked" type="checkbox"></div></span>	
					            </th>
					            <th id="filter_col2" data-column="1"  class="text-center">
					            	{{ Lang::get('messages.name') }}<br />					            
					                <input class="column_filter col-md-10 big" id="col1_filter" type="text">
					                <span><div class="square"><input class="column_filter no" id="col1_regex" type="checkbox"></div>
					                <div class="square"><input class="column_filter no" id="col1_smart" checked="checked" type="checkbox"></div></span>	
					            </th>
					            <th id="filter_col3" data-column="2" class="text-center">
					            	{{ Lang::get('messages.login') }}<br />					            
					                <input class="column_filter col-md-10 big" id="col2_filter" type="text">
					                <span><div class="square"><input class="column_filter no" id="col2_regex" type="checkbox"></div>
					                <div class="square"><input class="column_filter no" id="col2_smart" checked="checked" type="checkbox"></div></span>	
					            </th>
					            <th id="filter_col4" data-column="3"  class="text-center">
					            	{{ Lang::get('messages.email') }}<br />					            
					                <input class="column_filter col-md-10 big" id="col3_filter" type="text">
					                <span><div class="square"><input class="column_filter no" id="col3_regex" type="checkbox"></div>
					                <div class="square"><input class="column_filter no" id="col3_smart" checked="checked" type="checkbox"></div></span>	
					            </th>
					            <th id="filter_col5" data-column="4"  class="text-center">
					            	{{ Lang::get('messages.status') }}<br />					            
					                <input class="column_filter col-md-10 big" id="col4_filter" type="text">
					                <span><div class="square"><input class="column_filter no" id="col4_regex" type="checkbox"></div>
					                <div class="square"><input class="column_filter no" id="col4_smart" checked="checked" type="checkbox"></div></span>	
					            </th>
					            <th class="text-center col-md-2">
					            	{{ Lang::get('messages.actions') }}
					            	<br>
					            	<br>
					            </th>
					        </tr>
					    </thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection