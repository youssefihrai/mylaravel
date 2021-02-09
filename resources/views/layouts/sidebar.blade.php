

<div class="col-md-6 detailed">
    <h4>User Stats</h4>
    <div class="row centered mt mb">
      <div class="col-sm-4">
        <x-card
        title="commentaires"
            text="les posts trés commentere">
            <ul class="list-group list-group-flush">
                @foreach($mostcomented as $mostcomente)
                <li class="list-group-item"><a href="">{{ $mostcomente->title }}
                </a></li>
                @endforeach

            </ul>
         </x-card>
      </div>
      <div class="col-sm-4">
        <x-card
title="users"
    text="les users plus commentere"
        :items="collect($mostusers)->pluck('name')" >
 </x-card>
      </div>
      <div class="col-sm-4">


<x-card
title="users"
     text="les users activer dans ce mois"
       :items="collect($mostusersinmonth)->pluck('name')" >
</x-card>

      </div>
    </div>
    <!-- /row -->

    <!-- /row -->

    <!-- /row -->
  </div>








