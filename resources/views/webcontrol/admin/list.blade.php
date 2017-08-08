@extends('webcontrol.template.template')

@section('title', 'Admin - Webcontrol')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <h1 class="page-title">Admin [ {{ $count }} ] <a href="{{ url('webcontrol/admin/add') }}" class="btn btn-primary btn-xs btn-add" title="Add New"><i class="fa fa-plus" aria-hidden="true"></i></a></h1>
    </div>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th width="75px;" class="text-right">#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Level</th>
          <th width="75px;" class="text-center">Active</th>
          <th width="100px;" class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php $no = $admins->firstItem(); ?>
      @foreach($admins as $admin)
        <tr>
          <th scope="row" class="text-right">{{ $no }}</th>
          <td>{{ $admin->name }}</td>
          <td>{{ $admin->email }}</td>
          <td>
            @if($admin->level == 1)
            Viewer
            @elseif($admin->level == 2)
            Downloader
            @elseif($admin->level == 3)
            Admin
            @else
            Not Found
            @endif
          </td>
          <td class="text-center">
          @if($admin->is_active == 1)
            <i class="fa fa-check" aria-hidden="true"></i>
          @else
            <i class="fa fa-times" aria-hidden="true"></i>
          @endif
          </td>
          <td class="text-center">
            <a href="{{ url('webcontrol/admin/'.$admin->id.'/edit') }}" class="btn btn-xs btn-warning" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
            <a href="{{ url('webcontrol/admin/'.$admin->id.'/delete') }}" class="btn btn-xs btn-danger" title="Delete" onclick="return confirm('Are you sure?')"><i class="fa fa-minus" aria-hidden="true"></i></a>
          </td>
        </tr>
      <?php $no++; ?>
      @endforeach
      </tbody>
    </table>
  </div>

  {{ $admins->links() }}

@endsection