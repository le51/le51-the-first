<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          {{ link_to('','MySite','class':'navbar-brand')}}
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            {% if !session.auth %}

                {{ form('auth', 'method': 'post','class':'navbar-form navbar-right') }}
                    <div class="form-group">
                        {{password_field('password','placeholder':'Password ...','class':'form-controll')}}
                    </div>
                    {{ submit_button('Login', 'class':'btn btn-sma') }}
                {{ end_form() }}

          {% endif %}
          <ul class="nav navbar-nav navbar-right">
            <li>{{ link_to('about','About')}}</li>
            {% if session.auth %}
                <li>{{ link_to('auth','Log Out','class':'btn btn-alert')}}</li>
             {% endif %}
          </ul>
        </div>
      </div>
    </nav>
    <div class="container" style="margin-top:40px;">
      <div class="row">
        <div class="col-sm-8 blog-main">
            {{ content() }}
        </div>
        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Welcome to <em>Phalcon Quickstart</em>. You will get here a basic application skeleton coupled with a customized version of Phalcon detools. </p>
            <p>Follow the quick "Getting started" guide to know more about that and discover the pleasure of progaming with Phalcon.</p>
          </div>
          <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
              <li><a href="#">February 2014</a></li>
              <li><a href="#">January 2014</a></li>
              <li><a href="#">December 2013</a></li>
              <li><a href="#">November 2013</a></li>
              <li><a href="#">October 2013</a></li>
              <li><a href="#">September 2013</a></li>
              <li><a href="#">August 2013</a></li>
              <li><a href="#">July 2013</a></li>
              <li><a href="#">June 2013</a></li>
              <li><a href="#">May 2013</a></li>
              <li><a href="#">April 2013</a></li>
            </ol>
          </div>
          <div class="sidebar-module">
            <h4>Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <footer class="blog-footer">
  <p>Blog template built for <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
  <p>
    <a href="#">Back to top</a>
  </p>
</footer>
    {{ assets.outputJs() }}
</body>
