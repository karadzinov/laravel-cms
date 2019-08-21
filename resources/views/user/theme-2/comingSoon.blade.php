<style>
	#header.translucent{
		position: absolute;
	}
</style>
<!-- -->
<section id="slider" class="fullheight" style="background:url('{{asset('assets/theme-2/demo_files/images/1200x800/18-min.jpg')}}');">
	<div class="overlay dark-5"><!-- dark overlay [0 to 9 opacity] --></div>

	<div class="display-table">
		<div class="display-table-cell vertical-align-middle">
			<div class="container text-center">

				<h1 class="mb-20 fs-40 mt-80">{{trans('general.coming-soon')}}</h1>
				<p class="fs-20 font-lato text-muted">
					{{trans('general.check-later')}}
				</p>

				{{-- <div style="max-width:550px; margin:auto; m-top:60px; m-bottom:80px;">
					<div class="countdown squared dark theme-style" data-labels="years,months,weeks,days,hour,min,sec" data-from="December 31, 2018 15:03:26"><!-- Example Date From: December 31, 2018 15:03:26 --></div>
				</div> --}}


				<div style="max-width:500px; margin:auto;">

					<form class="validate m-0" action="" method="post">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-search"></i></span>
							<input type="email" id="email" name="email" class="form-control required" placeholder="{{trans('general.search')}}">
							<span class="input-group-btn">
								<button class="btn btn-success" type="submit">{{trans('general.search')}}</button>
							</span>
						</div>
					</form>

				</div>

			</div>
		</div>

	

</section>
<!-- / -->




<!-- MODAL -->
<div id="contactModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">CONTACT US</h4>
			</div>

			<!-- AJAX CONTACT FORM USING VALIDATE PLUGIN -->
			<form class="validate m-0" action="php/contact.php" method="post">

				<!-- Modal Body -->
				<div class="modal-body">

					<fieldset>
						<input type="hidden" name="action" value="contact_send" />

						<div class="row">
							<div class="col-md-4">
								<label for="contact:name">Full Name *</label>
								<input type="text" value="" class="form-control required" name="contact[name][required]" id="contact:name">
							</div>
							<div class="col-md-4">
								<label for="contact:email">E-mail Address *</label>
								<input type="email" value="" class="form-control required" name="contact[email][required]" id="contact:email">
							</div>
							<div class="col-md-4">
								<label for="contact:phone">Phone</label>
								<input type="text" value="" class="form-control" name="contact[phone]" id="contact:phone">
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<label for="contact:subject">Subject *</label>
								<input type="text" value="" class="form-control required" name="contact[subject][required]" id="contact:subject">
							</div>
							<div class="col-md-4">
								<label for="contact_department">Department</label>
								<select class="form-control pointer" name="contact[department]">
									<option value="">--- Select ---</option>
									<option value="Marketing">Marketing</option>
									<option value="Webdesign">Webdesign</option>
									<option value="Architecture">Architecture</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="contact:message">Message *</label>
								<textarea maxlength="10000" rows="8" class="form-control required" name="contact[message]" id="contact:message"></textarea>
							</div>
						</div>

					</fieldset>

					<div class="row">
						<div class="col-md-12">
							
						</div>
					</div>

				</div>

				<!-- Modal Footer -->
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary float-left"><i class="fa fa-check"></i> SEND MESSAGE</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				</div>

			</form>
		</div>
	</div>
</div>
<!-- /MODAL -->