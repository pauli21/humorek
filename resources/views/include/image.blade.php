
      <div class="section layout_padding">
         <div class="container">
            <div class="row">
                  <div class="col-md-12">
                  <div class="full blog_cont">
                     <h4>{{$image->name}}</h4>
                    <h5>Dodano przez {{$image->user->name}} o {{$image->created_at->format('d.m.Y H:i')}}</h5>
                     </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
               <!--przekazywanie ścieżki obrazka do widoku,
               alt wyświetli tytuł jeżeli wystąpi bład załadowania obrazka-->
                  <img class="mx-auto" style="width:500px; display:block;" src="{{asset("storage/".$image->file)}}" alt="{{$image->name}}" />
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                     {{$image-> votes->sum('votes')}}
               </div>

            </div>
          </div>
      </div>
