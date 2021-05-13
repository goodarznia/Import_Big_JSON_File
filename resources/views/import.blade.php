@extends('layouts.app')
@section('content')
    <div class="container">
        <form class="form-horizontal" action="/user_area/import" method="post" enctype="multipart/form-data">
            @csrf
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>

                </div>
            @endif
            <div class="form-group">
                <label class="text-danger">* </label>
                <label class="control-label" for="Gas constant">Choose file: (JSON)</label>
                <div class="col-sm-10">
                    <input name="data_file" type="file" class="form-control" id="dataset_file">
                </div>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
            <br><br>
        </form>
    </div>
@endsection

