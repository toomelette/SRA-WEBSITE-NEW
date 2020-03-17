<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
  		<title>Dissemination Log</title>

		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

		<link rel="stylesheet" href="{{ asset('template/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">

		<link rel="stylesheet" href="{{ asset('template/bower_components/font-awesome/css/font-awesome.min.css') }}">

		<link rel="stylesheet" href="{{ asset('template/dist/css/AdminLTE.min.css') }}">

		<link rel="stylesheet" href="{{ asset('css/print.css') }}">

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arial">

		<style type="text/css">

		.arrow {
			position: absolute;
			overflow: hidden;
			display: inline-block;
			font-size: 3px;
			width: 3em;
			height: 3em;
			border-top: 2px solid black;
			border-right: 2px solid black ;
			transform: rotate(54deg) skew(20deg);
		}

		.no-margin{
			margin: 0px;
		}

		table{
			width: 100%;
		}
		table td,th{
			padding: 0 5px;
			border: 1px solid black !important;
		}

		table td:nth-child(3){
			width: 220px;
		}

		table td:nth-child(4){
			width: 20%;
		}

		table th{
			background-color: #179101;
			color : white;
		}

		body{
			font-size: 12px;
		}

		@media print {
			table th{
				background-color: #179101 !important;
				color : white !important;
    			-webkit-print-color-adjust: exact; 
			}
		}

		</style>
	</head>

	<body onload="window.print();"  onafterprint="window.close();">

	 	<div class="wrapper">
	 		<p class="no-margin">
				Document subject: <strong>{{$document->subject}}</strong>
			</p>
			<p class="no-margin">
				To: <strong>{{$document->person_to}}</strong>
			</p>
			<p class="no-margin">
				From: <strong>{{$document->person_from}}</strong>
			</p>

			<hr>
			@if(!empty($document->documentDisseminationLog))
				@php
					$emails = [];

					foreach ($document->documentDisseminationLog as $log) {
						
						if(!isset($emails[$log->subject.'-'.$log->content])){
							$emails[$log->subject.'-'.$log->content]['subject'] = $log->subject;
							$emails[$log->subject.'-'.$log->content]['content'] = $log->content;
							$emails[$log->subject.'-'.$log->content]['logs'][$log->slug] = $log;
						}else{
							$emails[$log->subject.'-'.$log->content]['logs'][$log->slug] = $log;
						}
						
					}

					//print("<pre>".print_r($emails,true)."</pre>");
				@endphp

				@foreach($emails as $key => $email)
					<p class="no-margin">
					Email subject: <strong>{{$email['subject']}}</strong>
					</p>

					<p class="no-margin">
						Email content: 
						<strong>
							{{$email['content']}}
						</strong>
					</p>
					<table>
						<thead>
							<tr>
								<th>Fullname</th>
								<th>Email</th>
								<th>Status</th>
								<th>Received</th>
							</tr>
						</thead>
						<tbody>
							
							@foreach($email['logs'] as $log)
								<tr>
									<td>
										{{
											$log->emailContact->name 
											or 
											$log->employee->lastname.', '.$log->employee->firstname
										}}
									</td>
									<td>{{$log->email}}</td>
									<td>
										{!!$log->status == 'SENT' ? 
											'<b>SENT</b>' : 
											'<span class="text-danger">
												<b>FAILED</b></span>'!!}
											: {{ date("M. d, 'y | h:i A",strtotime($log->sent_at)) }}</td>
									<td></td>
								</tr>
							@endforeach
						</tbody>
					</table>

					<hr>
				@endforeach


				
				
			@else

			@endif

	 	</div>
	</body>
</html>
