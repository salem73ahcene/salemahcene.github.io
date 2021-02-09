@extends('layouts.app')

@section('content')
          

<div class="container">
    <div class="row" >
        <div class="col-md-12">
         <div class="card">
                <div class="card-header" style="background-color: gray; display: flex;"> <h4 style="font-weight:bold;font-size:20px;color:yellow;">Résultat trouvé....</h4>  
                    <a href="{{url('/index')}}"  class="btn btn-success"style="margin-left:750px; ">Retour à la liste</a>
                    
                    
                </div>
                @if (session()->has('success'))

                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>

                @endif

                 @if (session()->has('supp'))

                <div class="alert alert-success">
                    {{session()->get('supp')}}
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
                   
                    <tr>
                        <td>{{ $doms->numcv }}</td>
                        <td style="color:yellow;">{{ $doms->natdos }}</td>
                        <td>{{ $doms->name }}</td>
                        <td>{{ $doms->poste }}</td>
                        <td style="color:gold;">{{ $doms->dat_s }}</td>
                        <td>{{ $doms->dat_e }}</td>
                        <td>{{ $doms->obs }}</td>
                        <td>
                         
                            <form action="{{ url('doms/'.$doms->id)}} " method="post">
                                                                
                                <a href="{{url('doms/'.$doms->id.'/edit')}}" class="btn btn-primary">Editer</a>
                                   @csrf
                                   @method('DELETE')   
                                <button type="submit"  class="btn btn-danger">supprimer</a>

                               
                            </form>
                        </td>
                    </tr>
                                         
                    

                
                </body>
            </table>

        </div>
    </div>
</div>
</form>

@endsection