{{ Form::hidden('title', $searchResult['snippet']['title']) }}
{{ Form::hidden('imageUrl', $searchResult['snippet']['thumbnails']['default']['url']) }}
{{ Form::hidden('kind', $searchResult['id']['kind']) }}
@if ($searchResult['id']['kind'] =='youtube#video')
    {{ Form::hidden('videoid', $searchResult['id']['videoId']) }}
@endif
@if ($searchResult['id']['kind'] =='youtube#channel')
    {{ Form::hidden('videoid', $searchResult['id']['channelId']) }}
@endif
@if ($searchResult['id']['kind'] =='youtube#playlist')
    {{ Form::hidden('videoid', $searchResult['id']['playlistId']) }}
@endif
