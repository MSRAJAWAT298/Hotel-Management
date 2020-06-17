{% extends 'layout.tpl' %}
{% block title%} Hotels Details{% endblock %}
{% block breadcrumb %}
<li class="breadcrumb-item"><a href="{{paths.home_path}}search_hotel">Hotels List</a></li>
<li class="breadcrumb-item"><a href="#">Hotel Details</a></li>
{% endblock%}

{% import "macro_form.tpl" as form %}
{% block sidebar %}   
    <div class="card mt-5">
          <div class="card-header" id="headingOne">
                <h3> Ad showing here </h3>
          </div>
              <div class="card-body">
                 comming soon 
              </div>
                  
          </div>
{% endblock %}

{% block middle_content %}             
<div class="col-lg-12">
  <div id="accordion">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h2 class="mb-0">Hotel Details</h2>
      </div>

      {% for value in data %}
        <div class="col-lg-12 col-md-6  mb-4">
          <div class="card h-100">
            <a href="#">
              <img class="img-fluid w-100" src="{{ paths.Hotel_images~"/" ~ value.hotel_id ~ "/" ~ value.hotel_small_pic}}"> 
            </a>
          <div class="card-body">
            <h4 class="card-title">Hotel Name: 
              <a href="#">
                {{ value.hotel_title }}
              </a>
            </h4>
            <h5 class="text-warning"> Details: </h5>
              <p class="card-text">  {{ value.hotel_long_desc }}</p>
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
</div>
<script>
///////////////////////////////////////////////////////////////////////////////
//////////// J Q U E R Y F U N C T I O N S////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////

$(document).ready(function(){
$(document).on('change','#search',function(){   
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
  
  
});
</script>
{% endblock%}
