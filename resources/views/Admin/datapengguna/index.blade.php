<x-layoutAdmin>
  <div class="main-content">
    <h1>Data Pengguna</h1>

    <a href="{{ route('admin.datapengguna.create') }}" class="btn-tambah">
      <i class="fa-solid fa-plus"></i> Tambah Data Pengguna
    </a>

    @if(session('success'))
      <div class="alert-success">
        {{ session('success') }}
      </div>
    @endif

    <table class="tabel-pengguna">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Email</th>
          <th>Role</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->role }}</td>
          <td>
            <a href="{{ route('admin.datapengguna.edit', $user->id) }}" class="btn-edit">Edit</a>
            <form action="{{ route('admin.datapengguna.destroy', $user->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn-hapus" onclick="return confirm('Yakin mau hapus data ini?')">Hapus</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</x-layoutAdmin>
