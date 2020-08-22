@extends('layouts.admin')

@section('content')
    <date-table-user-ip-activity
        fetch-url="{{ route('admin.activity.list.vue') }}"
        arrow-up="+"
        arrow-down="-"
        :columns="[
        {name: '#',         class:'col-1', sortable:true,   column:'id',            filterable:false    },
        {name: 'id',        class:'col-1', sortable:true,   column:'user_id',       filterable:false    },
        {name: 'user',      class:'col-2', sortable:false,  column:'user',          filterable:true     },
        {name: 'email',     class:'col-2', sortable:false,  column:'email',         filterable:true     },
        {name: 'event',     class:'col-1', sortable:true,   column:'event',         filterable:true     },
        {name: 'ip',        class:'col-1', sortable:true,   column:'ip',            filterable:true     },
        {name: 'extra',     class:'col-2', sortable:false,  column:'extra',         filterable:false    },
        {name: 'created',   class:'col-2', sortable:true,   column:'created_at',    filterable:false    },
        ]"
    ></date-table-user-ip-activity>
@endsection
