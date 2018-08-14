@extends('layout')

@section('content')
<div class="row mt-5">
    <div class="col-lg-12">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th class="text-center">Anh</th>
                    <th>San pham</th>
                    <th>So luong</th>
                    <th>Don gia</th>
                    <th>Thanh Tien</th>
                    <th width="5%">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($cart as $key => $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>
                        <img class="img img-thumbnail" src="http://www.viettien.com.vn/admin/wp-content/uploads/2018/07/somi-17a.jpg" alt="" width="120" height="120">
                    </td>
                    <td>{{ $c->name }}</td>
                    <td>
                        <input type="number" name="qty[]" value="{{ $c->qty }}" onchange="updateCart('{{ $key }}', this);">
                    </td>
                    <td>{{ number_format($c->price) }}</td>
                    <td>{{ number_format(($c->qty * $c->price)) }}</td>
                    <td>
                        <a href="{{ route('cart.delete',['id'=>$key]) }}" title="xoa" class="btn btn-sm btn-danger">Xoa</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5">Tong Tien</td>
                    <td colspan="2" id="totalmoney">{{ Cart::subtotal() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="col-lg-12">
        <a href="{{ route('product.index') }}" title="" class="btn btn-sm btn-primary"> Tiep tuc mua hang</a>
        <a href="#" title="" class="btn btn-sm btn-success ml-3"> Thanh toan</a>
        <a href="{{ route('cart.removeall') }}" title="xoa" class="btn btn-sm btn-danger ml-3">Xoa gio hang</a>
    </div>
    <script type="text/javascript">
        function updateCart(rowCat, obj){
            let qtyPd = $(obj).val().trim();
            //alert(qtyPd);
            if(qtyPd > 0 && qtyPd < 11){
                $.ajax({
                    url : "{{ route('cart.update') }}",
                    type: "POST",
                    data: {rowCat: rowCat, qtyPd: qtyPd},
                    success: function(res){
                        let dt = $.parseJSON(res);
                        $(obj).parent().next().next().html(dt.money);
                        $('#totalmoney').html(dt.totalmoney);
                    }
                });
            } else {
                alert('kiem tra lai so luong mua');
            }
        }
    </script>
</div>
@endsection