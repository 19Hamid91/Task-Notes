@extends('main')
@section('title', 'INDEX')
@section('css')
<style>
    #pending-row,#done-row, .section-head{
        display: flex;
        flex-wrap: nowrap;
        flex-direction: row;
    }
    #pending-row, #done-row {
        margin: 10px;
        overflow: hidden;
    }
    .section-head > a{
        margin-top: 10px;
    }
    .card, h3 {
        margin: 10px;
    }
    .section-btn{
        display: flex;
        flex-wrap: nowrap;
        flex-direction: row;
    }
    .show-button, .edit-button {
        margin: 0;
        width: 50%;
        border-radius: 0%;
    }
</style>
@endsection
@section('content')
    {{-- <div>
        <h1>Data dari API</h1>
        <a href="/create"><button class="btn btn-primary">Add Note</button></a>
        <ul id="data-list"></ul>
        <table id="data-notes" class="table">
            <tr>
                <th>Title</th>
                <th>Due</th>
                <th>Description</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item['title'] }}</td>
                    <td>{{ $item['due'] }}</td>
                    <td>{{ $item['description'] }}</td>
                    <td>{{ $item['status'] }}</td>
                    <td>
                        <a href="/show/{{ $item['id'] }}" class="btn btn-primary show-button">Show</a>
                        <a href="/edit/{{ $item['id'] }}"class="btn btn-warning edit-button">Edit</a>
                        <form action="/delete/{{$item['id'] }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div> --}}

    <div id="head">
        <h1 style="text-align: center">Task Notes</h1>
    </div>
    <div id="content">
        <div class="section-head">
            <h3>Pending Tasks</h3>
            <a href="/create"><button class="btn btn-info">+</button></a>
        </div>
        <div id="pending-row">
            @foreach ($data_pending as $pending)
                <div class="card" style="width: 18rem;">
                    <form action="/delete/{{$pending['id'] }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="position: absolute; right: 5px; top: 5px;" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">X</button>
                    </form>
                    <div class="card-body">
                        <h5 class="card-title">{{ $pending['title'] }}</h5>
                        <h6 class="card-due mb-2 text-body-secondary">{{ $pending['due'] }}</h6>
                        <p class="card-text">{{ $pending['description'] }}</p>
                    </div>
                    <div class="section-btn">
                        <a href="/show/{{ $pending['id'] }}" class="btn btn-primary show-button">Show</a>
                        <a href="/edit/{{ $pending['id'] }}"class="btn btn-warning edit-button">Edit</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="section-head">
            <h3>Done Tasks</h3>
            <a href="/create"><button class="btn btn-info">+</button></a>
        </div>
        <div id="done-row">
            @foreach ($data_done as $done)
                <div class="card" style="width: 18rem;">
                    <form action="/delete/{{$done['id'] }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="position: absolute; right: 5px; top: 5px;" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">X</button>
                    </form>
                    <div class="card-body">
                        <h5 class="card-title">{{ $done['title'] }}</h5>
                        <h6 class="card-due mb-2 text-body-secondary">{{ $done['due'] }}</h6>
                        <p class="card-text">{{ $done['description'] }}</p>
                    </div>
                    <div class="section-btn">
                        <a href="/show/{{ $done['id'] }}" class="btn btn-primary show-button">Show</a>
                        <a href="/edit/{{ $done['id'] }}"class="btn btn-warning edit-button">Edit</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

{{-- @section('script')
    <script>
        // Menggunakan jQuery untuk melakukan permintaan Ajax
        $(document).ready(function () {
            $.ajax({
                url: '/api/notes', // Sesuaikan dengan endpoint API Anda
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    var dataNotes = $('#data-notes');
                    $.each(data, function (index, item) {
                    dataNotes.append('<tr>' +
                        '<td>' + item.title + '</td>' +
                        '<td>' + item.due + '</td>' +
                        '<td>' + item.description + '</td>' +
                        '<td>' + item.status + '</td>' +
                        '<td>' +
                            '<a href="/show/' + item.id + '" class="btn btn-primary show-button">Show</a>' +
                            '<a href="/edit/' + item.id + '"class="btn btn-warning edit-button">Edit</a>' +
                            '<button class="btn btn-danger delete-button" data-id="' + item.id + '">Hapus</button>' +
                        '</td>' +
                        '</tr>'
                    );
                });

                $('.delete-button').click(function() {
                    var id = $(this).data('id');
                    deleteNote(id);
                    });
                },
                error: function (error) {
                    console.error('Terjadi kesalahan:', error);
                }
            });

            function deleteNote(id) {
                $.ajax({
                    url: '/api/notes/' + id,
                    type: 'DELETE',
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