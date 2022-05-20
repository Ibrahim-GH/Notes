{{-- @extends('layouts.master')--}}

{{-- @section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('You are logged in!') }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}
{{-- @section('content')--}}
{{--     <div class="container">--}}
{{--         <div class="row justify-content-center">--}}
{{--             <div class="col-md-8">--}}
{{--                 <div class="card">--}}
{{--                     <div class="card-header">{{ __('Dashboard') }}</div>--}}

{{--                     <div class="card-body">--}}
{{--                         @if (session('status'))--}}
{{--                             <div class="alert alert-success" role="alert">--}}
{{--                                 {{ session('status') }}--}}
{{--                             </div>--}}
{{--                         @endif--}}

{{--                         {{ __('You are logged in!') }}--}}
{{--                     </div>--}}
{{--                 </div>--}}
{{--             </div>--}}
{{--         </div>--}}
{{--     </div>--}}
{{-- @endsection--}}


@extends('layouts.master')
<link rel="stylesheet" href="css/notes/main.css">

@section('content')
    <div class="edit_profile_Page">
        <div class="container">
            <div class="row">

                <div class="link_page">

                    @foreach($notes as $note)
                        <div class="row">
                            <div class="col-lg-4 margin-bottom-50px" id="profile">
                                <img style="width: 100%; height: 100%;" x="100%" y="100%" dy=".3em"
                                     src="{{asset($note->image)}}" class="card-img-top">
                            </div>

                            <div class="col-lg-5 margin-bottom-50px">
                                <p class="card-text">{{$note ->content}}</p>
                            </div>

                            <div class="col-lg-3 margin-bottom-50px">

                                <div>
                                    <a type="submit" onclick="copyToClipboard()">
                                        <i class="fa fa-share-alt"></i>
                                        share</a>

                                </div>

                                <div class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Pages
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a href="{{route('notes.show', ['note' => $note->id])}}"
                                           class="btn btn-success">Details</a>

                                        <a href="{{route('notes.edit',['note'=> $note->id])}}"
                                           class="btn btn-primary">Edit</a>


                                        {{--                                    @auth()--}}
                                        {{--                                        <a href="{{route('posts.like', ['post' => $post->id])}}"--}}
                                        {{--                                           class="btn btn-block btn-primary">--}}
                                        {{--                                            <i class="fa fa-thumbs-up">{{__('message.Like')}}--}}
                                        {{--                                                ({{$post->likes()->count()}})</i></a>--}}
                                        {{--                                    @endauth--}}

                                        <form method="post"
                                              action="{{route('notes.destroy',['note' => $note->id])}}">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger">Delete
                                            </button>
                                        </form>

                                    </div>
                                </div>

                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <br/>
    <div style="text-align: center;">
        <a type="submit" class="btn btn-primary" href="{{route('notes.create')}}">
            <i class="fa fa-plus"></i>
            {{ trans('Add Note') }}
        </a>
    </div>
    <br/>


@endsection

<script>
    function copyToClipboard(text) {
        var inputc = document.body.appendChild(document.createElement("input"));
        var element = document.getElementById("momo").value;
        inputc.value = window.location.href + '/' + element;
        inputc.focus();
        inputc.select();
        document.execCommand('copy');
        inputc.parentNode.removeChild(inputc);
        alert("URL Collection Copied.");
    }
</script>

<script>
    $(function () {
        //Take the data from the TR during the event button
        $('table').on('click', 'button.editingTRbutton', function (ele) {
            //the <tr> variable is use to set the parentNode from "ele
            var tr = ele.target.parentNode.parentNode;

            //I get the value from the cells (td) using the parentNode (var tr)
            var id = tr.cells[0].textContent;
            var name = tr.cells[1].textContent;

            //Prefill the fields with the gathered information
            $('#editName').val(name);

            $('#editId').val(id);

            //If you need to update the form data and change the button link
            $("form#ModalForm").attr('action', window.location.href + '/update/' + id);
            $("a#saveModalButton").attr('href', window.location.href + '/update/' + id);
        });
    });
</script>
