<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
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
    <div class="container-fluid" style="margin-top:40px;">
        {{ content() }}
    </div>
    {{ assets.outputJs() }}
</body>
