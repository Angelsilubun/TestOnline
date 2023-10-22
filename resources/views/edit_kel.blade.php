@foreach ($data_kelurahan as $item)
    <div class="modal fade" id="editKel{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('kelurahan.update', $item->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Kode</label>
                            <input type="text" name="kode_kel" class="form-control" id="kode_kel"
                                value="{{ $item->kode_kel }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama kelurahan</label>
                            <input type="text" name="nama_kel" class="form-control" id="nama_kel"
                                value="{{ $item->nama_kel }}">
                        </div>
                        <div class="mb-3">
                            <select name="kecamatan_id" id="kecamatan_id" class="form-select"
                                aria-label="Default select example">
                                <option selected>Pilih Kecamatan</option>
                                @foreach ($kecamatans as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kecamatan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
