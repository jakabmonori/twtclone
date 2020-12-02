@extends('master')

@section('title', 'Homepage')

@section('content')

<h6>Recent messages:</h6>
<div class="row justify-content-center justify-content-md-start" style="height: 100%;">
    <div class="col-12 col-md-8" style="height: 50%; overflow: scroll;  border: 1px solid black;">
        <ul>
            @foreach ($messages as $message)
                <li>
                    <b style="font-size: 16px;">{{   $message->title }}</b> &nbsp;
                    <span style="font-size: 8px; color: light-grey;">{{   $message->created_at->format('d-m-Y H:i')    }}</span> <br>
                    <i>{{   $message->content   }}</i><br><br>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="col-12 col-md-8">
        <h6 class="justify-content-start">Send a message</h6>
        <form action="/create" method="post">
            <!--Character count error-->
            @error('titLength')

                <span style="color: red; font-weight: bold;">{{  $message   }}</span>

            @enderror
             <!--Character count error end-->


            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <!--Character count error-->
            @error('conLength')

                <span style="color: red; font-weight: bold;">{{  $message   }}</span>

            @enderror
             <!--Character count error end-->

            <div class="form-group">
                <label for="content">Content</label>
                <textarea type="text" name="content" class="form-control" required></textarea>
            </div>

            {{ csrf_field() }}

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>

</div>

@endsection
