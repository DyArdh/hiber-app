@extends('layouts.dashboard-template')

@section('content')
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">Account Admin</div>
      <div class="row">
        <div class="add-admin col-xl-3 col-md-6">
          <button type="button" class="btn btn-primary my-4" id="tambah-acc" data-bs-toggle="modal" data-bs-target="#popupTambahAcc">
            <i class="fa-solid fa-pencil"></i>
            <span class="ps-2 fw-bolder"> Tambah Akun</span>
          </button>
        </div>
      </div>
      <div class="row">
        <div class="tabel-adm col-xl-3 col-md-6 mx-auto">
          <h4 class="pt-4 pb-3">Daftar Akun Admin</h4>
          <div class="table-responsive w-auto">
            <table class="table table-bordered">
              <thead>
                <th scope="col">Id</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Email</th>
                <th scope="col">No. HP</th>
                <th scope="col">Action</th>
              </thead>
              <tbody class="align-middle">
                <th scope="row">1</th>
                <th scope="row">Andiko Yoga</th>
                <th scope="row">rizuna30@gmail.com</th>
                <th scope="row">085157506552</th>
                <th scope="row">
                  <button type="button" class="view-btn rounded-3 ms-2 my-1" data-bs-toggle="modal" data-bs-target="#popupViewAcc"><i class="fa-solid fa-eye"></i></button>
                  <button type="button" class="edit-btn rounded-3 ms-2 my-1"><i class="fa-solid fa-pen-to-square"></i></button>
                  <button type="button" class="delete-btn rounded-3 ms-2 my-1" data-bs-toggle="modal" data-bs-target="#popupDeleteAcc"><i class="fa-solid fa-trash-can"></i></button>
                </th>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Popup Delete Account -->
  <div class="modal fade" id="popupDeleteAcc">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <h6>Apakah Anda Ingin Menghapus Data Ini?</h6>
        </div>
        <div class="modal-footer">
          <button type="button" class="cancel-btn rounded-3" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="conf-delete-btn rounded-3">Hapus</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Popup  View Account-->
  <div class="modal fade" id="popupViewAcc">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fw-bold">Detail Account</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row mx-1">
              <div class="col-3">
                <p class="fw-bold">Nama Lengkap</p>
              </div>
              <div class="col-3">
                <p class="fw-bold">:</p>
              </div>
              <div class="col-6 text-end">
                <p>Andiko Yoga</p>
              </div>
            </div>

            <div class="row mx-1">
              <div class="col-3">
                <p class="fw-bold">Alamat</p>
              </div>
              <div class="col-3">
                <p class="fw-bold">:</p>
              </div>
              <div class="col-6 text-end">
                <p>Ds.Banaran, Kec.Kauman, Kab.Tulungagung, Jawa Timur 66261</p>
              </div>
            </div>

            <div class="row mx-1">
              <div class="col-3">
                <p class="fw-bold">Email</p>
              </div>
              <div class="col-3">
                <p class="fw-bold">:</p>
              </div>
              <div class="col-6 text-end">
                <p>rizuna30@gmail.com</p>
              </div>
            </div>

            <div class="row mx-1">
              <div class="col-3">
                <p class="fw-bold">Nomor Telepon</p>
              </div>
              <div class="col-3">
                <p class="fw-bold">:</p>
              </div>
              <div class="col-6 text-end">
                <p>085157506552</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Tambah Akun -->
  <div class="modal fade" id="popupTambahAcc">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fw-bold">Tambah Account</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body mt-3">
          <form action="">
            <div class="form-group row mb-4 px-3">
              <label for="form-alamat" class="form-label col-3">Alamat</label>
              <div class="col-9">
                <input type="text" class="form-control" id="form-alamat" />
              </div>
            </div>
            <div class="form-group row mb-4 px-3">
              <label for="form-kecamatan" class="form-label col-3">Kecamatan</label>
              <div class="col-9">
                <input type="text" class="form-control" id="form-kecamatan" />
              </div>
            </div>
            <div class="form-group row mb-4 px-3">
              <label for="form-kabupaten" class="form-label col-3">Kabupaten</label>
              <div class="col-9">
                <input type="text" class="form-control" id="form-kabupaten" />
              </div>
            </div>
            <div class="form-group row mb-4 px-3">
              <label for="form-kode-pos" class="form-label col-3">Kode Pos</label>
              <div class="col-9">
                <input type="text" class="form-control" id="form-kode-pos" />
              </div>
            </div>
            <div class="form-group row mb-4 px-3">
              <label for="form-email" class="form-label col-3">Email</label>
              <div class="col-9">
                <input type="email" class="form-control" id="form-email" />
              </div>
            </div>
            <div class="form-group row mb-4 px-3">
              <label for="form-password" class="form-label col-3">Password</label>
              <div class="col-9">
                <input type="password" class="form-control" id="form-password" />
              </div>
            </div>
            <div class="form-group row mb-4 px-3">
              <label for="form-no-tlp" class="form-label col-3">No. Telp</label>
              <div class="col-9">
                <input type="text" class="form-control" id="form-no-tlp" />
              </div>
            </div>
            <div class="form-group row mb-4 px-3">
              <label for="form-role" class="form-label col-3">Role</label>
              <div class="col-9">
                <select class="form-select" aria-label="select-role" id="form-role">
                  <option value="Admin" selected>Admin</option>
                  <option value="Karyawan">Karyawan</option>
                </select>
              </div>
            </div>
          </form>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection