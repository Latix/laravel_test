<select name="{{ $field }}" id="channel_id">
    @foreach($channels as $channel)
        <option>{{ $channel->name }}</option>
    @endforeach
</select>
