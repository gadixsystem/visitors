@extends('visitors::includes.html')
@section('content')

<section class="content-area">
 
  <div class="table-wrapper-scroll-y my-custom-scrollbar">

<table class="table table-bordered table-striped mb-0">
  
        <thead style="position:-webkit-sticky;position:sticky;top:200px;">
            <tr>
                <th>Ip </th>
                <th>Header</th>
                <th>Path</th>
                <th>Method</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($visitors as $visitor)
            <tr>
                <td>{{$visitor->ip}}</td>
                <td>{{$visitor->header}}</td>   
                <td>{{$visitor->path}}</td>
                <td>{{$visitor->method}}</td>
                <th>{{ date('d-m-y H:i:s', strtotime($visitor->created_at)) }}</th>
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>
</section>
@endsection

