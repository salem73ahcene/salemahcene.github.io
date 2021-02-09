@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

           <div class="card">
                <div class="card-header" style="background-color:#ff5e00;color:white; font-size:20px;font-weight:bold;   ">
                    Modifier le Mouvement   <a href="{{url('/index')}}"  class="btn btn-success"style="margin-left:700px; ">Retour à la liste</a>
                </div>
            </div>
            

            @if(count($errors))
            <div class="alert alert-danger" role="alert">
              <ul>
                @foreach($errors->all() as $message)
                <li>{{$message}}</li>
                @endforeach
              </ul>

            </div>
            @endif
            
           <form action="{{url('doms/'.$mv->id)}}" method="POST">
                                          
                 @csrf
                 @method('PUT')
                <div class="form-group">
                    <label for="">Numéro de Convention </label>
                   <input type="text" name="numcv" class="form-control" value="{{$mv->numcv}} ">
                </div>

                <div class="form-group">
                    <label for="">Nature du Dossier </label>
                   <input type="text" name="natdos" class="form-control" value=" {{$mv->natdos}}">
                </div>

                <div class="form-group">
                    <label for="">Demandeur </label>
                   <input type="text"  name="name"class="form-control" value="{{$mv->name}} ">
                </div>
                    
                <div class="form-group">
                    <label for="">Poste </label>
                   <input type="text"  name="poste"class="form-control" value="{{$mv->poste}} ">
                </div>

                <div class="form-group">
                    <label for="">Date Sortie     |   utilisez le masque de saisie(aaaa-mm-jj)</label>
                   <input type="text"  name="dat_s"class="form-control" value="{{$mv->dat_s}} ">
                
                </div>

                 <div class="form-group">
                    <label for="">Date Entrée     |    utilisez le masque de saisie(aaaa-mm-jj)</label>
                   <input type="text"  name="dat_e"class="form-control" value="{{$mv->dat_e}} ">
                   
                </div>

                <div class="form-group">
                    <label for="">Observation </label>
                   <input type="text"  name="obs" class="form-control" value="{{$mv->obs}} ">
                </div>
                 <hr>
                <div class="form-group">
                    
                   <input type="submit" class="form-control btn btn-danger" value="Modifier">
                </div>


            </form>


        </div>
    </div>
</div>




@endsection

