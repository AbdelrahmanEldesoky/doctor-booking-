 @if($reports)
 @php($total = 0)
                            @foreach($reports as $rep)
                                @php($percen = getPersentage($rep,$query))
                                @php($amount = ($percen * $rep->session_amount)/100)
                                @php($total = $total + ($amount - (($amount * 14 )/100)))
                            @endforeach
                            
                            <span>{{$total}}</span>
                            @else
                            <span>0</span>
                            @endif