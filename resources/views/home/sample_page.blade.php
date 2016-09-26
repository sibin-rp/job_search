@extends('layouts.home')
@section('content')
  <div class="sample-page">
    <div class="login-system">
      <a class="btn btn-primary" data-toggle="modal" href="#modal-id">Trigger modal</a>
      <div class="modal fade login-modal" id="modal-id">
      	<div class="modal-dialog">
      		<div class="modal-content">
      			<div class="modal-body">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<!-- TAB NAVIGATION -->
							<ul class="nav nav-tabs login-nav clearfix" role="tablist">
								<li class="active"><a href="#tab1" role="tab" data-toggle="tab">Login</a></li>
								<li><a href="#tab2" role="tab" data-toggle="tab">Register</a></li>
							</ul>
							<!-- TAB CONTENT -->
							<div class="tab-content">
								<div class="active tab-pane fade in" id="tab1">
									<form action="">
										<div class="form-group"><label for="" class="control-label">Email</label><input type="text"
																																																 class="form-control">
										</div>
										<div class="form-group"><label for="" class="control-label">Password</label><input type="text"
																																																class="form-control">
										</div>
										<div class="form-group">
											<button class="btn btn-block btn-success">Save</button>
										</div>
									</form>
								</div>
								<div class="tab-pane fade" id="tab2">
									<h2>Tab2</h2>

									<p>Lorem ipsum.</p>
								</div>
							</div>

						</div>
      		</div><!-- /.modal-content -->
      	</div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
    </div>
  </div>
@stop