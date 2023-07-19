<!-- needs data (model instance ) -->
<div>
    <form action="{{$data->delete_url}}" method='POST'>
       @method('DELETE')
       <button type='submit' class='btn btn-danger'>
        <span>&times;</span>
       </button> 
    </form>
</div>