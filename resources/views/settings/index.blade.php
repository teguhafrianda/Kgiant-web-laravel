@extends('layouts.app')

@section('title', 'Settings')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4" style="font-size: 2rem; margin-top: 80px;">Settings</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('settings.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="reward_threshold">Number of Purchases for Free Order</label>
            <input type="number" name="reward_threshold" id="reward_threshold" class="form-control" value="{{ $rewardThreshold }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save Settings</button>
    </form>
</div>
@endsection
