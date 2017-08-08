@extends('webcontrol.template.template')

@section('title', 'User - Webcontrol')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <h1 class="page-title">User [ {{ $count }} ] <a href="{{ url('webcontrol/user/add') }}" class="btn btn-primary btn-xs btn-add" title="Add New"><i class="fa fa-plus" aria-hidden="true"></i></a></h1>
    </div>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th width="75px;" class="text-right">#</th>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th class="text-right">Phone</th>
          <th class="text-right">Referrer</th>
          <th width="75px;" class="text-center">Verified</th>
          <th width="100px;" class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php $no = $users->firstItem(); ?>
      @foreach($users as $user)
        <tr>
          <th scope="row" class="text-right">{{ $no }}</th>
          <td>{{ $user->olx_id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td class="text-right">{{ $user->phone }}</td>
          <td class="text-right">{{ $user->referrer_olx_id }}</td>
          <td class="text-center">
          @if($user->is_verified == 1)
            <i class="fa fa-check" aria-hidden="true"></i>
          @else
            <i class="fa fa-times" aria-hidden="true"></i>
          @endif
          </td>
          <td class="text-center">
            <a href="{{ url('webcontrol/user/'.$user->id.'/edit') }}" class="btn btn-xs btn-warning" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
            <a href="{{ url('webcontrol/user/'.$user->id.'/delete') }}" class="btn btn-xs btn-danger" title="Delete" onclick="return confirm('Are you sure?')"><i class="fa fa-minus" aria-hidden="true"></i></a>
          </td>
        </tr>
      <?php $no++; ?>
      @endforeach
      </tbody>
    </table>
  </div>

  {{ $users->links() }}

@endsection