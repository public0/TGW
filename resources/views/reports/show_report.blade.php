@extends('app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ Lang::get('links.show_report') }}</div>
				
				<?php 

				  if($countUsers >0 ){
                 	$very_bad_procent = number_format((float)(count($very_bad_users)*100/$countUsers), 2);
				    $bad_procent = number_format((float)(count($bad_users)*100/$countUsers),2);
				    $medium_procent = number_format((float)(count($medium_users)*100/$countUsers),2);
				    $good_procent = number_format((float)(count($good_users)*100/$countUsers),2);
				    $very_good_procent = number_format((float)(count($very_good_users)*100/$countUsers),2);
                 }else{
                 	$very_bad_procent = 0;
                 	$bad_procent = 0 ;
                 	$medium_procent = 0;
                 	$good_procent = 0;
                 	$very_good_procent = 0;

                 }
                 $max = max(count($very_bad_users),count($bad_users),count($medium_users),count($good_users),count($very_good_users));
                ?>
				
				  <div id="chart">
				  <ul id="numbers">
				    <li><span>100%</span></li>
				    <li><span>90%</span></li>
				    <li><span>80%</span></li>
				    <li><span>70%</span></li>
				    <li><span>60%</span></li>
				    <li><span>50%</span></li>
				    <li><span>40%</span></li>
				    <li><span>30%</span></li>
				    <li><span>20%</span></li>
				    <li><span>10%</span></li>
				    <li><span>0%</span></li>
				  </ul>
				  
				  <ul id="bars">
				    <li><div data-percentage="<?php echo $very_bad_procent;?>" class="bar"></div><span>{{ Lang::get('messages.very_bad') }}</span></li>
				    <li><div data-percentage="<?php echo $bad_procent;?>" class="bar"></div><span>{{ Lang::get('messages.bad') }}</span></li>
				    <li><div data-percentage="<?php echo $medium_procent;?>" class="bar"></div><span>{{ Lang::get('messages.medium') }}</span></li>
				    <li><div data-percentage="<?php echo $good_procent;?>" class="bar"></div><span>{{ Lang::get('messages.good') }}</span></li>
				    <li><div data-percentage="<?php echo $very_good_procent;?>" class="bar"></div><span>{{ Lang::get('messages.very_good') }}</span></li>
				    
				  </ul>
				</div>  
                <div class="panel-body">
					
 				</div>
 				<div class="panel-body">
 				<table id="report_table"  class="table table-striped">
					    <thead>
					        <tr>
					            <th class="text-center">{{ Lang::get('messages.very_bad') }}</th>
					            <th class="text-center">{{ Lang::get('messages.bad') }}</th>
					            <th class="text-center">{{ Lang::get('messages.medium') }}</th>
					            <th class="text-center">{{ Lang::get('messages.good') }}</th>
					            <th class="text-center">{{ Lang::get('messages.very_good') }}</th>
					        </tr>
					    </thead>
					         <tbody>
				        		<?php for($i = 0; $i < $max; $i++): ?>
				        			<tr>
				        				<td>{{current($very_bad_users)}}</td>
				        				<td>{{current($bad_users)}}</td>
				        				<td>{{current($medium_users)}}</td>
				        				<td>{{current($good_users)}}</td>
				        				<td>{{current($very_good_users)}}</td>
				        			</tr>
				        			<?php 
				        				unset($very_bad_users[key($very_bad_users)]);
				        				unset($bad_users[key($bad_users)]);
				        				unset($medium_users[key($medium_users)]);
				        				unset($good_users[key($good_users)]);
				        				unset($very_good_users[key($very_good_users)]);
				        			?>
				        		<?php endfor; ?>
						    </tbody>
					</table>
				</div>
 				</div>
				
				
			</div>
		</div>
	</div>
</div>
@endsection
