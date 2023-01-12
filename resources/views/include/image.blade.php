
      <div class="section layout_padding">
         <div class="container">
            <div class="row">
                  <div class="col-md-12">
                  <div class="full blog_cont">
                    <!--NAZWA OBRAZKA-->
                     <h4>{{$image->name}}</h4>
                     <!--DATA DODANIA-->
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
            <!--ŁAPKA W GÓRĘ-->
            <div class="row">
               <div class="col-md-6">
                    <div class="center">
                        
                        <form action="/image/vote" method="post">
                        @csrf
                            <input type="hidden" name="image" value="{{ $image->id }}">
                            <input type="hidden" name="vote" value="1">
                                <button type="submit" class="w3-btn" style="font-size: 150%;background-color: #4CAF50;font-size: 10px;padding: 8px 50px;border-radius: 12px;">{{$image->getVotesUp()}}
                                <i class="fa fa-thumbs-up" style="font-size: 150%;" aria-hidden="true"></i></button>
                        </form>
                    </div>
               </div>
               <!--ŁAPKA W DÓŁ-->
               <div class="col-md-6">
                    <div class="center">
                        
                        <form action="/image/vote" method="post">
                        @csrf
                            <input type="hidden" name="image" value="{{ $image->id }}">
                            <input type="hidden" name="vote" value="-1">
                                    <button type="submit" class="w3-btn" style="font-size: 150%;background-color: #f44336;font-size: 10px;padding: 8px 50px;border-radius: 12px;">{{$image->getVotesDown()}}
                                    <i class="fa fa-thumbs-down" style="font-size: 150%;" aria-hidden="true"></i></button>
                        </form>
                    </div>
               </div>

            </div>
            <!--PRZYCISK DELETE-->
            @auth
            @if(auth()->user()->id==1 or auth()->user()->id==$image->user_id)
                <div class="row">
                    <button onclick="document.getElementById('id01').style.display='block'">Delete</button>

                    <div id="id01" class="modal">
                          <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                              <form class="modal-content" method="post" action="/image/remove">
                                    @csrf
                                        <input type="hidden" name="image" value="{{ $image->id }}">
                                            <div class="container">
                                              <h1>Delete Account</h1>
                                              <p>Are you sure you want to delete your picture?</p>

                                          <div class="clearfix">
                                            <button type="button" class="cancelbtn">Cancel</button>
                                            <button type="submit" class="deletebtn">Delete</button>
                                          </div>
                                       </div>
                              </form>
                </div>
            @endif
            @endauth
            </div>
          </div>
      </div>
