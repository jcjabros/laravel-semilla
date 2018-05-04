<footer class="footer pl-5 pr-5 mt-5" id="footer">
  <hr>
        <div class="row">
          <div class="col-lg-3">
            @guest
            {!! Form::open(array('url' => '/subscribe', 'class' => 'subscribe-form', 'role' =>'form')) !!}
        
            <div class="form-group">
              <label class="sr-only" for="mce-EMAIL">Email address</label>
              <input type="email" name="subscribe_email" class="form-control" id="mce-EMAIL" placeholder="Enter email" required>
              <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
              <div style="position: absolute; left: -5000px;"><input type="text" name="b_168a366a98d3248fbc35c0b67_73d49e0d23" value=""></div>
            </div>
            <div class="form-group"><input type="submit" value="Subscribe" name="subscribe" id="subscribe" class="btn btn-dark float-right"></div>
            {!! Form::close() !!}
            @endguest
            <br>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mb-2"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
            <small class="d-block mb-3 text-muted">&copy; 2017-2018</small>
          </div>
          <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-3 text-center">
                    <h5>Resources</h5>
                    <ul class="list-unstyled text-small">
                      <li><a class="text-muted" href="#">Resource</a></li>
                      <li><a class="text-muted" href="#">Resource name</a></li> 
                      <li><a class="text-muted" href="#">Another resource</a></li>
                      <li><a class="text-muted" href="#">Final resource</a></li>
                    </ul>
                  </div>
                  <div class="col-lg-3 text-center">
                    <h5>Resources</h5>
                    <ul class="list-unstyled text-small">
                      <li><a class="text-muted" href="#">Business</a></li>
                      <li><a class="text-muted" href="#">Education</a></li>
                      <li><a class="text-muted" href="#">Government</a></li>
                      <li><a class="text-muted" href="#">Gaming</a></li>
                    </ul>
                  </div>
                  <div class="col-lg-3 text-center">
                    <h5>Menu</h5>
                    <ul class="list-unstyled text-small">
                      <li><a class="text-muted" href="{{ Request::is('/') ? '#about' : '/#about' }}">About</a></li>
                      <li><a class="text-muted" href="{{ Request::is('/') ? '#services' : '/#services' }}">Services</a></li>
                      <li><a class="text-muted" href="/projects">Projects</a></li>
                      <li><a class="text-muted" href="{{ Request::is('/') ? '#contact' : '/#contact' }}">Contact</a></li>
                    </ul>
                  </div>
            </div>
          </div>
        </div>
      </footer>
      <script type="text/javascript">
          $('#subscribe').click(function(e){
               e.preventDefault(); // this prevents the form from submitting
            $.ajax({
              url: '/subscribe',
              type: "post",
              data: {'subscribe_email':$('input[name=subscribe_email]').val(), '_token': $('input[name=_token]').val()},
              dataType: 'JSON',
              success: function (data) {
                console.log(data); // this is good
              }
            });
          });
      </script>     