<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- Latest compiled and minified CSS --}}
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  {{-- Chart js --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css" />

  {{-- jQuery library --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  {{-- Popper JS --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

  {{-- Latest compiled JavaScript --}}
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  {{-- Char Js --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>

  <title>Visitors!</title>
  <style>
    body {
      padding-top: 50px;
    }

    .table-area {
      position: relative;
      z-index: 0;
      margin-top: 50px;
    }

    table.responsive-table {
      display: table;
      /* required for table-layout to be used (not normally necessary; included for completeness) */
      table-layout: fixed;
      /* this keeps your columns with fixed with exactly the right width */
      width: 100%;
      /* table must have width set for fixed layout to work as expected */
      height: 100%;
    }



    table.responsive-table th {
      background: #eee;
    }

    table.responsive-table td {
      line-height: 2em;
    }

    table.responsive-table tr>td,
    table.responsive-table th {
      text-align: left;
    }
  </style>
  @yield('customStyle')
</head>

<body>

  @include('visitors::includes.navbar')
  @include('visitors::includes.version')
  @yield('content')

  <footer class="footer fixed-bottom mt-auto py-3">
    <div class="container">
      @if(isset($uniques))
      <span>{!! $uniques->render() !!}</span>
      @endif
    </div>
  </footer>
</body>

@yield('scripts')

</html>
