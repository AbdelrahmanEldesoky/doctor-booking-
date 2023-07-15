<span>{{$item->rating}}</span>
@for($i=1;$i<=5;$i++)
    @php($fill = $i<=$item->rating ? 'fill' : '')
    <span><i class="fa fa-star {{$fill}}"></i></span>
@endfor
