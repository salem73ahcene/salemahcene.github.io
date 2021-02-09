@extends('layouts.app')

@section('content')
          

<div class="container">
    <div class="row" >
        <div class="col-md-12">
         <div class="card">
                <div class="card-header" style="background-color: gray; display: flex;"> <h4 style="font-weight:bold;font-size:20px;color:yellow;">Liste des mouvements</h4>  
                     <a href="{{url('/create')}}" class="btn btn-primary" style="margin-left:650px;pading:0px; ">Nouveau Mouvement</a>
                    
                </div>

               @if (session()->has('success'))

                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
                 @endif
                 
                    @if (session()->has('danger'))

                <div class="alert alert-success">
                    {{session()->get('danger')}}
                </div>
                @endif

                
            </div>
           
          
            <table class="table table-dark table-striped mt-7">
                <head>
                    <tr>
                        <th>Numéro Convention</th>
                        <th>Nature Dossier</th>
                        <th>Demandeur</th>
                        <th>Poste</th>
                        <th>Date Sortie</th>
                        <th>Date Entrée</th>
                        <th>Observations</th>
                        <th>actions</th>
                    </tr>   
                </head>
                
                <body>
                    @foreach($mouv as $mv)
                    <tr>
                        <td>{{ $mv->numcv }}</td>
                        <td style="color:yellow;">{{ $mv->natdos }}</td>
                        <td>{{ $mv->name }}</td>
                        <td>{{ $mv->poste }}</td>
                        <td style="color:gold;">{{ $mv->dat_s }}</td>
                        <td>{{ $mv->dat_e }}</td>
                        <td>{{ $mv->obs }}</td>
                        <td>
                         
                            <form action="{{ url('doms/'.$mv->id)}} " method="post">
                                                                
                                <a href="{{url('doms/'.$mv->id.'/edit')}}" class="btn btn-primary">Editer</a>
                                   @csrf
                                   @method('DELETE')   
                                <button type="submit"  class="btn btn-danger">supprimer</a>

                               
                            </form>
                        </td>
                    </tr>
                                         
                    @endforeach

                
                </body>
            </table>

        </div>
    </div>
</div>
</form>

@endsection