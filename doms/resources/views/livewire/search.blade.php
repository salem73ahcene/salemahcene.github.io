<div class="inline-block relative" x-data="{open:true}" >
   <input @click.away ="{ open=false; @this.resetIndex() }" @click="{open= true}"  class="bg-gray-200 text-gray-700 border-2 focus:outline-none px-3 py-1  rounded-full" 
   placeholder="Rechercher ..... " 
   style="margin-left: 220px;" wire:model = "query" 
   wire:keydown.arrow-down.prevent= "IncrementIndex"
   wire:keydown.arrow-up.prevent= "decrementIndex"
   wire:keydown.backspace.prevent= "resetIndex"
   wire:keydown.enter.prevent= "showDom"

   >
   
  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="top-0 right-0 absolute " viewBox="0 0 16 16 ">
    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
  </svg>
  <div class="absolute border bg-gray 100" style="margin-left:220px;" x-show = "open" >

      @if (strlen($query)>2 )
          <div>
              @if(count($doms)>0)

                  @foreach($doms as $index=>$dom)
                  <p class = "{{ $index === $selectedIndex ? 'text-success' : '' }}">{{$dom->numcv}} {{$dom->natdos}} </p>
                  @endforeach
                
              @else
                  <span class="absolute text-danger">0 résultat pour "{{$query}}"</span>
              @endif
          </div>
          @endif
  </div>
</div>
