@extends('admin.layouts.components.management')
@section('header','Dashboard')
@section('body')
<div class="row">
	<div class="feedback col-md-7 col-xs-7">
		<div class="headFeedback">
				News Feed
				<hr>
		</div>
		<ul class="bodyFeedback">
			<li><a>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua.</a></li>
			<li><a>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua.</a></li>
			<li><a>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua.</a></li>
			<li><a>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua.</a></li>
			<li><a>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua.</a></li>
		</ul>
	</div>
	<div class="request col-md-4 col-xs-4">
		<div class="headRequest">
			Notification
			<hr>
		</div>
		<div class="bodyRequest">
			<div>
				You haven't updated your information. Please 
				<a class="btn-link linkInRequest" href="admin#/profile">Update</a> 
				it !
			</div>
			<div>
				Do you want to make some articles? Please send a 
				<a class="btn-link linkInRequest" data-toggle="modal" data-target=".bs-example-modal-lg">request</a> 
				to the admin.
			</div>
			<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
			  <div class="modal-dialog modal-lg" role="document">
			    <div class="modal-content">
				    <div class="modal-header"><h2 class="modal-title" align="center">Request to become Author </h2></div>
				    <div class="modal-body">
				    	<form>
				    		<div class="form-group">
				    			<label>Reason</label>
				    			<textarea class="form-control" rows="7" placeholder="Type something here..."></textarea>
				    		</div>
					    </form>
				    </div>
				    <div class="modal-footer">
				    	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        <button type="button" class="btn btn-primary">Save changes</button>
				    </div>
			    </div>
			  </div>
			</div>
		</div>
	</div>
</div>
@endsection