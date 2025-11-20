<x-layoutAdmin>
  <!-- Main Content -->
  <main class="content">
    <div class="header">
      <h1>Tambah Pengguna</h1>
      <a href="{{ route('admin.datapengguna.index') }}" class="btn-tambah">
        <i class="fa-solid fa-arrow-left"></i> Kembali
      </a>
    </div>

    <form action="{{ route('admin.datapengguna.store') }}" method="POST" class="form">
      @csrf

      <label for="name">Nama</label>
      <input type="text" name="name" id="name" placeholder="Masukkan nama" required>

      <label for="email">Email</label>
      <input type="email" name="email" id="email" placeholder="Masukkan email" required>

      <label for="password">Password</label>
      <input type="password" name="password" id="password" placeholder="Masukkan password" required>

      <label for="role">Role</label>
      <select name="role" id="role" required>
        <option value="">-- Pilih Role --</option>
        <option value="admin">Admin</option>
        <option value="user">User</option>
      </select>

      <div class="button-group">
        <button type="submit" class="btn-simpan">
          <i class="fa-solid fa-floppy-disk"></i> Simpan
        </button>
        <a href="{{ route('admin.datapengguna.index') }}" class="btn-kembali">
          <i class="fa-solid fa-rotate-left"></i> Kembali
        </a>
      </div>
    </form>
  </main>
</x-layoutAdmin>
