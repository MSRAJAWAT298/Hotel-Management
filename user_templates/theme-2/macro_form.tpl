{% macro input(type='text', name, placeholder,class="form-control",value) %}
	<input class="{{ class }}" type="{{ type }}" name="{{ name }}" placeholder = "{{ placeholder }}"value="{{ value }}" />
{% endmacro %}

{% macro radio(name,value,class="form-control",type='radio') %}
	<input class="{{ class }}" type="{{ type }}" name="{{ name }}" value="{{ value }}" />
{% endmacro %}


{% macro range(name, min="0" ,max="10",value="" ,class="form-control",type='range') %}
	<input class="{{ class }}" type="{{ type }}"  min="{{min}}" max="{{max}}" name="{{ name }}" value="{{ value }}" />
{% endmacro %}

{% macro textarea(name,rows = 10, cols = 40,value) %}
    <textarea name="{{ name }}" rows="{{ rows }}" cols="{{ cols }}">{{ value|e }}</textarea>
{% endmacro %}

{% macro btn(type='button', name,value, class="btn btn-primary") %}
	<input class="{{ class }}" type="{{ type }}" name="{{ name }}" value="{{ value }}" />
{% endmacro %}


{% macro select(lable,name,values,class="form-control") %}
	<select class="{{ class }}" name="{{ name }}">
	<option selected disabled>{{ lable }}</option>
	{% for key, val in values %}
	<option value="{{ key }}">{{ val }}</option>
	{% endfor %}
	</select>
{% endmacro %}


{% macro error(errs) %}
	{% for key, val in errs %}
		{% if val is empty %}
			<p><span class="text-danger"> {{ key ~ " Requried." }}</span></p>
		{% endif %}
	{% endfor%}
	
{% endmacro %}