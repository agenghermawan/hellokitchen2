@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <a class="btn btn-primary" href="{{ route('transaction.index') }}"> Lihat Data</a>
    </div>
    <div class="card mt-4">
        <div class="container-fluid mt-4">
            <form action="{{ route('transaction.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Transaction Status </label>
                    <select class="form-control" id="exampleFormControlSelect1" name="transaction_status">
                        @if ($data->transaction_status == 'SUCCESS')
                            <option>{{ $data->transaction_status }} </option>
                            <option>PENDING</option>
                            <option>FAILED</option>
                        @elseif($data->transaction_status == 'PENDING')
                            <option>{{ $data->transaction_status }} </option>
                            <option>SUCCESS</option>
                            <option>FAILED</option>
                        @elseif($data->transaction_status == 'FAILED')
                            <option>{{ $data->transaction_status }} </option>
                            <option>SUCCESS</option>
                            <option>PENDING</option>
                        @endif
                    </select>
                </div>
                <button type="submit" class="btn btn-primary"> Update Status Transaksi</button>
            </form>
        </div>

    </div>
@endsection
