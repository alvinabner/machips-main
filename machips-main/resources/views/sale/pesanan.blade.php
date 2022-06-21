@extends('layouts.admin')

@section('title')
    Pesanan Masuk
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
                            <h3 class="m-0 d-print-none">Pesanan Masuk</h3>
                        </div>
                    </div>
                    
                    <div class='card'>
                        <div class='card-body'>
                            @foreach ($sales as $id => $sale)
                                <div class="accordion" id="accordionExample{{$id}}">
                                    <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne{{$id}}">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$id}}" aria-expanded="true" aria-controls="collapseOne{{$id}}">
                                            @php
                                                $s = \App\Models\Sale::findOrFail($id);
                                            @endphp
                                            {{$s->ref_no}}
                                            @if ($s->status == 4)
                                                <span class="badge badge-success">Selesai</span>
                                            @elseif ($s->status == null)
                                                <span class="badge badge-info">Belum Bayar</span>
                                            @else
                                                @if ($s->buktiPembayaran && $s->status != 2)
                                                    <span class="badge badge-warning">Pembayaran Belum Dikonfirmasi</span>
                                                @else
                                                    <span class="badge badge-primary">Pending</span>
                                                @endif
                                            @endif
                                        </button>
                                    </h2>
                                    <div id="collapseOne{{$id}}" class="accordion-collapse collapse" aria-labelledby="headingOne{{$id}}" data-bs-parent="#accordionExample{{$id}}">
                                        <div class="accordion-body">
                                            <table class="table table-striped mt-4 table-centered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Item</th>
                                                        <th>Quantity</th>
                                                        <th class="text-right">Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($sale as $key => $ps)
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
                                                            <td class="text-right">Rp.{{ number_format($ps->total) }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot align="right">
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th>Grand Total</th>
                                                        <th class="text-right">Rp.{{number_format($s->grand_total)}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th>
                                                            <form action='{{ route('job', [$id]) }}' method='POST' enctype='multipart/form-data'>
                                                                @csrf
                                                                <input type="hidden" name="status" value="2">
                                                                <button class="btn btn-info">JOB</button>
                                                            </form>
                                                        </th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

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