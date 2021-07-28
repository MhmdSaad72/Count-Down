@extends('layouts.admin')

@section('style')
  {{-- dataTable --}}
<link rel="stylesheet" href="{{asset("vendor/vanilla-datatables/vanilla-dataTables.min.css")}}">
@endsection

@section('content')
<section class="py-5">
  <!-- Success Flash Message-->
  @include('includes.flash-message')

    <!-- Subscribers Table-->
    <table class="table bg-white shadow rounded table-striped text-nowrap mb-0" id="subscribersTable">
        <thead>
            <tr>
                <th>{{__('ID')}}<span class="pe-4 pe-lg-2"> </span></th>
                <th>{{__('Email Address')}}</th>
                <th>{{__('Status')}}</th>
                <th>{{__('Confirmed')}}</th>
                <th>{{__('Subscribed')}}</th>
                <th>{{__('Action')}}</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($users as $key => $value)
            <tr>
              <td> <strong>{{ $loop->iteration }}</strong></td>
              <td>{{ $value->email }}</td>
                <td>
                  @if ($value->email_verified_at)
                    <div class="badge bg-success text-uppercase">{{ $value->confirmed() }}</div>
                  @else
                    <div class="badge bg-warning text-uppercase">{{ $value->confirmed() }}</div>
                  @endif
                </td>
                <td>{{ $value->email_verified_at}}</td>
                <td>{{ $value->created_at }}</td>
                <td>
                  <form class="" action="{{ route('delete.subscriber' , $value->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger py-1 px-2" type="submit" onclick="return confirm(&quot;Confirm delete?&quot;)" disabled><i class="fas fa-trash-alt text-xs"></i></button>
                  </form>
                </td>
              </tr>
          @endforeach
        </tbody>
    </table>

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
