<div id="contact" class="container mt-5 mb-5">
        <h1 class="mr-lg-5 mb-4 text-center text-uppercase">Contact us</h1>
        {!! Form::open(['action' => 'ContactController@submit', 'method' => 'POST']) !!}
        <div class="form-row">
          <div class="col-md-4 mb-3">
            <label for="validationDefault01">First name</label>
            <input name="firstName" type="text" class="form-control" id="validationDefault01" placeholder="John"required>
          </div>
          <div class="col-md-4 mb-3">
            <label for="validationDefault02">Last name</label>
            <input name="lastName" type="text" class="form-control" id="validationDefault02" placeholder="Ibarra" required>
          </div>
          <div class="col-md-4 mb-3">
            <label for="inputEmail4">E-mail</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend2">@</span>
              </div>
              <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="E-mail" aria-describedby="inputGroupPrepend2" required>
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6">
              <label for="validationDefault03">Company Name</label>
              <input name="company" type="text" class="form-control" id="validationDefault03" placeholder="JC&JA Bros.">
          </div>
          <div class="col-md-6">
              <label for="validationDefault03">Scope of Work</label>
              <input name="scope" type="text" class="form-control" id="validationDefault03" placeholder="Website Desing" required>
            </div>
        </div>
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="validationDefault03">City</label>
            <input name="city" type="text" class="form-control" id="validationDefault03" placeholder="City" required>
          </div>
          <div class="col-md-3 mb-3">
            <label for="validationDefault04">State</label>
            <input name="state" type="text" class="form-control" id="validationDefault04" placeholder="State" required>
          </div>
          <div class="col-md-3 mb-3">
            <label for="validationDefault05">Zip</label>
            <input name="zip" type="text" class="form-control" id="validationDefault05" placeholder="Zip" required>
          </div>
        </div>
        <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">Comments</span>
            </div>
            <textarea name="comments" class="form-control" aria-label="With textarea"></textarea>
          </div>
          <br>
          {{Form::submit('Send', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
</div>  