@extends('layout')
@section('content')
<form action="/search/cari" method="get" style="margin-top:8px; margin-bottom:9px; margin-left:9px; align-items: right; ">
<div class="row g-3 align-items-center ">
   
  <div class="col-auto">
    <input name="search" type="search" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline">
  </div>
    
</div>
</form>
<div class="row">
    @foreach($dokter as $dokter)
    <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <img src="{{Voyager::image($dokter->image)}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$dokter->nama}}</h5>
                <p class="card-text">{{$dokter->jadwal}}</p>
                @if ($dokter->status == 1)
                <button href="#" class="button green">Open</button>
                @elseif ($dokter->status == 0)
                <button class="button red">Close</button>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>

    
@endsection