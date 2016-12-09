<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="{{asset('/globals/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('/css/style.css')}}">
</head>
<body style="width:100%;height:100%">
	<div class="container" style='padding-top: 20.5em'>
		<div class="row">
			<div class="col-md-12">
				<img src="{{asset('/imgs/logo.png')}}" class="img-responsive center-block" alt="" style="width:40%;height:40%">
			</div>
			<div class="col-md-12">
					<h3 class="text-center {{trans('lang.direction')}}-font">
						<span>
							{{-- <a href="/dashboard" class="btn btn-link "> --}}
							<a href="{{ url()->previous() }}" class="btn btn-link ">
								{{ trans('lang.errors.get-back') }}
							</a>
						</span>
						{{ trans('lang.errors.404') }}
					</h3>
			</div>	
			<div class="col-md-12">
				<center></center>
			</div>
		</div>
	</div>
	
</body>
</html>