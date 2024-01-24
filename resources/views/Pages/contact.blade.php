@extends('layouts/main')
@section('title', '| Contact Us')
@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Contact Me</h1>
        <hr>
        <form>
            <div class="form-group">
                <label name="email">Email: </label>
                <input class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label name="subject">Subject: </label>
                <input class="form-control" id="subject" name="subject">
            </div>
            <div class="form-group">
                <label name="message">Message: </label>
                <textarea class="form-control" id="message" name="message"
                    placeholder="Type Your Message Here:"></textarea>
            </div>
        </form>
        <input class="btn btn-success" type="submit" value="Send Message">
    </div>
</div>
@endsection