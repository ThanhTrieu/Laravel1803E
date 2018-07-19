<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="{{ asset('css/admin/bootstrap.min.css') }}">
    <script src="{{ asset('js/admin/jquery-3.3.1.js') }}"></script>
</head>
<body>
    {{-- comment --}}
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center">This is Dashboard</h1>
            </div>
        </div>
        <div class="row">
            <input type="text" id="number1">
            <br>
            <input type="text" id="number2">
            <br>
            <button type="button" class="btn btn-primary">
                Sum
            </button>
            <span id="result"></span>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>Ma SV</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Money</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- khai bao bien ngoai view --}}
                    @php
                        $totalMoney = 0;
                    @endphp
                    @foreach ($lstInfoST as $key => $item)
                       <tr>
                           <td>{{ $item['msv'] }}</td>
                           <td>{{ $item['name'] }}</td>
                           <td>{{ ($item['gender'] == 1) ? 'Nam' : 'Nu' }}</td>
                           <td>{{ $item['email'] }}</td>
                           <td>{{ number_format($item['money']) }}</td>
                       </tr>
                       @php
                           $totalMoney += $item['money'];
                       @endphp
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td>Total Money</td>
                        <td colspan="3"></td>
                        <td>{{ number_format($totalMoney) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <script  type="text/javascript">
        $(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('button[type="button"]').click(function(){
                let num1 = $('#number1').val().trim();
                let num2 = $('#number2').val().trim();
                if(num1 !== '' && num2 !== ''){
                    $.ajax({
                        url: "{{ route('admin.sum') }}",
                        type: "POST",
                        data: {num1: num1, num2: num2 },
                        success: function(res){
                            let obj = $.parseJSON(res);
                            if(obj.mess === 'ok'){
                                $('#result').html(obj.sum);
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>