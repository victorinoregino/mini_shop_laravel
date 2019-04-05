@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form method="post" action="/reserve">
                    @csrf
                    <div class="card-header">Cart
                            <button type="submit" style="float: right"> Reserve </button>
                    </div>
                </form>

                <div class="card-body">    
                    <div style="border:1px solid #dee2e6">
                        <div style="height:50px;">
                            <table class="table">
                                <thead>
                                    <tr class="d-flex">
                                        <th class="col-2">Status</th>
                                        <th class="col-3">Product</th>
                                        <th class="col-2">Qty</th>
                                        <th class="col-5">User</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div style="max-height: calc(100vh - 300px);overflow-y:scroll;">
                            <table class="table">
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr class="d-flex">
                                            <td class="col-2"><b>{{ $item->status }}</b></td>
                                            <td class="col-3"><b>{{ $item->name }}</b></td>
                                            <td class="col-2">{{ $item->qty }}</td>
                                            <td class="col-5" style="padding-left: 20px;">{{ $item->email }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
