{% extends 'layout.tpl' %}
{% block title%} Hotels{% endblock %}
{% block breadcrumb %}
<li class="breadcrumb-item"><a href="{{paths.home_path}}search_hotel">Hotel List</a></li>
{% endblock%}
{% import "macro_form.tpl" as form %}
{% block sidebar %}	
{% set class_name = "navbar-nav ml-auto  d-none d-md-block filter"  %}
  {% if sidebar == 'No' %} 
    {% set class_name = "d-none"  %} 
  {% endif %}

    <div class="card mt-5 {{class_name}}">
          <div class="card-header" id="headingOne">
                <h3> Search filter </h3>
          </div>
              <div class="card-body">
              <!--
                  <form class="font-weight-bold" method="POST" action="">
                       <div class="form-group">
                            <label for="file-input">Search by Country: </label>
                                {{ form.input('country','country','Enter country')}}
                        </div>
                        <div class="form-group">
                                {{ form.btn('submit','sumbit','search')}}
                        </div>
                  </form>
                  <form class="font-weight-bold" method="POST" action="">
                       <div class="form-group">
                            <label for="file-input">Search by State: </label>
                                {{ form.input('state','state','Enter State')}}
                        </div>
                        <div class="form-group">
                                {{ form.btn('submit','sumbit','search')}}
                        </div>
                  </form>
                  <form class="font-weight-bold" method="POST" action="">
                       <div class="form-group">
                            <label for="file-input">Search by City: </label>
                                {{ form.input('city','city','Enter city')}}
                        </div>
                        <div class="form-group">
                                {{ form.btn('submit','sumbit','search')}}
                        </div>
                  </form>
}
}
}
-->
{#============= search by room type ====================#}

                    <div class="form-group font-weight-bold">Search by Room Type
                      <div class="form-check">
                        {{ form.radio('room_type','Deluxe Room','form-check-input','checkbox')}}
                        <label class="form-check-label" for="exampleCheck1">Delux</label>
                      </div>
                      <div class="form-check">
                        {{ form.radio('room_type','Single Room','form-check-input','checkbox')}}
                        <label class="form-check-label" for="exampleCheck1">Single</label>
                      </div>
                      <div class="form-check">
                        {{ form.radio('room_type','Guest Room','form-check-input','checkbox')}}
                        <label class="form-check-label" for="exampleCheck1">Guest</label>
                      </div>
                    </div>

{#============= search by Rating ====================#}
                    <div class="form-group font-weight-bold">Search by Star Category
                      <div class="form-check">
                        {{ form.radio('rating','5','form-check-input rating','checkbox')}}
                        <label class="form-check-label" for="exampleCheck1">5-Star</label>
                      </div>
                      <div class="form-check">
                        {{ form.radio('rating','4','form-check-input rating','checkbox')}}
                        <label class="form-check-label" for="exampleCheck1">4-Star</label>
                      </div>
                      <div class="form-check">
                        {{ form.radio('rating','3','form-check-input rating','checkbox')}}
                        <label class="form-check-label" for="exampleCheck1">3-Star</label>
                      </div>
                    </div>

{#============= end search by Rating ====================#}
              </div>
                  
          </div>
{% endblock %}

{% block middle_content %}             
{% set class_name = "navbar-nav ml-auto  d-none d-md-block filter "  %}
  {% if sidebar == 'Yes' %} 
    {% set class_name = "d-none"  %} 
  {% endif %}

    <div class="card mt-5  {{class_name}}">
          <div class="card-header" id="headingOne">
                <h3> Search filter </h3>
          </div>
              <div class="card-body">
          
{#============= search by room type ====================#}

                    <div class="form-group font-weight-bold">Search by Room Type
                      <div class="form-check">
                        {{ form.radio('room_type','Deluxe Room','form-check-input','checkbox')}}
                        <label class="form-check-label" for="exampleCheck1">Delux</label>
                      </div>
                      <div class="form-check">
                        {{ form.radio('room_type','Single Room','form-check-input','checkbox')}}
                        <label class="form-check-label" for="exampleCheck1">Single</label>
                      </div>
                      <div class="form-check">
                        {{ form.radio('room_type','Guest Room','form-check-input','checkbox')}}
                        <label class="form-check-label" for="exampleCheck1">Guest</label>
                      </div>
                    </div>

{#============= search by Rating ====================#}
                    <div class="form-group font-weight-bold">Search by Star Category
                      <div class="form-check">
                        {{ form.radio('rating','5','form-check-input rating','checkbox')}}
                        <label class="form-check-label" for="exampleCheck1">5-Star</label>
                      </div>
                      <div class="form-check">
                        {{ form.radio('rating','4','form-check-input rating','checkbox')}}
                        <label class="form-check-label" for="exampleCheck1">4-Star</label>
                      </div>
                      <div class="form-check">
                        {{ form.radio('rating','3','form-check-input rating','checkbox')}}
                        <label class="form-check-label" for="exampleCheck1">3-Star</label>
                      </div>
                    </div>

{#============= end search by Rating ====================#}
              </div>
                  
          </div>

<div class="col-lg-12">
  <div id="accordion">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h2 class="mb-0">Hotel List</h2>
      </div>
      <div class="row" id="search">
        <div class="col-lg-12 mb-3">
          <div class="d-flex m-2 ">
            <div class="searchbar ml-auto">
              <input class="search_input" type="text" name="search" placeholder="Search...">
                <a href="#" class="search_icon"><i class="fa fa-search"></i></a>  
            </div>
          </div>
        </div>

      {% for value in data %}
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <a href="hotel_details/{{ value.hotel_id }}">
              <img class="img-fluid w-100" src="{{ paths.Hotel_images~"/" ~ value.hotel_id ~ "/" ~ value.hotel_small_pic}}"> 
            </a>
          <div class="card-body">
            <h4 class="card-title">Hotel Name: 
              <a href="hotel_details/{{ value.hotel_id }}">
                {{ value.hotel_title }}
              </a>
            </h4>
            <h6>{{ value.room_type }}</h6>
            <h5 class="text-warning"> Details: </h5>
              <p class="card-text">  {{ value.hotel_sort_desc }}</p>
          </div>
          <div class="card-footer">Rating: 
            {% for i in 1..value.hotel_star %}
              <span class="fa fa-star checked"></span>
            {% endfor %}
          </div>
        </div>
      </div>
    {% endfor  %}
  </div>
</div>
<!-- /.row -->
<div id="result"></div>
</div>
<script>
 ////////////////////////J Q U E R Y F U N C T I O N S////////////////

$(document).ready(function(){
$(document).on('change','.search_input',function(){   
        var name = $(this).val();
     //alert(name);  
//     $("#text-div").text(name);
      $.ajax({
          url: "", 
          type:"POST",
          data:{search_name:name},
          success: function(result){
            $("#search").html(result);
//            alert("Ajax"+result);
        }});
    });

    $(document).on('change','.form-check-input',function(){   
        var name = $(this).val();
     //alert(name);  
     $.ajax({
          url: "", 
          type:"POST",
          data:{search_element:name},
          success: function(result){
            $("#search").html(result);
            //alert("Ajax"+result);
        }});

    });

        $(document).on('change','.rating',function(){   
        var name = $(this).val();
    // alert(name);  
     $.ajax({
          url: "", 
          type:"POST",
          data:{search_rating:name},
          success: function(result){
            $("#search").html(result);
            //alert("Ajax"+result);
        }});

    });

});
</script>
{% endblock%}
