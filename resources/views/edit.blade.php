@extends('main')
@section('title', 'EDIT')
@section('content')
    <div>
        <h1>Edit Note</h1>

        <form id="form" action="/update/{{ $data['id'] }}" method="POST" style="display: inline-block;">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $data['title'] }}">
            </div>

            <div class="form-group">
                <label for="due">Due</label>
                <input type="text" name="due" class="form-control" id="due" value="{{ $data['due'] }}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description">{{ $data['description'] }}</textarea>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status">
                    <option value="Pending" @if ($data['status'] == 'Pending') selected @endif>Pending</option>
                    <option value="Done"@if ($data['status'] == 'Done') selected @endif>Done</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary" id="update-button">Update</button>
            <a href="/index" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
{{-- @section('script')
    
    <script>
        $(document).ready(function () {
            var currentUrl = window.location.href;
            var urlParts = currentUrl.split('/');
            var id = urlParts[urlParts.length - 1];
            $('#form').attr("action", "http://localhost:8000/api/notes/"+id);

            $.ajax({
                url: '/api/notes/'+id,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    // Memasukkan data ke dalam elemen HTML
                    $('#title').val(data.title);
                    $('#due').val(data.due);
                    $('#description').text(data.description);
                    $('#status').val(data.status);
                },
                error: function (error) {
                    console.error('Terjadi kesalahan:', error);
                }
            });

            $('#update-button').click(function() {
                    var id = urlParts[urlParts.length - 1];
                    updateNote(id);
                    });

            function updateNote(id) {
                $.ajax({
                    url: '/api/notes/' + id,
                    type: 'PUT',
                    data: "formData",
                    dataType: 'json',
                    success: function (data) {
                        // Jika penghapusan berhasil, mereload halaman
                        location.reload();
                    },
                    error: function (error) {
                        console.error('Terjadi kesalahan:', error);
                    }
                });
            }
        });
    </script>
@endsection --}}