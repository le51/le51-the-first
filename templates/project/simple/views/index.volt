<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Phalcon PHP Framework</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="shortcut icon" type="image/x-icon" href="{{ url('img/favicon.ico') }}"/>
        <link rel="stylesheet" href="https://getbootstrap.com/docs/3.3/examples/dashboard/dashboard.css">
        <link rel="stylesheet" href="https://getbootstrap.com/docs/3.3/examples/sticky-footer-navbar/sticky-footer-navbar.css">
    </head>
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
                        {{ submit_button('Login', 'class':'btn btn-small') }}
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
        <div class="container-fluid">
            {{ content() }}
            ss{{this.session.auth}}
            <footer class="footer">
                <div class="container">
                    <p class="text-muted">My admin panel</p>
                </div>
            </footer>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
