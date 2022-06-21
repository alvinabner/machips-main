@extends('layouts.admin')

@section('title')
    Keranjang
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <div class="clearfix mb-5">
                        <div class="float-left mb-2">
                            <img src="{{ asset('assets/inovtek-highres.png')}}" alt="" height="28">
                        </div>
                        <div class="float-right">
                            <h3 class="m-0 d-print-none">Keranjang</h3>
                        </div>
                    </div>
                    
                    <form id="storeBuy" action='{{ route('sale.store') }}' method='POST' enctype='multipart/form-data'>
                        @csrf
                        <table id="example" class="table table-striped mt-4 table-centered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th class="text-right">Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product_sale as $key => $ps)
                                    <tr id="data">
                                        <td>
                                            {{ $key+1 }}
                                        </td>
                                        <td>
                                            {{ $ps->product->name }}
                                        </td>
                                        <td>
                                            <input type="hidden" name="product_id[]" value="{{$ps->product_id}}">
                                            <input type="hidden" name="id[]" value="{{$ps->id}}">
                                            {{ $ps->qty }}
                                        </td>
                                        <input type="hidden" name="price[]" value="{{$ps->total}}">
                                        <td>{{ number_format($ps->total) }}</td>
                                        <td>
                                            <a href="{{ route('prodsale.destroy', [$ps->id]) }}" class="btn btn-danger" onclick="$('#delete{{$ps->id}}').submit()"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot align="right">
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th class="text-right"></th>
                                </tr>
                            </tfoot>
                        </table>
                    
                        <div class="hidden-print mt-4">
                            <div class="text-right d-print-none">
                                <a href="javascript:window.print()" class="btn btn-blue waves-effect waves-light"><i class="fa fa-print mr-1"></i> Print</a>
                                <button type="submit" class="btn btn-info waves-effect waves-light">Bayar Sekarang</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script>
    $(document).ready(function() {
        $('#example').dataTable({
            "footerCallback": function ( row, data, start, end, display ) {
                var api = this.api(), data;
                
                var intVal = function ( i ) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '')*1 :
                        typeof i === 'number' ?
                            i : 0;
                };

                var monTotal = api
                    .column( 3 )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
                
                $( api.column( 2 ).footer() ).html('Total');
                $( api.column( 3 ).footer() ).html('Rp.'+monTotal);
            },
        } );
    } );

    function submit() {
        alert("Submit");
        $('#storeBuy').submit()
    }
</script>