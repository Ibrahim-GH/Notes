@extends('layouts.master')

@section('content')
    <div class="edit_profile_Page">
        <div class="container">
            <div class="row">

                <div class="link_page">

                    <form method="POST" action="{{ route('notes.updated',['note'=> $note->id]) }}"
                          enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

{{--                        <input type="hidden" id="editId" value="">--}}
                        <div style="padding: 0px 150px; 0px;">
                            <label for="editName">Enter The New Text Note</label>
                            <input class="form-control" value="{{$note->content}}" id="content" name="content">
                        </div>

                        <div class="form-row align-items-center">
                            <div class="noteType" class="col-auto my-1" style="margin-top: 20px;">
                                <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                                <select class="custom-select mr-sm-2" id="noteType" name="noteType">
                                    <option selected>{{$type}}</option>
                                    <option value="1">Urgent</option>
                                    <option value="2">Normal</option>
                                    <option value="3">Date</option>
                                </select>
                            </div>

                            <label></label>


                            <div class="image">
                                <label for="exampleFormControlFile1">Select Photo</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                            </div>
                        </div>
                        <br/>


                        <div class="save">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                    <br/>

                </div>
            </div>
        </div>
    </div>
    <style>
        textarea {
            border-radius: 5px;
            color: blue;
            /*text-align: center;*/
            padding: -50px;
        }

        .noteType {
            margin-left: 400px;

        }

        .image {
            margin-left: 30px;
            margin-top: -10px;
        }

        .save {
            text-align: center;
        }

        .form-row {
            margin-top: 30px;
        }
    </style>
@endsection
