@extends('layouts.admin')

@section('style')
<link rel="stylesheet" href="{{asset("vendor/vanilla-dataTables/vanilla-dataTables.min.css")}}">
@endsection

@section('content')
<section class="py-5">

    <!-- Subscribers Table-->
    <table class="table bg-white shadow rounded table-striped text-nowrap mb-0" id="subscribersTable">
        <thead>
            <tr>
                <th>ID<span class="pe-4 pe-lg-2"> </span></th>
                <th>Email Address</th>
                <th>Status</th>
                <th>Confirmed</th>
                <th>Subscribed</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($users as $key => $value)
            <tr>
              <td> <strong>{{ $loop->iteration }}</strong></td>
              <td>{{ $value->email }}</td>
                <td>
                  <div class="badge bg-success text-uppercase">{{ $value->confirmed() }}</div>
                </td>
                <td>{{ $value->email_verified_at}}</td>
                <td>{{ $value->created_at }}</td>
                <td>
                  <button class="btn btn-sm btn-danger py-1 px-2" type="button"><i class="fas fa-trash-alt text-xs"></i></button>
                </td>
              </tr>
          @endforeach
        </tbody>
    </table>

    <div class="px-3 pt-4 text-center text-lg-start">
        <!-- Send Mail Button--><a class="btn btn-gradient-success" href="#"> <i class="fas fa-envelope-open-text me-2"></i>Send email for subscribers</a>
    </div>

</section>
@endsection
@section('js')
<script src="{{asset('vendor/vanilla-datatables/vanilla-dataTables.min.js')}}"></script>
<script>
    /* =============================================
            VANILLA DATATABLES INITIALIZING
            ============================================== */
    let myTable = document.getElementById("subscribersTable");
    let dataTable = new DataTable(myTable, {
        labels: {
            placeholder: "Search...",
            perPage: "{select}",
            info: "Showing {start} to {end} of {rows} entries",
        }
    });

    function insertBsClasses() {
        let searchInput = document.querySelector('.dataTable-input');
        let searchSelector = document.querySelector('.dataTable-selector');

        searchInput.classList.add('form-control');
        searchSelector.classList.add('form-select');
    }

    dataTable.on("datatable.init", function() {
        insertBsClasses()
    });
</script>
@endsection
