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
                            Property Name
                        </th>
                        <th>
                            By User
                        </th>
                        <th>
                            Time
                        </th>
                       
                    
                    
                    
                    <tbody>
                    @foreach($data['visitors'] as $key=>$visitor)
                    @php
                                $time = \Carbon\Carbon::parse($visitor->created_at);
                                @endphp
                       <tr>
                        
                   
                    
                        <td>
                            {{ $visitor->property_id }}
                        </td>
                        <td>
                            <a href="{{ route('admin.property.show', $visitor->property->id ?? '') }}">
                                {{ $visitor->property->name ?? '' }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.users.show', $visitor->user->id ?? '') }}">
                                {{ $visitor->user->name ?? '' }}
                            </a>
                        </td>
                        <td class="table-data">{{ optional($time)->format('d-m-Y h:i A') }}</td>
                        
                        
                    </tr>
                    @endforeach
                       </tbody>
                    
                    <tfoot>
                                {{ $data['visitors']->links() }}
                            </tfoot>
            </table> 
                
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
$(document).ready(function() {
  
  });
</script>
@endsection