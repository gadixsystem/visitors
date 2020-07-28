@extends('visitors::includes.html')
@section('content')

<div class="container py-5">

        {{-- For demo purpose --}}
        <div class="row text-center text-white mb-5">
            <div class="col-lg-8 mx-auto">
                <h1 class="display-4">Visitor: {{$unique->ip}}</h1>
                <p class="lead mb-0">Last update: {{ $unique->updated_at->format('d-m-Y h:i:s') }} </p>
            </div>
        </div>{{-- End --}}


        <div class="row">
            <div class="col-lg-7 mx-auto">

                {{-- Timeline --}}
                <ul class="timeline">
                    @foreach($unique->visitors   as $detail)

                    <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                        <div class="timeline-arrow"></div>
                        <h2 class="h5 mb-0">{{$detail->method}} - {{$detail->route}}</h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>{{ $detail->created_at->format('d-m-Y h:i:s') }}</span>
                        <p class="text-small mt-2 font-weight-light">{{$detail->header}}</p>
                    </li>
                    @endforeach

                </ul>{{-- End --}}

            </div>
        </div>
    </div>
@endsection

@section('customStyle')
<style>
/*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*
*/

        /* Timeline holder */
        ul.timeline {
            list-style-type: none;
            position: relative;
            padding-left: 1.5rem;
        }

        /* Timeline vertical line */
        ul.timeline:before {
            content: ' ';
            background: #fff;
            display: inline-block;
            position: absolute;
            left: 16px;
            width: 4px;
            height: 100%;
            z-index: 400;
            border-radius: 1rem;
        }

        li.timeline-item {
            margin: 20px 0;
        }

        /* Timeline item arrow */
        .timeline-arrow {
            border-top: 0.5rem solid transparent;
            border-right: 0.5rem solid #fff;
            border-bottom: 0.5rem solid transparent;
            display: block;
            position: absolute;
            left: 2rem;
        }

        /* Timeline item circle marker */
        li.timeline-item::before {
            content: ' ';
            background: #ddd;
            display: inline-block;
            position: absolute;
            border-radius: 50%;
            border: 3px solid #fff;
            left: 11px;
            width: 14px;
            height: 14px;
            z-index: 400;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }


/*
*
* ==========================================
* FOR DEMO PURPOSES
* ==========================================
*
*/
        body {
            background: gray;
            min-height: 100vh;
        }

        .text-gray {
            color: #999;
        }
</style>
@endsection
