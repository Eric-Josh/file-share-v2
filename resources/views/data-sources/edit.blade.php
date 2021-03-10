@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div><br />
@endif

<form method="POST" action="{{ route('data-sources.update', $datasource->id) }}" id="dsource">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="datasource">Data source</label>
        <input type="text" id="ds-field-update" class="form-control block mt-1 w-full border-gray-300 focus:border-indigo-300 
                focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" value="{{ $datasource->name }}" name="datasource" required />
    </div>
    <button type="submit" class="btn btn-success float-right" id="btn-update">Update </button>
</form>

<script>
$(function(){
    $("#btn-update").click(function(){

        if( $('#ds-field-update').val() )
        {
            $(this).attr('disabled','disabled');
            $(this).html('<span class="spinner-grow spinner-grow-sm"></span> Updating...')

            return true;
        }else{
            return false;
        }
    });
});
</script>