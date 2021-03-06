@extends('layouts.main-layout')

@section('title', 'Tambah Stok Penggilingan')
@section('content')
<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">
    Tambah Data Penggilingan
</div>
<div class="row mt-4 mx-3 d-flex justify-content-center">
    <div class="add-admin col-12 bg-white">
        <form id="save-penggilingan-form" action="/stock/penggilingan/createData" class="pt-5 px-md-3" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row mb-4 px-3">
                <label for="nama" class="form-label col-md-3">Berat</label>
                <div class="col-md-9">
                    <select class="form-select" aria-label="select-role" id="berat" name="berat">
                        <option value="5" selected>5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                    </select>
                </div>
            </div>
            <input type="hidden" id="penanggung_jawab" name="penanggung_jawab" value="{{ Auth::User()->nama }}">
            <input type="hidden" id="status" name="status" value="Penggilingan">
            <div class="col-md-12 mb-4 pb-4 px-3 d-flex justify-content-end">
                <a href="/stok/penggilingan"><button type="button" class="btn back-btn me-3">
                    <i class="fa-solid fa-arrow-left"></i>
                    Kembali
                </button></a>
                <button onclick="return false" class="btn simpan-btn btn-primary">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
  $(document).ready(function(){
    $('.simpan-btn').click(function () {
      swal({
            text: "Apakah anda ingin menyimpan data?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
      .then((willSave) => {
        if (willSave) {
          $('#save-penggilingan-form').submit();
        } else {
          swal("Data tidak disimpan!");
        }
      });
    });
  });
</script>
@endsection