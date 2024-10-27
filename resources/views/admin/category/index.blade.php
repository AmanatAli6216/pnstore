@extends('admin.layout.layout')




@section('content')




<table class="table">
    <thead>
      <tr>
        <th><b>S.No</b></th>
        <th><b>Category Name</b></th>
        <th><b>Parant Category Name</b></th>
        <th><b>Created Date</b></th>
      </tr>
    </thead>
    <tbody>
        @foreach($categories as $key=>$categorie)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$categorie->name}}</td>
            <td>
                @if($categorie->category_id) 
                {{$categorie->parent->name}}
                @else
                    No Parent Category
                @endif
            </td>
            <td>{{$categorie->created_at}}
            <a href="{{route('category.edit',$categorie->id)}}" style="font-size:17px;padding:5px;"><i class="fa fa-edit"></i></a>
            <a href="javascript::void(0)" style="font-size:17px;padding:5px;" data-id="{{$categorie->id}}" class="category_delete"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>



@endsection

@push('footer-script')
<script>
    $('.category_delete').on('click', function() {
        if (confirm('Are you sure you want to delete this category?')) {
            var id = $(this).data('id');
            $.ajax({
                url: '{{ route("category.delete") }}',
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                success: function(data) {
                    location.reload();
                },
                error: function(xhr, status, error) {
                    // Handle error here
                    console.log(error);
                }
            });
        }
    });
</script>

@endpush
