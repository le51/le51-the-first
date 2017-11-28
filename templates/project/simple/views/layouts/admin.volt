<div class="row">
    <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            {% for controller in controllers %}
                <li {% if this.router.getControllerName() == controller %} class="active"{% endif %}>
                    {{ link_to(controller,controller) }}
                </li>
            {% endfor %}
          </ul>
          s:{{session.auth}}
    </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          {{content()}}
    </div>
</div>
