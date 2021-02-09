@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color:#6ba3ff;color:white; font-size:20px;font-weight:bold;   ">
                    Nouveau Mouvement   <a href="{{url('/index')}}"  class="btn btn-success"style="margin-left:700px; ">Retour à la liste</a>
                </div>
            </div>
                     

           
           <form method="post"  action="{{url('/store')}}" >
                               
                 @csrf

                <div class="form-group">
                    <label for="">Numéro de Convention </label>
                   <input type="text"name="numcv" class="form-control" placeholder="Entrer le numéro de la convention" value="{{old('numcv')}}">
                    @if ($errors->has('numcv'))
                    <span class="text-danger">{{ $errors->first('numcv') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="">Nature du Dossier </label>
                   <input type="text" name="natdos" class="form-control"  value="{{old('natdos')}} ">
                   <p style="color:blue;">Tappez DOR(dossier rouge) or DOP(dossier plan) ....SVP!!</p>
                    @if ($errors->has('natdos'))
                    <span class="text-danger">{{ $errors->first('natdos') }}</span>
                @endif
                </div>

                <div class="form-group">
                    <label for="">Demandeur </label>
                   <input type="text"  name="name"class="form-control"  placeholder="Entrer le nom du Demandeur" value = "{{old('name')}} ">
                    @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                </div>

                <div class="form-group">
                    <label for="">poste </label>
                   <input type="text"  name="poste"class="form-control"  placeholder="Entrer le poste du demendeur" value = "{{old('poste')}} ">
                    @if ($errors->has('post'))
                    <span class="text-danger">{{ $errors->first('poste') }}</span>
                @endif
                </div>

                <div class="form-group">
                    <label for="">Date  Sortie     |    utilisez le masque de saisie(aaaa-mm-jj)</label>
                    <input type="text"  name="dat_s" class="form-control"  placeholder="Entrer la date de sortie du dossier" value="{{old('dat_s')}} " >
                     @if ($errors->has('dat_s'))
                    <span class="text-danger">{{ $errors->first('dat_s') }}</span>
                @endif
                </div>

                <div class="form-group">
                    <label for="">Observation </label>
                    <input type="text"  name="obs"class="form-control" placeholder="S'il ya observation à entrer" value="{{old('obs')}} ">
                     @if ($errors->has('obs'))
                    <span class="text-danger">{{ $errors->first('obs') }}</span>
                @endif
                </div>
                 <hr>
                <div class="form-group">
                    
                   <input type="submit" class="form-control btn btn-primary" value="Enregister">
                </div>


            </form>


        </div>
    </div>
</div>




@endsection



