@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center">{{ $status }}</h3>
            <h3 class="text-center">This is product</h3>
        </div>
        <div class="col-lg-12">
            <a href="{{ route('admin.addproduct') }}" title="Add Product" class="btn btn-primary"> Add Product</a>
            <input type="text" id="keyword" value="{{ $key }}">
            <button type="button" id="search" onclick="searchData();">Search</button>
        </div>
        <div class="col-lg-12 mt-3">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th colspan="2" width="5%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($lstPd as $key => $pd)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $pd->name }}</td>
                        <td>
                            <img src="{{ URL::to('/').'/uploads/images/' . $pd->image }}" alt="" width="120" height="120">
                        </td>
                        <td>
                            {{ number_format($pd->price) }}
                        </td>
                        <td>
                            {{ $pd->qty }}
                        </td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.product.detail',['id'=>$pd->id]) }}" title="Edit"> Edit </a>
                        </td>
                        <td>
                            <button onclick="deletePd({{ $pd->id }})" type="button" class="btn btn-danger btn-sm"> Delete </button>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        <div class="col-lg-12">
        <div class="col-lg-12 text-center mt-3">
            {{ $lstPd->appends(request()->query())->links() }}
        </div>
    </div>
    <script type="text/javascript">
        function searchData(){
            let keyword = $('#keyword').val().trim();
            window.location.href = "{{ route('admin.product') }}" + "?keyword=" + keyword;
        }
        function deletePd(id){
            //alert(id);
            $.ajax({
                url: "{{ route('admin.product.delete') }}",
                type: "POST",
                data: {id: id},
                success: function(res){
                    res = $.trim(res);
                    if(res === 'OK'){
                        alert('success');
                        window.location.reload(true);
                    } else {
                        alert('ERR');
                    }
                }
            });
        }
    </script>
@endsection