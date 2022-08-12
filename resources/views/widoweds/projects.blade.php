@foreach($projects as $project)
    <tr>
        <th>{{$project->id}}</th>
        <th>@if($project->Project){{$project->Project->name}}@endif</th>
        <th>{{$project->created_at}}</th>
    </tr>
@endforeach