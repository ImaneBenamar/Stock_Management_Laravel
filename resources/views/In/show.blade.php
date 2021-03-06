@extends('main')
@section('title')
Entres
@endsection

@section('contents')
    <div class="row">

      <div class="col-md-12">
        <div class="widget">
          <div class="widget-header">
            <h2 class="text-center"><strong>Entres</strong></h2>

            <div class="additional-btn">
           <a href="{{ route('add.entres') }}"><button class="btn btn-success pull-right">Ajouter</button></a>
            </div>
          </div>
          <div class="widget-content">
          <br>
            <div class="table-responsive">
              <form class='form-horizontal' role='form'>
              <table id="datatables-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th>Types</th>
                              <th>Date</th>
                              <th>N°=Facture</th>
                              <th>Quantite</th>
                              <th>Prix Unitaire</th>
                              <th>Fournisseur</th>
                              <th>Solde</th>
                              <th>Options</th>
                          </tr>
                      </thead>


                      <tbody>
                        @foreach($entres as $entre)
                          <tr>
                              <td>{{ $entre->type->name }}</td>
                              <td>{{ date('d/m/Y',strtotime($entre->date)) }}</td>
                              <td>{{ $entre->numero_facture }}</td>
                              <td>{{ $entre->quantite}}</td>
                              <td>{{ $entre->prix_unitaire}}</td>

                              {{--<td><a href="{{ route('single.client',$entre->id)}}">{{ $entre->fourni }}</a></td>--}}
                              <td>{{ $entre->fournisseur }}</td>
                              <td>{!! $entre->solde = $entre->quantite * $entre->prix_unitaire !!}</td>
                              <td>
                          <div class="btn-group btn-group-xs">
                           <a href="{{ route('edit.entres',$entre->id) }}" class="btn btn-default"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('delete.entres',$entre->id) }}" class="btn btn-defaultt"><i class="fa fa-trash"></i></a>

                          </div>
                        </td>

                          </tr>
                        @endforeach

                      </tbody>
                  </table>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


@endsection
@section('scripts')
  <!-- Page Specific JS Libraries -->
  <script src="{{ URL::to('assets/libs/jquery-datatables/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ URL::to('assets/libs/jquery-datatables/js/dataTables.bootstrap.js') }}"></script>
  <script src="{{ URL::to('assets/libs/jquery-datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>
  <script src="{{ URL::to('assets/js/pages/datatables.js') }}"></script>
  <script>
       $('#active-entres-table').addClass('active');
</script>
@endsection
