@extends('template.wongurip.template')
@section('content')

<!-- Select2 -->
<link href="themes/wong-urip/assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet">

<link href="themes/wong-urip/css/style.css" rel="stylesheet">

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Admin</h4>
				
				<hr class="m-t-0 m-b-40">
				{{ csrf_field() }}
				<div class="form-group row">
					<label class="col-sm-3 text-right control-label col-form-label">Name</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" placeholder="Name" name="name" id="name" autocomplete="off">				
					</div>
				</div>			
				
				<div class="form-group row">
					<label class="col-sm-3 text-right control-label col-form-label">Username</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off">							
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-3 text-right control-label col-form-label">Password</label>
					<div class="col-sm-6">
						<input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off" onkeypress="return angkadanhuruf(event,'+0123456789',this)">							
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 text-right control-label col-form-label">Role</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="role" name="role" placeholder="Role" autocomplete="off" onkeypress="return angkadanhuruf(event,'+0123456789',this)">							
					</div>
				</div>
				
				<div class="form-group row m-b-0">
					<div class="col-md-3"></div>
					<div class="col-md-3 m-r-5">	
						<button type="submit" id="submit_btn" class="btn btn-success waves-effect waves-light" onclick="on_save()"><i class="ti ti-save"></i> Save</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- JQuery -->
<script src="themes/wong-urip/assets/plugins/jquery/jquery.min.js"></script>

<!-- Notify -->
<script src="themes/wong-urip/assets/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- Select2 -->
<script src="themes/wong-urip/assets/plugins/select2/dist/js/select2.min.js"></script>
<script type="text/javascript">

	function on_save()
	{
		$.ajax({
			type: "POST",
			url: "{{ url('create_user') }}",
			data: {	
				"_token"	: "{{ csrf_token() }}",
				nm	    	: $("#name").val(),
				usr	        : $("#username").val(),
				pass		: $("#password").val(),
				rol	    	: $("#role").val(),
			} ,
			success:function(data){ 
				on_stay();
				$.notify({
					title: '<strong>INFORMATION!</strong>',
					message: 'Successfully.'
				},{
					type: 'success',
                    placement: {
                        from: "top",
                        align: "center"
                    }
				});
            },
            statusCode: {
				404: function() {

					$.notify({
						title: '<strong>Failed 404</strong>',
						message: 'Save Failed.'
					},{
						type: 'danger',
                        placement: {
                            from: "top",
                            align: "center"
                        }
					});

				},
				500: function() {
					$.notify({
						title: '<strong>Failed 500</strong>',
						message: 'Save Failed.'
					},{
						type: 'danger',
                        placement: {
                            from: "top",
                            align: "center"
                        }
					});
				}
			},
			complete:function () {
			}
        });
	}
	

	function on_stay() {
        var url = '{{ url('/user') }}';
        window.open(url, "_self");
    }
	
</script>


@endsection