<!-- Home -->
<div class="home">
	<div class="home_slider_container">

		<div class="home_slider_background"></div>
		<div class="home_slider_content">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-12">
						<a href="#" data-toggle="modal" data-target="#exampleModalCenter">
							<div class="shadow-overlay-round overlay-icon">
								<div class="home_logo_container">
									<img class="home_logo" src="<?= base_url(); ?>assets/images/icons/support_64.png">
									<br><h3 class="text-center">Bookings</h3>
								</div>
							</div>
						</a>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div class="home_slider_form_container mt-4">
							<form action="" id="home_search_form_1" class="home_search_form d-flex flex-lg-row flex-column align-items-center justify-content-between">
								<div class="d-flex flex-row align-items-center justify-content-start">
									<div class="dropdown">
										<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Dropdown button
										</button>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
											<a class="dropdown-item" href="#">Action</a>
											<a class="dropdown-item" href="#">Another action</a>
											<a class="dropdown-item" href="#">Something else here</a>
										</div>
									</div>
									<input type="search" class="home_search_input" placeholder="Search Catalogue" required="required">
									<button type="submit"><img src="<?= base_url(); ?>assets/images/icons/bold_search_64.png"></button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="announcement_container">
				<div class="row">
					<div class="col-md-12">
						<div id="announcement" class="text-center mt-6">
							<h1 class="mb-5">Announcement</h1>
							<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
							  <ol class="carousel-indicators">
							    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
							    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
							    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
							  </ol>
							  <div class="carousel-inner">
							    <div class="carousel-item mb-5 active">
							      <p><strong class="h5">Study Spaces During The Exam Period</strong>
									<br>
									Date: 1st October - 14th December
									<table class="ann-table-center">
										<tr>
											<th>Days</th>
											<th>Time</th>
											<th>Venues</th>
										</tr>
										<tr>
											<td>Mondays to Fridays</td>
											<td>6:00 pm - 10:00 pm</td>
											<td rowspan="2">LT 2 (Ground level, University Building)</td>
										</tr>
										<tr>
											<td>Public Holidays</td>
											<td rowspan="2">10:00 am - 6:00 pm</td>
										</tr>
										<tr>
											<td>Saturday & Sundays</td>
											<td>LT 4 (Ground level, University Building)</td>
										</tr>
									</table>
								</p>
							    </div>
							    <div class="carousel-item mb-5">
							      <p><strong class="h5">Study Spaces During The Exam Period</strong>
									<br>
									Date: 1st October - 14th December
									<table class="ann-table-center">
										<tr>
											<th>Days</th>
											<th>Time</th>
											<th>Venues</th>
										</tr>
										<tr>
											<td>Mondays to Fridays</td>
											<td>6:00 pm - 10:00 pm</td>
											<td rowspan="2">LT 2 (Ground level, University Building)</td>
										</tr>
										<tr>
											<td>Public Holidays</td>
											<td rowspan="2">10:00 am - 6:00 pm</td>
										</tr>
										<tr>
											<td>Saturday & Sundays</td>
											<td>LT 4 (Ground level, University Building)</td>
										</tr>
									</table>
								</p>
							    </div>
							    <div class="carousel-item mb-5">
							      <p><strong class="h5">Study Spaces During The Exam Period</strong>
									<br>
									Date: 1st October - 14th December
									<table class="ann-table-center">
										<tr>
											<th>Days</th>
											<th>Time</th>
											<th>Venues</th>
										</tr>
										<tr>
											<td>Mondays to Fridays</td>
											<td>6:00 pm - 10:00 pm</td>
											<td rowspan="2">LT 2 (Ground level, University Building)</td>
										</tr>
										<tr>
											<td>Public Holidays</td>
											<td rowspan="2">10:00 am - 6:00 pm</td>
										</tr>
										<tr>
											<td>Saturday & Sundays</td>
											<td>LT 4 (Ground level, University Building)</td>
										</tr>
									</table>
								</p>
							    </div>
							  </div>
							  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
							    <span class="sr-only">Previous</span>
							  </a>
							  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							    <span class="carousel-control-next-icon" aria-hidden="true"></span>
							    <span class="sr-only">Next</span>
							  </a>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-body">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	        <div class="d-flex flex-column align-items-center justify-content-center">
		        <h1 class="cover-heading">Coming Soon</h1>
	        	<p class="lead cover-copy text-dark">Bookings Page will be arriving very soon!</p>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
</div>