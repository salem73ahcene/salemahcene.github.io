<?php

namespace App\Http\Livewire;
use App\Models\Dom;
use Livewire\Component;

class Search extends Component
{
	public  $query='';
  public $doms=[];
  public $selectedIndex = 0;
   public function IncrementIndex()
   {
     if ($this->selectedIndex===count($this->doms)-1){
       $this->selectedIndex = 0;
       return;
      }
     $this->selectedIndex++;
   }
   public function decrementIndex()
   {
    if ($this->selectedIndex===0){
      $this->selectedIndex = (count($this->doms)-1);
      return;
    }
    $this->selectedIndex--;
   
   }

	 public function updatedQuery()
    {
      $words='%'.$this->query.'%';
      if(strlen($this->query) >= 1){
        $this->doms=Dom::where('name','LIKE',$words)
        ->orwhere('numcv','LIKE',$words)
        ->orwhere('natdos','LIKE',$words)
        ->orwhere('dat_s','LIKE',$words)->get();
      }
               
    }

    public function resetIndex()
    {
      $this->reset('selectedIndex');
    }
    public function showDom()
    {
      
      if($this->doms){
        return redirect()->route('doms.show', [$this->doms[$this->selectedIndex]['id']] );
      }
    }



    public function render()
    {
        return view('livewire.search');
    }
}
