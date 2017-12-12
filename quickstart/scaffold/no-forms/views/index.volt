{{ form("$plural$/index", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

        <div class="row">
          <div class="col-sm-9 hidden-xs">
              <h2 style="margin-top:0px;">
                  $plural$
              </h2>
          </div>
          <div class="col-sm-1">{{ link_to("$plural$/new", "<i class='fa fa-plus'></i> New","class":"btn btn-block btn-default") }}</div>
          <div class="col-sm-2">
            <div class="input-group">
              <span class="input-group-btn">
                {{ link_to("$plural$/index", "<i class='fa fa-close'></i> Clear","class":"btn btn-block btn-default") }}
              </span>
              {{ select_static("limit",["":"limit","10":"10","20":"20","50":"50"],"class":"form-control") }}
            </div>
          </div>
        </div>


  {{ content() }}

      <table class="table table-striped">
          <thead>
              <tr>
      $searchHeader$
                  <th colspan="2" style="padding-right:0px;">
                    {{ submit_button('Search', 'class': 'btn btn-success btn-block') }}
                  </th>
              </tr>
          </thead>
          <tbody>
          {% if page.items is defined %}
          {% for $singularVar$ in page.items %}
              <tr>
                  $rowColumns$
                  <td>{{ link_to("$plural$/edit/"~$singularVar$.$pk$, '<i class="fa fa-edit"></i>') }}</td>
                  <td>{{ link_to("$plural$/delete/"~$singularVar$.$pk$, '<i class="fa fa-times"></i>') }}</td>
              </tr>
          {% endfor %}
          {% endif %}
          </tbody>
      </table>


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
