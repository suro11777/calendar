@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>create appointment</h3>
        @if($errors->has('error'))
            <span>
                                        <strong>{{ $errors->first('error') }}</strong>
                                    </span>
        @endif
        <form action="{{route('appointments.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="with_whom">Users</label>
                <select class="form-control" name="with_whom" id="with_whom">
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
                @if($errors->has('with_whom'))
                    <span>
                                        <strong>{{ $errors->first('with_whom') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="start_time">Start Time</label>
                <input class="form-control" type="datetime-local" id="start_time" name="start_time">
                @if($errors->has('start_time'))
                    <span>
                                        <strong>{{ $errors->first('start_time') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="finish_time">Finish Time</label>
                <input class="form-control" type="datetime-local" id="finish_time" name="finish_time">
                @if($errors->has('finish_time'))
                    <span>
                                        <strong>{{ $errors->first('finish_time') }}</strong>
                                    </span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
