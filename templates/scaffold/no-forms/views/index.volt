{{ form("$plural$/index", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}
  <div class="page-header">
      <div class="row">
          <div class="col-sm-4">
              <h1>
                  $plural$
              </h1>
          </div>
          <div class="col-sm-2">{{ link_to("$plural$/new", "Create $plural$","class":"btn btn-block btn-default topten") }}</div>
          <div class="col-sm-2">{{ link_to("$plural$/index", "Clear form","class":"btn btn-block btn-default topten") }}</div>
          <div class="col-sm-2">
              {{ select_static("limit",["":"limit","10":"10","20":"20","50":"50"],"class":"form-control topten") }}
          </div>
          <div class="col-sm-2">{{ submit_button('Search', 'class': 'btn btn-success btn-block topten') }}</div>
      </div>
  </div>

  {{ content() }}

      <table class="table table-bordered">
          <thead>
              <tr>
      $searchHeader$
                  <th></th>
                  <th></th>
              </tr>
          </thead>
          <tbody>
          {% if page.items is defined %}
          {% for $singularVar$ in page.items %}
              <tr>
                  $rowColumns$
                  <td>{{ link_to("$plural$/edit/"~$singularVar$.$pk$, "Edit") }}</td>
                  <td>{{ link_to("$plural$/delete/"~$singularVar$.$pk$, "Delete") }}</td>
              </tr>
          {% endfor %}
          {% endif %}
          </tbody>
      </table>
  </div>

  <div class="row">
      <div class="col-sm-1">
          <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
              {{ page.current~"/"~page.total_pages }}
          </p>
      </div>
      <div class="col-sm-11">
          <nav>
              <ul class="pagination">
                  <li>{{ link_to("$plural$/index", "First") }}</li>
                  <li>{{ link_to("$plural$/index?page="~page.before, "Previous") }}</li>
                  <li>{{ link_to("$plural$/index?page="~page.next, "Next") }}</li>
                  <li>{{ link_to("$plural$/index?page="~page.last, "Last") }}</li>
              </ul>
          </nav>
      </div>
  </div>
</form>
