<!-- Home -->
<div class="home">
	<div class="banner">
		<div class="container">
			<form method="post" action="<?= base_url() ?>home/book/search" id="home_search_form_1" class="home_search_form d-flex flex-lg-row flex-column align-items-center justify-content-between">
				<!-- <div class="dropdown">
					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Dropdown button
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="#">Action</a>
						<a class="dropdown-item" href="#">Another action</a>
						<a class="dropdown-item" href="#">Something else here</a>
					</div>
				</div> -->
				<div class="search-container p-3 rounded" style="background-color: rgba(0, 0, 0, .7)">
					<p class="text-white pb-2">Search for books, articles, databases and more</p>
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search catalogue" name="searchText">
						<div class="input-group-append">
							<button class="btn btn-secondary" type="button">
								<i class="fa fa-search"></i>
							</button>
						</div>
					</div>
				</div>
			</form>
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

<style>
/* .has-search .form-control {
    padding-left: 2.375rem;
}

.has-search .form-control-feedback {
    position: absolute;
    z-index: 2;
    display: block;
    width: 2.375rem;
    height: 2.375rem;
    line-height: 2.375rem;
    text-align: center;
    pointer-events: none;
    color: #aaa;
} */
</style>