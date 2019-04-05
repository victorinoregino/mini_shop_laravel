@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body" style="max-height: calc(100vh - 160px); overflow-y:scroll">
                    Cart Items:
                    <div style="border:1px solid #dee2e6">
                        <div style="height:50px;">
                            <table class="table">
                                <thead>
                                    <tr class="d-flex">
                                        <th class="col-2">Status</th>
                                        <th class="col-3">Product</th>
                                        <th class="col-2">Qty</th>
                                        <th class="col-3">User</th>
                                        <th class="col-2"></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div style="max-height: 200px;overflow-y:scroll;">
                            <table class="table">
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr class="d-flex">
                                            <td class="col-2"><b>{{ $item->status }}</b></td>
                                            <td class="col-3"><b>{{ $item->name }}</b></td>
                                            <td class="col-2">{{ $item->qty }}</td>
                                            <td class="col-3" style="padding-left: 20px;">{{ $item->email }}</td>
                                            <td>
                                                <form method="post" action="{{ route('remove.product','itemID='.$item->id)}}">
                                                @csrf
                                                    <button style=""><span class="glyphicon glyphicon-remove">Remove</span></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    Products Items:
                    <div style="border:1px solid #dee2e6">
                        <div style="height:50px;">
                            <table class="table">
                                <thead>
                                    <tr class="d-flex">
                                        <th class="col-3">Product</th>
                                        <th class="col-2">Qty</th>
                                        <th class="col-3">Category</th>
                                        <th class="col-4"></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div style="max-height: 200px;overflow-y:scroll;overflow-x: hidden;">
                            @foreach ($products as $product)
                                <form method="post" action="{{ route('edit.product','productID='.$product->id)}}">
                                    <div class="row">
                                        <div class="col-md-3">
                                                @csrf
                                                <input type="text" name="name" value="{{ $product->name }}" style="width:80%;">
                                        </div>
                                        <div class="col-md-2">
                                            
                                                <input type="number" name="qty" value="{{ $product->qty }}" style="width:80%;">
                                        </div>
                                        <div class="col-md-3">
                                            
                                                <input type="text" name="category" value="{{ $product->category }}" style="width:80%;">
                                        </div>
                                        <div class="col-3">

                                                    <button type="submit">Update</button>
                                        </div>
                                    </div>
                                </form>
                            @endforeach
                        </div>
                    </div>

                    Accounts:
                    <div style="border:1px solid #dee2e6">
                        <div style="height:50px;">
                            <table class="table">
                                <thead>
                                    <tr class="d-flex">
                                        <th class="col-3">Name</th>
                                        <th class="col-3">Email</th>
                                        <th class="col-2">Type</th>
                                        <th class="col-2"></th>
                                        <th class="col-2"></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div style="max-height: 200px;overflow-y:scroll;overflow-x:hidden">
                            @foreach ($users as $user)
                                <form method="post" action="{{ route('edit.user','userID='.$user->id)}}">
                                    <div class="row">
                                        @csrf
                                        <div class="col-md-3">
                                                <input type="text" name="name" value="{{ $user->name }}" style="width:80%;">
                                        </div>
                                        <div class="col-md-3">
                                                <input type="text" name="email" value="{{ $user->email }}" style="width:80%;">
                                        </div>
                                        <div class="col-md-2">
                                            
                                            <select name="type">
                                                @if($user->type == 'admin')
                                                <option value="admin" selected> Admin </option>
                                                <option value="user"> User </option>
                                                @else
                                                <option value="admin" > Admin </option>
                                                <option value="user" selected> User </option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <button type="submit">Update</button>
                                        </div>
                                    </div>
                                </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
