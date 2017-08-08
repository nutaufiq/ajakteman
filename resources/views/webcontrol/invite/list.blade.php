@extends('webcontrol.template.template')

@section('title', 'Invitation - Webcontrol')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <h1 class="page-title">Invitation [ {{ $count }} ]</h1>
    </div>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th width="75px;" class="text-right">#</th>
          <th class="text-right">Invite ID</th>
          <th class="text-right">Inviter [OLX ID]</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Date</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
      <?php $no = $invites->firstItem(); ?>
      @foreach($invites as $invite)
        <tr>
          <th scope="row" class="text-right">{{ $no }}</th>
          <td class="text-right">{{ $invite->id }}</td>
          <td class="text-right">{{ $invite->user_olx_id }}</td>
          <td>{{ $invite->name }}</td>
          <td>{{ $invite->email }}</td>
          <td>{{ $invite->phone }}</td>
          <td>
            @if($invite->tracks->count() == 0)
              {{ $invite->created_at->format('d F Y') }}
            @else
              {{ $invite->tracks->last()->created_at->format('d F Y') }}
            @endif
          </td>
          <td>
            @if($invite->tracks->count() == 0)
              Undangan Terkirim
            @else
              @if($invite->tracks->last()->status == 1)
                Membuka link pendaftaran
              @elseif($invite->tracks->last()->status == 2)
                Mendaftar
              @elseif($invite->tracks->last()->status == 3)
                Pasang Iklan
              @elseif($invite->tracks->last()->status == 4)
                Iklan sudah aktif
              @elseif($invite->tracks->last()->status == 5)
                Iklan sudah diverifikasi
              @else
                Not Found
              @endif
            @endif
          </td>
        </tr>
      <?php $no++; ?>
      @endforeach
      </tbody>
    </table>
  </div>

  {{ $invites->links() }}

@endsection