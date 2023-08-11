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
                        <th>
                            Time
                        </th>
                        <th>
                            By User
                        </th>
                        <th>
                            Viewed
                        </th>
                    
                    
                    <tbody>
                    @foreach($data['leads'] as $key=>$lead)
                    @php
                                $time = \Carbon\Carbon::parse($lead->created_at);
                                @endphp
                       <tr>
                        
                   
                    
                        <td>
                            {{ $lead->property_id }}
                        </td>
                        <td>
                            <a href="{{ route('admin.property.show', $lead->property->id ?? '') }}">
                                {{ $lead->property->name ?? '' }}
                            </a>
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
                        <td class="table-data">{{ optional($time)->format('d-m-Y h:i A') }}</td>
                        <td>
                            <a href="{{ route('admin.users.show', $lead->user->id ?? '') }}">
                                {{ $lead->user->name ?? '' }}
                            </a>
                        </td>
                        <td>
                        <div class="custom-toggle-switch">
                                <input type="checkbox" class="custom-toggle" id="toggleSwitch{{ $key }}" data-qid="{{$lead->id}}" {{ $lead->viewed==1 ? 'checked':'' }}>
                                <label for="toggleSwitch{{ $key }}"></label>
                            </div>
                        </td>
                        
                    </tr>
                    @endforeach
                       </tbody>
                    
                    <tfoot>
                                {{ $data['leads']->links() }}
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
    $('.custom-toggle').change(function() {
      var leadId = $(this).data('qid');
      var viewed = $(this).prop('checked') ? 1 : 0;

      // Make AJAX request to update the 'resolved' field
      $.ajax({
        url: "{{route('admin.leads.update-viewed') }}",
        method: 'POST',
        data: {
        lead_id: leadId,
        viewed: viewed,
          _token: '{{ csrf_token() }}'
        },
        success: function(response) {
          console.log('Contact updated successfully.');
        },
        error: function(xhr) {
          console.log('Error updating contact.');
        }
      });
    });
  });
</script>
@endsection