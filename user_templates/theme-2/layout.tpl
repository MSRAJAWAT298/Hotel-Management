{% include 'theme-2/header.tpl' %}
	
	{% include 'theme-2/navbar.tpl' %}

{% block fullcontainer %} Defult content {% endblock %}

		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-2 col-mg-6 mt-2">
					{% block sidebar %}	 
						sidebar 
					{% endblock %}
				</div>
				
				<div class="col-lg-10 col-mg-6 mt-5">
					<h4 class="main-title display-4">
						{% block title%} Defult Title{% endblock %}
					</h4>

					<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
					    <li class="breadcrumb-item"><a href="#">Home</a></li>
					{% block breadcrumb %}
					    <li class="breadcrumb-item"><a href="#">Defualt list</a></li>
					{% endblock%}
					  </ol>
					</nav>
					{% block middle_content %}
						<p>Defult content</p>
					{% endblock%}
				</div>
			</div>
		</div>
{% include 'footer.tpl' %}