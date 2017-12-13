{{ form("$plural$/create", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="row">
  <div class="col-sm-10 hidden-xs">
      <h2 style="margin-top:0px;">
          Create $plural$
      </h2>
  </div>
  <div class="col-sm-2">
    <div class="input-group">
      <span class="input-group-btn">
        {{ submit_button('Save', 'class': 'btn btn-success btn-block btn-sm') }}
      </span>
      {{ link_to("$plural$/index", "Go back","class":"btn btn-block btn-default btn-sm") }}
    </div>
  </div>
</div>

  {{ content() }}

  $captureFields$
  {{ hidden_field("id") }}
</form>
