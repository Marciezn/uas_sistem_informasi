<x-layoutAdmin>
  <!-- Main Content -->
  <main class="content">
    <div class="header">
      <h1>Edit Pengguna</h1>
      <a href="{{ route('admin.datapengguna.index') }}" class="btn-tambah">
        <i class="fa-solid fa-arrow-left"></i> Kembali
      </a>
    </div>

    <form action="{{ route('admin.datapengguna.update', $user->id) }}" method="POST" class="form">
      @csrf
      @method('PUT')

      <label for="name">Nama</label>
      <input type="text" name="name" id="name" value="{{ $user->name }}" required>

      <label for="email">Email</label>
      <input type="email" name="email" id="email" value="{{ $user->email }}" required>

      <label for="role">Role</label>
      <select name="role" id="role" required>
        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
      </select>

      <div class="button-group">
        <button type="submit" class="btn-simpan">
          <i class="fa-solid fa-floppy-disk"></i> Update
        </button>
        <a href="{{ route('admin.datapengguna.index') }}" class="btn-kembali">
          <i class="fa-solid fa-rotate-left"></i> Batal
        </a>
      </div>
    </form>
  </main>
</x-layoutAdmin>
