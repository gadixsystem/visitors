@extends('visitors::includes.html')
@section('content')

<section class="content-area">
  @if(isset($uniques))
  <div class="table-wrapper-scroll-y my-custom-scrollbar">

    <table class="table table-bordered table-striped mb-0">

      <thead style="position:-webkit-sticky;position:sticky;top:200px;">
        <tr>
          <th>ID</th>
          <th>Ip </th>
          <th>Last Login</th>

        </tr>
      </thead>
      <tbody>

        @foreach($uniques as $unique)
        <tr>
          <td>{{$unique->id}}</td>
          <td>{{$unique->ip}}</td>
          <th>{{ date('d-m-y H:i:s', strtotime($unique->updated_at)) }}</th>
          <th><button class="btn btn-primary" id="{{$unique->id}}" name="historic">Historic</button>
            @if($unique->active)
            <button class="btn btn-success" id="{{$unique->id}}" name="active">Active</button>
            @else
            <button class="btn btn-danger" id="{{$unique->id}}" name="active">Blocked</button>
            @endif
          </th>

        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  @else

  <div class="alert alert-danger" role="alert">
    {{$message}}  <a href="{{route('visitors.index')}}" class="alert-link">Go to home!</a>.
  </div>
  @endif
</section>


@endsection

@section('scripts')
<script>
  buttons = document.getElementsByName("historic")
  buttons.forEach(button => {
    button.addEventListener("click", e => {
      e.preventDefault()
      e.stopPropagation()
      window.location = "{{url('/'.config('visitors.prefix'))}}/" + e.target.id
    })
  })

  active = document.getElementsByName("active")
  active.forEach(button => {
    button.addEventListener("click", e => {
      e.preventDefault()
      e.stopPropagation()
      blockIP(e.target.id)
    })
  })

  function blockIP(id){
    $.ajax({
      url: "{{url('/'.config('visitors.prefix'))}}/"+id,
      method: "POST",
      data: {
        _token : $("[name='_token']").val()
      },
      success: function(){
        window.location = "{{url('/'.config('visitors.prefix'))}}"
      }
    });
  }
</script>
@endsection