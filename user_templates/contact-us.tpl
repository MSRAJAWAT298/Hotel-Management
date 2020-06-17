{% import "macro_form.tpl" as form %}
    <section class="contact-us" id="contact">
        <div class="continer p-5">
            <center><h2 class="pb-5">Contact us</h2></center>
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3580.7523655003224!2d78.14073521502932!3d26.172193183452194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3976c5dd7fe200cf%3A0x13cc4dbe1616eefa!2sMAYANK%20SINGH%20KUSHWAH!5e0!3m2!1sen!2sin!4v1588412649449!5m2!1sen!2sin" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="col-lg-6 col-sm-12">
                        <form class="font-weight-bold" method="POST" action="">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Name:</label> 
                                        {{ form.input('text','name','Enter name','form-control rounded') }}
                                        </div>
                                    </div>
                                 
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Enter Email:</label> 
                                        {{ form.input('email','email','Enter email','form-control rounded') }}
                                        </div>
                                    </div>   

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name">Comments:</label> 
                                                {{ form.textarea('details','5')}}
                                        </div>
                                    </div>   
                                    <div class="col-lg-6">   
                                   {% if data is not empty %}
                                        <span class="text-warning"> 
                                            {{ form.error(data)}} 
                                        </span>
                                    {% endif %}
                     {{ form.btn('submit','submit','submit','btn btn-info bg-warning') }}
                                      </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </section>