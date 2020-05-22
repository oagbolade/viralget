@if(session()->get('error'))
<div class="col-md-12">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>An error occured!</strong><br/>{{ session()->get('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>        
</div>
@endif
@if(session()->get('success'))
<div class="col-md-12">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>        
</div>
@endif
