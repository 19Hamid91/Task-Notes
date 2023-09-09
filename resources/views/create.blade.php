@extends('main')
@section('title', 'ADD')
@section('content')
    <div>
        <h1>Add Note</h1>

        <form id="form" action="/store" method="POST" style="display: inline-block;">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="">
            </div>

            <div class="form-group">
                <label for="due">Due</label>
                <input type="date" name="due" class="form-control" id="due" value="">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description"></textarea>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status">
                    <option value="Pending">Pending</option>
                    <option value="Done">Done</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
            <a href="/index" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection