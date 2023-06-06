@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        Show Leads
    </div>
    <div class="card-body">
        <div class="mb-2">
            
                   
                    <table class="table table-bordered table-striped">
                    <th>
                            Property ID
                        </th>
                        <th>
                            User Name
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Phone
                        </th>
                        <th>
                            Message
                        </th>
                    
                    @foreach($data['leads'] as $lead)
                    <tbody>
                       <tr>
                        
                   
                    
                        <td>
                            {{ $lead->property_id }}
                        </td>
                        <td>
                            {{ $lead->name }}
                        </td>
                        
                        <td>
                            {{ $lead->email }}
                        </td>
                        
                        <td>
                            {{ $lead->phone }}
                        </td>
                        
                        <td>
                            {{ $lead->message }}
                        </td>
                        
                    </tr>
                       </tbody>
                    @endforeach
                    
            </table> 
                
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
    </div>
</div>
@endsection