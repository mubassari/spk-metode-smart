@if (session()->has('pesan'))
<div class="row">
    <div class="col-6">
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
                {{ session()->get('pesan'); }}
          </div>
    </div>
</div>
@endif
