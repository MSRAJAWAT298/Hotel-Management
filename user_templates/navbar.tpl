		<div class=" d-none d-md-block">
			<div class=" bg-light d-flex text-dark font-weight-bold ">
				<ul class="d-flex mr-5 mt-2  ">
					<li><a class="text-dark mr-2" href="7000-6361-49"><i class="fa fa-phone p-2">
							7000-6361-49</i></a></li>
					<li><a class="text-dark" href="mailto:info@example.com"><i class="fa fa-envelope p-2"> INFO@OURHOTEL.COM</i></a></li>
				</ul>

				<ul class="d-flex mr-5 ml-auto pl-2}">
					<li class="nav-item"><a class="nav-link"
								href="https://www.facebook.com/msrajawat298" target="_blank"
								title="facebook"> <i class="fa fa-facebook-square"
									style="font-size: 20px; "></i></a></li>

					<li class="nav-item"><a class="nav-link" title="Instagram" style="color:pink;"
								href="https://www.instagram.com/msrajawat298/"> <i
									class="fa fa-instagram" style="font-size: 20px; "></i></a></li>
					<li class="nav-item"><a class="nav-link" style="color:red;"
								href="https://www.youtube.com/channel/UC325gI345WdVzDYMTxIQnqw"
								title="youtube"><i class="fa fa-youtube"
									style="font-size: 20px;"></i></a></li>

					<li class="nav-item"><a class="nav-link"
								href="https://www.linkedin.com/in/msrajawat" title="linkedin"><i
									class="fa fa-linkedin" style="font-size: 20px;"></i></a></li>

					<li class="nav-item"><a class="nav-link"
								href="https://www.twitter.com/msrajawat298" title="twitter"><i
									class="fa fa-twitter" style="font-size: 20px; "></i></a></li>
				</ul>
			</div>
		</div>

		<nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top">
			<button class="navbar-toggler navbar-filter" type="button">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand ml-5" href="#">HOTEL
				<span class="text-warning"> MANAGMENT</span>
			</a>

			<button class="navbar-toggler" type="button" data-toggle="collapse"
				data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
				aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				{% set class_name = "navbar-nav ml-auto"  %}
		    	{% if navlink == 'No' %} 
					{% set class_name = "d-none"  %} 
		    	{% endif %}

				<ul class="{{class_name}}">	
					<li class="nav-item active">
						<a class="nav-link" title="Back to Main Page" href="{{ paths.home_path }}">
							<i class="fa fa-home"> HOME </i> <span class="sr-only">(current)</span>
						</a>
					</li>

					<li class="nav-item active">
						<a class="nav-link" title="Back to Main Page" href="{{ paths.home_path }}#about">
							ABOUT US
						</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" title="Back to Main Page" href="{{ paths.home_path }}#contact">
							CONTACT US
						</a>
					</li>

				</ul>
			</div>
		</nav>

<!--scripts loaded here-->
<script>
  $(document).ready(function() {
    
  $('.navbar-filter').click(function() {
    $(window).scrollTop(0);
    $('.filter').toggleClass('d-none d-md-block');
  });
  
});
</script>
