@extends('webcontrol.template.template')

@section('title', 'Redeem - Webcontrol')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <h1 class="page-title">Redeem [ {{ $count }} ] <a href="{{ url('webcontrol/redeem/download') }}" class="btn btn-primary btn-xs btn-add" title="Downlaod"><i class="fa fa-download" aria-hidden="true"></i></a></h1>
    </div>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th width="75px;" class="text-right">#</th>
          <th class="text-right">OLX ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Address</th>
          <th class="text-right">Phone</th>
          <th class="text-right">Date</th>
          <th width="75px;" class="text-center">Status</th>
          <th width="100px;" class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php $no = $redeems->firstItem(); ?>
      @foreach($redeems as $redeem)
        <tr>
          <th scope="row" class="text-right">{{ $no }}</th>
          <td class="text-right">{{ $redeem->user->olx_id }}</td>
          <td>{{ $redeem->name }}</td>
          <td>{{ $redeem->user->email }}</td>
          <td>{{ $redeem->address }}</td>
          <td class="text-right">{{ $redeem->phone }}</td>
          <td class="text-right">{{ $redeem->created_at->format('d F Y') }}</td>
          <td class="text-center">
            @if($redeem->status == 1)
              Verified
            @elseif($redeem->status == 2)
              Rejected
            @else
              Pending
            @endif
          </td>
          <td class="text-center">
            <a href="{{ url('webcontrol/redeem/'.$redeem->id.'/edit') }}" class="btn btn-xs btn-warning" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
          </td>
        </tr>
      <?php $no++; ?>
      @endforeach
      </tbody>
    </table>
  </div>

  {{ $redeems->links() }}

@endsection