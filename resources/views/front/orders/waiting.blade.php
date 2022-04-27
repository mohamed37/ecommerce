@include('front.includes.header')
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{route('main')}}"><i class="fa fa-home"></i> الرئيسية</a>
                    <span>تحضير الطلب</span>
                </div>
            </div>
        </div>
    </div>
</div>

                    @php
                        $id = Auth::guard('customer')->user()->id;
                        $orders = \App\Models\Order::where('customer_id',$id)->get();

                    @endphp
               <div class="container">
                <div class="Loading" id="myprogressBar">
                    
                </div>
                <div id="clock"></div>
                <div id="countdown">
                    
                     
                      <span id="minutes"></span> M :
                      <span id="seconds"></span> S
                   
                  </div>
                @foreach ($orders as $order)
                <div>
                    <h1>{{$order->id}}</h1>
                    <a href="{{route('delete.order',$order -> id)}}"
                        class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>
                </div>
                @endforeach
               
              </div>
              
               

@section('script')
<script>
    $(document).ready(
        function(){
            var element =document.getElementById("myprogressBar")
            , width = 5
            , timer = 500
            , identity = setInterval(scene, timer);
            
            $('.Loading').css("animation","load "+ timer +"s"+" infinite");
            console.log("animation","load "+ timer +"s"+" infinite");
            function scene(){
                if(width >= 100)
                {
                    clearInterval(identity);
                }else{
                    width++;
                    element.style.width= width+ '%';
                }
            }

            /*let now = new Date().getTime();*/
           /*  let now = timer;
            $('#clock').countdown(now, {elapse: true})
            .on('update.countdown', function(event) {
            var $this = $(this);
            $this.html(event.strftime('وقت تحضير الطلب: <span>%M:%S</span>'));
            });
 */


            (function () {
            const second = timer,
                    minute = second * 60,
                    hour = minute * 60;

            //I'm adding this section so I don't have to keep updating this pen every year :-)
            //remove this if you don't need it
            let today = new Date(),
                dd = String(today.getDate()).padStart(2, "0"),
                mm = String(today.getMonth() + 1).padStart(2, "0"),
                yyyy = today.getFullYear(),
                nextYear = yyyy + 1,
                dayMonth = "09/30/",
                birthday = dayMonth + yyyy;
            
            today = mm + "/" + dd + "/" + yyyy;
            if (today > birthday) {
                birthday = dayMonth + nextYear;
            }
            //end
            
            const countDown = new Date(birthday).getTime(),
                x = setInterval(function() {    

                    const now = new Date().getTime(),
                        distance = countDown - now;

                
                    document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
                    document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);

                    //do something later when date is reached
                    if (distance < 0) {
                    document.getElementById("headline").innerText = "It's my birthday!";
                    document.getElementById("countdown").style.display = "none";
                    document.getElementById("content").style.display = "block";
                    clearInterval(x);
                    }
                    //seconds
                }, 0)
            }());
    }); 
</script>
@endsection
@include('front.includes.footer')    
