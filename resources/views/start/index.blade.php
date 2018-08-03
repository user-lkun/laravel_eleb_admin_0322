@extends('default')
@section('content')
    <h3>--开始抽奖--</h3>

   <table class="table table-bordered">
       @foreach($events as $val)
       <tr>
           <td>活动{{$val->id}}</td>
           <td>{{$val->title}}</td>
           @if($val->is_prize==0)
           <td><a href="{{route('start.lottery',['id'=>$val->id])}}" class="btn btn-block btn-primary">开始抽奖</a></td>
           @else
               <td>
                   <a href="{{route('start.result',[$val])}}" class="btn  btn-primary">查看结果</a>
                   <span class="btn  btn-primary" disabled="">已抽奖</span>
               </td>
               @endif
       </tr>
       @endforeach
   </table>



@stop
