{{ form("$plural$/create", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}
<div class="page-header">
    <div class="row">
        <div class="col-sm-8">
            <h1>
                Create $plural$
            </h1>
        </div>

        <div class="col-sm-2">{{ link_to("$plural$/index", "Go back","class":"btn btn-block btn-default topten") }}</div>
        <div class="col-sm-2">{{ submit_button('Save', 'class': 'btn btn-success btn-block topten') }}</div>
    </div>
</div>

{{ content() }}



$captureFields$

</form>
