{{ form("$plural$/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}
  <div class="page-header">
      <div class="row">
          <div class="col-sm-8">
              <h1>
                  Edit $plural$
              </h1>
          </div>

          <div class="col-sm-2">{{ link_to("$plural$/index", "Go back","class":"btn btn-block btn-default") }}</div>
          <div class="col-sm-2">{{ submit_button('Save', 'class': 'btn btn-success btn-block') }}</div>
      </div>
  </div>

  {{ content() }}

  $captureFields$
  {{ hidden_field("id") }}
</form>
