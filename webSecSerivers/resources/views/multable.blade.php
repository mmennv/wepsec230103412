@extends('layouts.master') 
@section('title', 'Multiplication Tables') 
@section('content')
<div class="container mt-4">
    <div class="row">
        @foreach (range(1, 20) as $j)  
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4"> 
            <div class="card shadow-lg border-0 rounded-lg"> 
                <div class="card-header text-white text-center font-weight-bold bg-{{ ['primary', 'success', 'danger', 'warning', 'info'][$j % 5] }}">
                    جدول ضرب {{ $j }}
                </div>
                <div class="card-body p-2">
                    <table class="table table-bordered text-center table-striped">
                        @foreach (range(1, 10) as $i)
                        <tr>
                            <td class="font-weight-bold">{{$j}} × {{$i}}</td>
                            <td>= {{ $i * $j }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection


