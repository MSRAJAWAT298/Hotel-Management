<div class="col-md-4 col-lg-2 sidebar-offcanvas bg-light pl-0 mt-3" id="sidebar" role="navigation">
	<ul class="nav flex-column sticky-top pl-0 pt-5 mt-3">
		<li class="nav-item">
			<a class="nav-link" href="dasboard"><i class="fa fa-dashboard fa-2x"> Dashboard</i>
			</a>
		</li>
		<hr>  
				<!-- ADD LIST-->	
		<li class="nav-item">
            <a class="nav-link" href="#submenu1" data-toggle="collapse" data-target="#submenu1">
			   <span class="ml-5 mr-5">ADD</span>  <i class="fa fa-caret-down font-weight-bold">  </i></a><hr>
            <ul class="list-unstyled flex-column collapse" id="submenu1" aria-expanded="false">
              
		<li class="nav-item">
			<a class="nav-link" href="add_industry"><i class="fa fa-industry"> Add Industry</i>
			</a>
		</li>
		

		<li class="nav-item">
			<a class="nav-link" href="add_hotels"><i class="fa fa-bed"> Add Hotels</i>
			</a>
		</li>
		
				  
	</ul>
</li>
				<!-- View LIST-->	
		<li class="nav-item">
            <a class="nav-link" href="#submenu1" data-toggle="collapse" data-target="#submenu2">
			 <span class="ml-5 mr-5">View</span>  <i class="fa fa-caret-down font-weight-bold">  </i></a><hr>
            <ul class="list-unstyled flex-column collapse" id="submenu2" aria-expanded="false">
      <li class="nav-item">
			<a class="nav-link" href="view_industry"><i class="fa fa-list-alt"> View Industry</i>
			</a>
		</li>
		<hr>
		<li class="nav-item">
			<a class="nav-link" href="view_hotels"><i class="fa fa-list"> View Hotels</i>
			</a>
		</li>
		<hr>
	</ul>
</li>
	
		<li class="nav-item">
			<a class="nav-link btn btn-outline-light bg-primary m-3 p-1 border" href="setting"> 
				<i class="fa fa-gear pr-2"> </i> Setting
		    </a>
	 	</li>
		
		<li class="nav-item">
			<a class="nav-link btn btn-outline-light bg-danger m-3 p-1 border" href="logout"><i class="fa fa-sign-out"></i> Logout
		    </a>
	    </li>
	</ul>
</div>
<!--/col-->
<!--scripts loaded here-->
<script>
  $(document).ready(function() {
    
  $('[data-toggle=offcanvas]').click(function() {
    $('.row-offcanvas').toggleClass('active');
  });
  
});
</script>
