@extends('main')

@section('title')
    Stock
@endsection

@section('contents')

    <div class="row">
        <div class="col-md-12">
            <div class="widget">
                <div class="widget-header">
                    <h2 class="text-center"><strong>Stock </strong></h2>
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
        $('#active-generation').addClass('active');
    </script>
@endsection