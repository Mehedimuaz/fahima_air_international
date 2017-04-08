<!-------------------START: Contact------------------->    
<div id="contactId" class="bg-teal" style="padding:50px 0px;">
  <h2 class="text-center">CONTACT</h2>
  <div class="container">
      <div class="row">
        <div class="col-sm-5">
          <p>Contact us and we'll get back to you within 24 hours.</p>
          <p><span class="glyphicon glyphicon-map-marker"></span> Chicago, US</p>
          <p><span class="glyphicon glyphicon-phone"></span> +00 1515151515</p>
          <p><span class="glyphicon glyphicon-envelope"></span> myemail@something.com</p>
        </div>
        <form id="contactFormId" class="col-sm-7 slideanim" onSubmit="return false">
          <div class="row">
            <div class="col-sm-6 form-group">
              <input class="form-control" id="name" name="q_name" placeholder="Name" type="text" required>
            </div>
            <div class="col-sm-6 form-group">
              <input class="form-control" id="email" name="q_email" placeholder="Email" type="email" required>
            </div>
          </div>
          <textarea class="form-control" id="comments" name="question" placeholder="Question" rows="5" required></textarea><br>
          <div class="row">
            <div class="col-sm-12 form-group">
              <button name="submit" value="submit" class="btn btn-default pull-right" type="button" onClick="sendContactInfo()">Send</button>
            </div>
          </div>
        </form>
      </div>
  </div>
</div>