@extends('webcontrol.template.template')

@section('title', 'Ads - Webcontrol')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <h1 class="page-title">Ads [ {{ $count }} ] <a href="{{ url('webcontrol/ads/download') }}" class="btn btn-primary btn-xs btn-add" title="Downlaod"><i class="fa fa-download" aria-hidden="true"></i></a></h1>
    </div>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th width="75px;" class="text-right">#</th>
          <th class="text-right">Ads ID</th>
          <th class="text-right">OLX ID</th>
          <th>Name</th>
          <th>Email</th>
          <th class="text-right">Phone</th>
          <th class="text-right">Date</th>
          <th width="75px;" class="text-center">Active</th>
          <th width="75px;" class="text-center">Verified</th>
          <th width="100px;" class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php $no = $ads->firstItem(); ?>
      @foreach($ads as $ad)
        <tr>
          <th scope="row" class="text-right">{{ $no }}</th>
          <td class="text-right">{{ $ad->ads_olx_id }}</td>
          <td class="text-right">{{ $ad->user_olx_id }}</td>
          <td>{{ $ad->user->name }}</td>
          <td>{{ $ad->user->email }}</td>
          <td class="text-right">{{ $ad->user->phone }}</td>
          <td class="text-right">{{ $ad->created_at->format('d F Y') }}</td>
          <td class="text-center">
            @if($ad->is_active == 1)
              <i class="fa fa-check" aria-hidden="true"></i>
            @else
              <i class="fa fa-times" aria-hidden="true"></i>
            @endif
          </td>
          <td class="text-center">
            @if($ad->is_verified == 1)
              <i class="fa fa-check" aria-hidden="true"></i>
            @else
              <i class="fa fa-times" aria-hidden="true"></i>
            @endif
          </td>
          <td class="text-center">
            <a href="{{ url('webcontrol/ads/'.$ad->id.'/edit') }}" class="btn btn-xs btn-warning" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
          </td>
        </tr>
      <?php $no++; ?>
      @endforeach
      </tbody>
    </table>
  </div>

  {{ $ads->links() }}

@endsection