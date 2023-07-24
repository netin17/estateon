@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>{{ trans('cruds.queries.title') }} {{ trans('global.list') }}</h3>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Property Name
                        </th>
                        <th>
                            By User
                        </th>
                        <th>
                            State
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Phone
                        </th>
                        <th>
                            Topic
                        </th>
                        <th>
                            Message
                        </th>
                        <th>
                            Resolved
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data['contact_queries'] as $key => $query)
                    <tr data-entry-id="{{ $query->id }}">
                        <td>
                            {{ $query->id ?? '' }}
                        </td>
                        <td>
                            <a href="{{ route('admin.property.show', $query->property->id ?? '') }}">
                                {{ $query->property->name ?? '' }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.users.show', $query->user->id ?? '') }}">
                                {{ $query->user->name ?? '' }}
                            </a>
                        </td>
                        <td>
                            {{ $query->state->name ?? '' }}
                        </td>
                        <td>
                            {{ $query->name ?? '' }}
                        </td>
                        <td>
                            {{ $query->email ?? '' }}
                        </td>
                        <td>
                            {{ $query->phone ?? '' }}
                        </td>
                        <td>
                            {{ $query->message_type ?? '' }}
                        </td>
                        <td>
                            {{ $query->message ?? '' }}
                        </td>
                        <td>
                            <div class="custom-toggle-switch">
                                <input type="checkbox" class="custom-toggle" id="toggleSwitch{{ $key }}" data-qid="{{$query->id}}" {{ $query->resolved==1 ? 'checked':'' }}>
                                <label for="toggleSwitch{{ $key }}"></label>
                            </div>
                        </td>

                    </tr>
                    @endforeach
                <tfoot>
                    <tr>
                        <td colspan="6">{{ $data['contact_queries']->links() }}</td>
                    </tr>
                </tfoot>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
$(document).ready(function() {
    $('.custom-toggle').change(function() {
      var contactId = $(this).data('qid');
      var resolved = $(this).prop('checked') ? 1 : 0;

      // Make AJAX request to update the 'resolved' field
      $.ajax({
        url: "{{route('admin.contacts.update-resolved') }}",
        method: 'POST',
        data: {
          contact_id: contactId,
          resolved: resolved,
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